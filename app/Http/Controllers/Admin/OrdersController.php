<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Entities\Admin\Order;
use App\Entities\Admin\Client;
use Yajra\DataTables\DataTables;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\OrderRepository;

class OrdersController extends Controller {

    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function canceled(Request $request)
    {
        if($request->wantsJson()) {
         return   $this->data($request,$this->repository->where('is_returned',0)->where('type',1)->where('status',0));
        }
        $seen='canceled';
        return view('admin.orders.index',compact('seen'));
    }
    public function need_retuned(Request $request)
    {
        if($request->wantsJson()) {
         return   $this->data($request,$this->repository->where('is_returned',1));
        }
        $seen='need_retuned';
        return view('admin.orders.index',compact('seen'));
    }

    public function retuned(Request $request)
    {
        if($request->wantsJson()) {
         return   $this->data($request,$this->repository->where('is_returned',2));
        }
        $seen='retuned';
        return view('admin.orders.index',compact('seen'));
    }
    public function closed(Request $request)
    {
        if($request->wantsJson()) {
         return   $this->data($request,$this->repository->where('is_returned',0)->where('type',0));
        }
        $seen='closed';
        return view('admin.orders.index',compact('seen'));
    }
    public function placed(Request $request)
    {
        if($request->wantsJson()) {
         return   $this->data($request,$this->repository->where('is_returned',0)->where('type',1)->where('status',1));
        }
        $seen='placed';
        return view('admin.orders.index',compact('seen'));
    }
    public function confirmed(Request $request)
    {
        if($request->wantsJson()) {
         return   $this->data($request,$this->repository->where('is_returned',0)->where('type',1)->where('status',2));
        }
        $seen='confirmed';
        return view('admin.orders.index',compact('seen'));
    }
    public function shipped(Request $request)
    {
        if($request->wantsJson()) {
         return   $this->data($request,$this->repository->where('is_returned',0)->where('type',1)->where('status',3));
        }
        $seen='shipped';
        return view('admin.orders.index',compact('seen'));
    }
    public function out_of_delivery(Request $request)
    {
        if($request->wantsJson()) {
         return   $this->data($request,$this->repository->where('is_returned',0)->where('type',1)->where('status',4));
        }
        $seen='out_of_delivery';
        return view('admin.orders.index',compact('seen'));
    }
    public function delivered(Request $request)
    {
        if($request->wantsJson()) {
         return   $this->data($request,$this->repository->where('is_returned',0)->where('type',1)->where('status',5));
        }
        $seen='delivered';
        return view('admin.orders.index',compact('seen'));
    }

    public function index(Request $request)
    {
        $seen="index";
        if($request->wantsJson()) {
            //    return $this->data($request,$this->repository->with('client')->where('seen',0));
            $data = $this->repository->where('is_returned',0)->where('type',1);
            if($request->status!=null)
                $data->where('status',$request->status);   
            if($request->paid_type!=null)
                $data->where('paid_type',$request->paid_type);   
            if($request->created_at!=null)
                $data->whereDate('created_at', $request->created_at);   


            return $this->data($request,$data);
        }
        return view('admin.orders.index',compact('seen'));
    }

    public function old(Request $request)
    {
        $seen="old";
        if($request->wantsJson()) {
          return  $this->data($request,$this->repository->where('is_returned',0)->where('type',1)->where('seen',1));
        }
        return view('admin.orders.index',compact('seen'));
    }
    public function data(Request $request,$item)
    {        // $item = $this->repository->where('is_returned',0)->where('type',1)->where('seen',$seen)->orderBy('id', 'desc');

        return Datatables::of($item->with('products:id,title_en,code','client'))->addColumn('email', function($item) {
            if($item->client)
            return "<a href=".route('clients.show',$item->client->id??"").">".$item->client->email??""."</a>";
            return'';
            
        })->addColumn('status', function($item) {return $item->my_status;})->addColumn('action',function($item) { return action_form($item,'orders','orders',['show','delete']);})->rawColumns(['email'])->toJson();
    }
    public function ordersPhoto(Request $request,  $id)
    {
        $order = Order::findOrFail($id);
        $validatedData = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validates that the file is an image
        ]);
    
        if($request->hasFile('photo')) {
            $order->photo=$this->fileUpload('orders',$request->photo);
            $order->save();
        }
        return redirect()->back()->with('message', 'Successfully Updated');


    }

    public function show($id)
    {
        $order = $this->repository->find($id);
        if($order->seen==0){
            $order->seen=1;
            $order->save();
        }
        return view('admin.orders.show', compact('order'));
    }


    public function status($id,Request $request)
    {
        $order = Order::findOrFail($id);
        $client = Client::findOrFail($order->client_id);
        if($request->status>=0 && $request->status!=null)
        {

            if($request->status<=5 && $request->status>=0)
            {
                $order = $this->repository->update(['status'=>$request->status??0], $id);
                if($request->status==4)
                $order = $this->repository->update(['date' => now() ], $id);

                if(($request->status==5) && $order->decrement==0 )
                {
                    foreach($order->products as $product)
                    {
                         $product->decrement('amount',$product->pivot->amount);
                    }
                    $order->decrement=1;
                    $order->save();
                    $order->points_add = $this->calculatePoints($order->price_after_offer);
                    $order->save();
                    $client->increment('points',$order->points_add);
                }
            }
        }
        return redirect()->back()->with('message',  'Staus Changed.');
    }

    public function returned($id,Request $request)
    {   

        $order = Order::findOrFail($id);
        if($order->status ==4 && $order->is_returned==1)
        {
            $order->is_returned=2;
            if($order->is_paid == 1)
            {
                $order->wallet_add = $order->price_after_offer ;
                $client = Client::findOrFail($order->client_id);
                $client->increment('wallet',$order->price_after_offer);
            }
            $order->save();
        }
        return redirect()->back()->with('message',  'Staus Changed.');
    }
    public function paid($id)
    {
        $order = $this->repository->update(['is_paid'=>1], $id);
        return redirect()->back()->with('message', 'Order Changed.');
    }
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->back()->with('message', 'Order deleted.');
    }
 

    public function calculatePoints($orderAmount)
    {
        $points = 0;
        if ($orderAmount >= 100 && $orderAmount <= 200) {
            $points = 10;
        } elseif ($orderAmount > 200 && $orderAmount <= 500) {
            $points = 20;
        } elseif ($orderAmount > 500) {
            $points = 500;
        }
        return $points;
    }

 
 
    // not used for now
    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all(); 
        $serverKey = 'server key goes here';
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => 'title hi',
                "body" => 'body hi ',  
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        
        curl_close($ch);
        dd($result);        
    }
    public function getOrderDetails($id)
{
    $order = $this->repository->find($id);

    return response()->json([
        'original_price'      => (float) $order->price,
        'discount_amount'     => (float) $order->discount_amount,
        'discount_percentage' => (float) $order->discount_percentage,
        'final_price'         => (float) $order->final_price,
    ]);
}
}
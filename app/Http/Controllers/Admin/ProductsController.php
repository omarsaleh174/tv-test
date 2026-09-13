<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Entities\Admin\Unit;
use Illuminate\Http\Request;
use App\Entities\Admin\Product;
use Yajra\DataTables\DataTables;
use App\Entities\Admin\Category;
use App\Entities\Admin\SubCategory;
use App\Entities\Admin\ProductDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\Admin\ProductRepository;
class ProductsController extends Controller
{
    protected $repository;
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        
        // return  $product = $this->repository->getQuery()->with('subCategory:id,title_en,title_ar,category_id','subCategory.category:id,title_en,title_ar', 'unit:id,title_en')->get()->last()->sub_category;
        if($request->wantsJson()) {
            $product = $this->repository->getQuery()->with('subCategory:id,title_en,title_ar', 'unit:id,title_en');
            $product = ProductDetail::query();

            if($request->sub_category_id!=null)
            $product = $product->where('sub_category_id',$request->sub_category_id);
            if($request->unit_id!=null)
            $product = $product->where('unit_id',$request->unit_id);

            return Datatables::of($product)->
            // addColumn('sub_category', function($product) {return $product->subCategory->title_en??"";})
            // ->addColumn('unit', function($product) {return $product->unit->title_en??"" ?? 'N/A';})->
            addColumn('action',function($item) 
            // {return '';}
            { return action_form($item,'products','products',$this->actions);}
            )->toJson();
        }
        $sub_categories = SubCategory::select('id','title_en','title_ar')->get();
        $units = Unit::all();
        return view('admin.products.index', compact('sub_categories','units'));
    }
    public function oneCategory(Request $request,$id)
    {
        $product =   Product::where('sub_category_id',$id)->getQuery();
            return Datatables::of($product)->addColumn('unit', function($product) {return $product->unit->title_en??"" ?? 'N/A';})->
            addColumn('action',function($item) { return action_form($item,'products','products',$this->actions);})->toJson();
    }
    public function lowStock(Request $request)
    {   
        if($request->wantsJson()) {
            $product = $this->repository->getLowStockProducts();
            return Datatables::of($product)->addColumn('action',function($item) { return action_form($item,'products','products',$this->actions);})->toJson();// '<a href="javascript:openModal('.$item->id.')" class="btn btn-xs btn-primary edit myBtn"" ><i class="fa fa-plus"> </i> <a href="javascript:deleteItem(\''.route('products.destroy',$item->id).'\','.$item->id.')" class="btn btn-xs btn-danger delete"  ><i class="fa fa-trash"></i> </a>'
        }
        return view('admin.products.low_stock');
    }

    public function store(ProductRequest $request)
    {
        $product = $this->repository->create($request->only('is_packaging','code','title_en','title_ar','price','real_price','amount','description_en','description_ar','unit_id','sub_category_id','country_id','brand_id','type_id','manufacture_id')+['active'=>1]);
            if($request->hasFile('photo')) {
                $product->photo=$this->fileUpload('products',$request->photo);
                $product->save();
            }
            return redirect()->back()->with('message', 'successfully created');
    }

    public function show($id)
    {
        $product = $this->repository->find($id);
        return view('admin.products.show', compact('product'));
    }

    public function products2(Request $request)
    {
        $categories = Category::withCount('products')->with('products')->get();
        return view('admin.products.products2', compact('categories'));
    }
    public function edit($id)
    {
        $product = $this->repository->find($id);
        return view('admin.products.edit', compact('product'));
    }
    public function update(ProductRequest $request, $id)
    {
        $product = $this->repository->update($request->only('is_packaging','code','title_en','title_ar','price','real_price','amount','description_en','description_ar','unit_id','sub_category_id','country_id','brand_id','type_id','manufacture_id'), $id);
        if($request->hasFile('photo')){
            $product->photo=$this->delete_image($product->photo);
            $product->photo=$this->fileUpload('products',$request->photo,'photo');
        }
        $product->save();
        return redirect()->back()->with('message', 'successfully  updated');
    }

    public function destroy($id,Request $request)
    {
        $deleted = $this->repository->delete($id);
        if($request->wantsJson()) 
        {
            return response()->json(['code'=>200,'message'=>'Item deleted successfully'],200);
        }
        return redirect()->back()->with('message', 'Product deleted.');
    }


    public function __invoke($id) {
        $item = $this->repository->findorFail($id);
        $active=$item->active==1?0:1;
        $item->active=$active;
        $item->save();
        $message=$item->active==1?'unsuspended':'Suspended';
        return redirect()->back()->with('message', 'item  '.$message);
    }



}

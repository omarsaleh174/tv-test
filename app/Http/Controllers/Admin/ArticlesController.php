<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Entities\Admin\Article;
use App\Services\MediaService;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ArticlesController extends Controller {

    protected $view;
    protected $service;
    protected $repository;
    
    public function __construct(Article $repository)
    {
        $this->view='articles';
        $this->repository = $repository;
        $this->service=new MediaService();
    }

    public function index(Request $request)
    {
        if(request()->wantsJson()) {
            $item = $this->repository->getQuery();
            if($request->consultant_id!=null)
            $item->where('consultant_id',$request->consultant_id);   
        if($request->classification_id!=null)
        $item->where('classification_id',$request->classification_id);   
    
    return Datatables::of($item)->addColumn('action',function($item)
            { return action_form($item,'articles','articles',$this->actions);})->toJson();
        }
        return view('admin.articles.index', );
    }
    
    public function create()
    {
        return view('admin.articles.create', );
    }
    public function edit($id)
    {
        $item = $this->repository->find($id);
        return view('admin.articles.create',compact('item') );
    }
    public function destroy($id)
    {
        $item = $this->repository->delete($id);
        return redirect()->route('articles.index')->with('message', 'Item Deleted.');
    }
    public function show($id)
    {
        $item = $this->repository->find($id);
        return view('admin.articles.show',compact('item') );
    }

    // public function index(Request $request)
    // {
    //     if($request->web)
    //     $items = $this->repository->where(function($query) use ($request){  $query->where('title_en', 'LIKE', '%'.$request->title_en.'%')->where('title_ar', 'LIKE', '%'.$request->title_ar.'%');})->where('type',$request->web)->paginate($this->paginate);
    //     else
    //     $items = $this->repository->where(function($query) use ($request){  $query->where('title_en', 'LIKE', '%'.$request->title_en.'%')->where('title_ar', 'LIKE', '%'.$request->title_ar.'%');})->paginate($this->paginate);
    //     return view('admin.articles.index', compact('items'),['controllers'=>'articles']);
    // }
    public function store(ArticleRequest $request)
    {
        $request = $this->afterCreate($request);
        $article = $this->repository->create($request->only('title_en','title_ar','classification_id','consultant_id','sub_desc_en','sub_desc_ar','desc_en','desc_ar','type','tags_ar','tags_en'));
        $article->slug_en = \Str::slug($article->title_en);
        $article->slug_ar = \Str::slug($article->title_ar);
        $article->save();
        
        if($request->photo)
        $article->photo=$this->service->fileUpload('articles',$request->photo);
        $article->save();
        return redirect()->route('articles.index')->with('message', 'Item created.');
    }
    
    public function update(ArticleRequest $request, $id)
    {
        $request = $this->afterCreate($request);
        $article = $this->repository->where('id', $id)->update($request->only('classification_id','consultant_id','title_en','title_ar','sub_desc_en','sub_desc_ar','desc_en','desc_ar','type','tags_ar','tags_en'));
        $article =$this->repository->find($id);
        $article->slug_en = \Str::slug($article->title_en);
        $article->slug_ar = \Str::slug($article->title_ar);
        $article->save();
        
        if($request->hasFile('photo')){
            $article->photo=$this->service->delete_image($article->photo);
            $article->photo=$this->service->fileUpload('articles',$request->photo);
        }
        $article->save();

        return redirect()->route('articles.index')->with('message', 'Item updateed.');
    }
    public function afterCreate( $request)
    {
        $request->request->add(['desc_en'=> $this->get_img_from_editor($request->desc_en,'text_editor_images')]);
        $request->request->add(['desc_en'=> $this->get_img_from_editor($request->desc_ar,'text_editor_images')]);
        // $request->request->add(['slug_en'=> $this->slugify($request->title_en)]);
        // $request->request->add(['slug_ar'=> $this->slugify($request->title_ar)]);
        return $request;
    }

    public function get_img_from_editor($data,$file='text_editor_images',$name='photo')
    {
        $dom = new \DomDocument('1.0', 'UTF-8');
        // $dom->loadHTML();
        @$dom->loadHTML(mb_convert_encoding($data, 'HTML-ENTITIES', 'UTF-8'),LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $dom->saveHTML($dom->documentElement);
        $imageFile = $dom->getElementsByTagName('img');
        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            if(strpos($data, ';') ){
                 list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= "images/$file/" . time().$item.$name.'.png';
                $path = public_path().'/'. $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', asset($image_name));
            }  
        }          

        return $dom->saveHTML($dom->documentElement);
    } 
     
     
}

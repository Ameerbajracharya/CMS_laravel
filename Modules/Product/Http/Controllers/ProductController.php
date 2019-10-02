<?php

namespace Modules\Product\Http\Controllers;


use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Brand;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\ProductType;
use Modules\Product\Http\Requests\AddProductValidation;
use Modules\Product\Http\Requests\EditProductValidation;
use Session;
use DB;

class ProductController extends BaseController
{
    protected $base_route = 'product.view';
    protected $view_path = 'product::product';
    protected $panel = 'Product';
    protected $folder ='product';
    protected $folderpath;
    protected $databaseimage = 'image';

    public function __construct(Product $model){
        $this->model = $model;
        $this->folderpath = ('public'. DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR).$this->folder;
    }


    public function productindex()
    {
        $data['product'] = Product::paginate(10);
        $data['brand']=Brand::pluck('name','id');
        $data['category']=Category::pluck('id','name');
        $data['producttype']=ProductType::pluck('id','type');
        return view(parent::commondata($this->view_path.'.index'),compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['brand']=Brand::where('status', '=' ,1)->pluck('name','id');
        $data['category']=Category::where('status', '=' ,1)->pluck('name','id');
        $data['type']=ProductType::where('status', '=' ,1)->pluck('type','id');
       return view(parent::commondata($this->view_path.'.add'),compact('data'));
    }

    public function store(AddProductValidation $request)
    {
        $this->storeimage($request);
        $data['product']= Product::create($request->all());
        Session::flash('success','Product Stored Successfully');

        return redirect()->Route($this->base_route);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['brand']=Brand::where('status', '=' ,1)->pluck('name','id');
        $data['category']=Category::where('status', '=' ,1)->pluck('name','id');
        $data['type']=ProductType::where('status', '=' ,1)->pluck('type','id');
        $data['product'] = Product::find($id);
       return view(parent::commondata($this->view_path.'.add'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(EditProductValidation $request, $id)
    {
        $data['product'] = Product::find($id);
        $this->storeimage($request, $id);
        $data['product']->update($request->all());
        Session::flash('success','Product Update Successfully');
        return redirect()->Route($this->base_route);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
         $data['product'] = Product::find($id);
        $this->rowExist($data['product']);
        $this->destroydata($id);
        Session::flash('success','Product Delete Successfully');
        return redirect()->Route($this->base_route);
    }

    public function status($id){
      $this->statuschange($id);

        return redirect()->route($this->base_route);
    }
}

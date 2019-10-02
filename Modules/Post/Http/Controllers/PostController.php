<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\BaseController;
use Modules\Post\Entities\Post;
use Illuminate\Routing\Controller;
use Session;
use Modules\Post\Http\Requests\AddPostValidation;

class PostController extends BaseController
{
    protected $view_path = 'post::';
    protected $base_route = 'post.view';
    // protected $databaseimage = '';
    // protected $folderpath = '';
    protected $panel = 'Post';
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
       return view(parent::commondata($this->view_path.'index'));
   }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
       return view(parent::commondata($this->view_path.'form'));
   }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AddPostValidation $request)
    {
     $data = new Post;
     $data->title = $request->title;
     $data->description  = $request->description ;
     $data->metadata  = $request->metadata ;
     $data->keyword  = $request->keyword ;
     $data->tag  = $request->tag ;
     $data->save();
     Session::flash('success','Post Created Successfully.');
     return redirect()->Route($this->base_route);

 }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function view()
    {

        $data['post'] =  Post::paginate(10);
        return view(parent::commondata($this->view_path.'viewpost'),compact('data'));
    }



    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
       $data['post'] = Post::find($id);
       $this->rowExist($data['post']);
       return view(parent::commondata($this->view_path.'form'),compact('data'));
   }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(AddPostValidation $request, $id)
    {
        $data = Post::find($id);
        $data->update($request->all());
        Session::flash('success','Post Updated Successfully.');
        return redirect()->Route($this->base_route);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
      $data = Post::find($id);
      $this->rowExist($data);
      $data->delete();
      Session::flash('success','Post Deleted Successfully.');
      return redirect()->Route($this->base_route);
  }
}

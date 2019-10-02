<?php

namespace Modules\Multimedia\Http\Controllers;
 
use App\Http\Controllers\BaseController;
use Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Multimedia\Entities\Multimedia;
use Modules\Multimedia\Http\Requests\AddFormValidation;
use Modules\Multimedia\Http\Requests\EditFormValidation;
use Intervention\Image\ImageManager;
use Session;





class multimediaController extends BaseController
{
    protected $base_route = 'viewmultimedia';
    protected $view_path = 'multimedia::';
    protected $panel = 'Multimedia';
    protected $folder ='multimedia';
    protected $folderpath;
    protected $databaseimage = 'image';//name of the image column in database

    public function __construct(Multimedia $model){
        $this->model = $model;
        $this->folderpath = ('public'. DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR).$this->folder;
    }


    public function view()
    {
        $data['multimedia'] =  Multimedia::paginate(10);
        return view(parent::commondata($this->view_path.'index'),compact('data'));
    }

    public function create()
    {
        return view(parent::commondata($this->view_path.'form'));
    }


    public function store(AddFormValidation $request)
    {

            $this->storeimage($request);
            $data['multimedia']= multimedia::create($request->all());
            Session::flash('success','Multimedia Store Successfully');
            return redirect()->Route($this->base_route);

    }

    // public function show($id)
    // {
    //     return view('multimedia::show');
    // }

    public function edit($id)
    {
        $data['multimedia'] = Multimedia::find($id);
        $this->rowExist($data['multimedia']);
        return view(parent::commondata($this->view_path.'form'),compact('data'));
    }

    public function update(EditFormValidation $request, $id)
    {
        $data['multimedia'] = Multimedia::find($id);
        $this->storeimage($request, $id);
        $data['multimedia']->update($request->all());
        Session::flash('success','Multimedia Update Successfully');
        return redirect()->Route($this->base_route);

    }

    public function destroy($id)
    {
        $data['multimedia'] = Multimedia::find($id);
        $this->rowExist($data['multimedia']);
        $this->destroydata($id);
        Session::flash('success','Multimedia Delete Successfully');
        return redirect()->Route($this->base_route);
    }

    public function status($id)
    {

        $this->statuschange($id);

        return redirect()->route($this->base_route);

    }
}

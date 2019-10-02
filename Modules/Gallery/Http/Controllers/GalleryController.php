<?php

namespace Modules\Gallery\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Gallery\Entities\Gallery;
use Intervention\Image\Facades\Image;
use Session;

class GalleryController extends BaseController
{
    protected $base_route = 'gallery';
    protected $view_path = 'gallery::';
    protected $panel = 'Gallery';
    protected $folder ='gallery';
    protected $folderpath;
    protected $databaseimage = 'image';//name of the image column in database

    public function __construct(Gallery $model)
    {
        $this->model = $model;
        $this->folderpath = ('public'. DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR).$this->folder;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['gallery'] = Gallery::paginate(10);
        return view(parent::commondata($this->view_path.'index'),compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view(parent::commondata($this->view_path.'create'));

    }

     public function loadGalleryRow()
    {
        $response =[];
        $response['html'] = view(parent::commonData($this->view_path.'layouts.table_row'))->render();
        return response()->json(json_encode($response));
    }   

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('gallery_image')) {

            foreach ($request->file('gallery_image') as $key => $gallery) {
                $file = $request->file('gallery_image')[$key];
                $file_name = rand(0,9999) . '_' . $file->getClientOriginalName();


            $file->move($this->folderpath . DIRECTORY_SEPARATOR,$file_name);

//          create image of custom dimenstions
            //     $img = config('dimension.dimension-image.image-dimensions');
            //    if($img)
            // {
            //     $resize_image = Image::make($this->folderpath.DIRECTORY_SEPARATOR.$file_name);
            //     $resize_image->resize($img['width'],$img['height']);
            //     $resize_image->save($this->folderpath. DIRECTORY_SEPARATOR.$img['width'].'-'.$img['height'].'-'.$file_name);

            // }

//           image of custom dimensions done


                Gallery::create([
                    'caption' => $request->get('gallery_caption')[$key],
                    'image' => $file_name,
                    'status'   =>$request->get('status')[$key],

                ]);
            }
        }
        Session::flash('success', $this->panel . ' Created Successfully');
        return redirect()->route('gallery');
    }

     public function status($id)
    {

        $this->statuschange($id);
        return redirect()->route($this->base_route);

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('gallery::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['gallery'] = Gallery::find($id);
        $this->rowExist($data['gallery']);
        return view(parent::commonData($this->view_path.'.edit'),compact('data'));    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
         $data= [];
        $data['gallery'] = $this->model->find($id);
        if($request->hasFile('gallery_image')){

            $file = $request->file('gallery_image');
            $file_name = rand(0,9999).'_'.$file->getClientOriginalName();
            $file->move($this->folderpath . DIRECTORY_SEPARATOR,$file_name);

// image dimension create

           // $img = config('dimension.dimension-image.image-dimensions');
           //     if($img)
           //  {
           //      $resize_image = Image::make($this->folderpath.DIRECTORY_SEPARATOR.$file_name);
           //      $resize_image->resize($img['width'],$img['height']);
           //      $resize_image->save($this->folderpath. DIRECTORY_SEPARATOR.$img['width'].'-'.$img['height'].'-'.$file_name);

           //  }
// image dimension create end

//            remove old image
            if($data['gallery'])
            {

            if(file_exists($this->folderpath.DIRECTORY_SEPARATOR.$data['gallery']->image)){
                unlink($this->folderpath.DIRECTORY_SEPARATOR.$data['gallery']->image);
            }
// dimension image delete

            // if($img){
            //     foreach($img as $dimension){
            //         dd($dimension);
            //         dd($this->folderpath.DIRECTORY_SEPARATOR.$dimension['width'].'-'.$dimension['height'].'-'.$data['gallery']->image);
            //         if(file_exists($this->folderpath.DIRECTORY_SEPARATOR.$dimension['width'].'-'.$dimension['height'].'-'.$data['gallery']->image)){
            //             unlink($this->folderpath.DIRECTORY_SEPARATOR.$dimension['width'].'-'.$dimension['height'].'-'.$data['gallery']->image);
            //         }

            //     }

            // }
// dimension image delete done

        }
     }
             $data['gallery']->update([
                 'caption' => $request->get('gallery_caption'),
                 'image'=> isset($file_name)? $file_name : $data['gallery']->image,

             ]);

        Session::flash('success',$this->panel.' Updated Successfully');

        return redirect()->route($this->base_route);    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
          $data['gallery'] = $this->model->find($id);
          $this->rowExist($data['gallery']);
          parent::removeimage($id);
          $data['gallery']->delete();
          Session::flash('warning', $this->panel . ' Deleted Successfully');
          return redirect()->route('gallery');
    }
}

<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Multimedia\Entities\Multimedia;
use Modules\Slider\Entities\Slider;
use Modules\Post\Entities\Post;


class DashboardController extends BaseController
{
    protected $view_path = 'dashboard::';
    protected $base_route = 'dashboard';
    protected $panel = 'Dashboard';

    public function index()
    {
         return view(parent::commondata($this->view_path.'dashboard_index'));
    }
    public  function search(Request $request){
        $s = $request->search;

        $data['slider']=Slider::where('title','LIKE', '%'.$s.'%')->get();
        $data['slider']=Multimedia::where('title','LIKE', '%'.$s.'%')->get();
        if(count($data['slider']) > 0) {
            return view(parent::commondata($this->view_path . 'search'), compact('data'))
                ->with('search', request('search'))
                  //->withDetails($data['slider'])
                ->withQuery($s);

        }
        else{
            return view(parent::commondata($this->view_path.'search'),compact('data'))
                ->with('search', request('search'));
        }
    }
}

<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Controllers\BaseController;
use App\User;
use Auth;
use Cache;
use Gate;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Modules\User\Http\Requests\AddUserValidation;
use Modules\User\Http\Requests\EditUserValidation;

class UserController extends BaseController
{
    protected $view_path = 'user::';
    protected $base_route = 'user';
    protected $databaseimage = '';
    protected $folder = 'user';
    protected $panel = 'User';
    protected $folder_path;



    public function __construct(){

        $this->folder_path = '';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function view()
    {
         if (!Gate::allows('isAdmin'))
         {
            Session::flash('warning','You are not Authorized to this.');
            return redirect(route('dashboard'));
            }

    $data['user'] = User::paginate(10);
    return view(parent::commondata($this->view_path.'index'), compact('data'));
}


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
         if (!Gate::allows('isAdmin'))
         {
            Session::flash('warning','You are not Authorized to this.');
            return redirect(route('dashboard'));
            }
        return view(parent::commondata($this->view_path.'adduser'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */

    public function usertype($id)
    {
        $user = Auth::user()->find($id);
        if ($user->user_type == 'user'){

            $user->user_type = 'superadmin';
        }
        else{
            $user->user_type = 'user';
        }
        $user->save();
        Session::flash('success','User Type Changed.');
        return redirect(route('user'));
    }

    protected function store(AddUserValidation $request)
    {

        Auth::user()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'user_type' => $request['user_type'],
            'password' => Hash::make($request['password']),
        ]);
        Session::flash('success','User Created Successfully.');
        return redirect()->route('user');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

        $data['user'] = User::find($id);
        $this->rowExist($data['user']);
        return view(parent::commondata($this->view_path.'view'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);
        $this->rowExist($data['user']);
        return view(parent::commondata($this->view_path.'edituser'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(EditUserValidation $request, $id)
    {
        $this->validate($request,[
            'password' => 'required',
        ]);
        $user = User::find($id);
        if(!Hash::check($request->old_password, Auth::user()->password))
        {
            Session::flash('warning','Invalid Password');
            return redirect()->back();
        }
        else
        {
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->user_type = $request->get('user_type');
            $user->password = Hash::make($request['password']);
            $user->save();
            Session::flash('success','User Updated Successfully.');
            return redirect(route($this->base_route));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        $user = Auth::user()->find($id);
        $this->rowExist($user);
        $user->delete();
        Session::flash('success','User Deleted.');
        return redirect(route($this->base_route));
    }
}

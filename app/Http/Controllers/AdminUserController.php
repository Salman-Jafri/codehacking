<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\User;
use App\Role;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
//        foreach($users as $user)
//        {
//            echo $user->name."<br>";
//            echo $user->role->name;
//            //echo dd($data);
//
//        }
        //dd($users);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

            $user = Role::lists('name','id')->all();
            //return dd($user);
            return view('admin.users.create',compact('user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
//
        $data = $request->all();
//
//        return $request->all();

        if($file_data = $request->file('photo_id'))
        {

            $file_name = time().$file_data->getClientOriginalName();
            $file_data->move('images',$file_name);
            $photo = Photo::create(['file'=>$file_name]);
            $data['photo_id']=$photo->id;

        }



        $data['password']=bcrypt($request->password);

        User::create($data);
        return redirect('/admin/users');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $users = User::findorfail($id);
        $roles = Role::lists('name','id')->all();
        return view('admin.users.edit',compact('users','roles'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        //
        //return $request->all();

        $user = User::findorfail($id);


        $data = $request->all();
        if($request->password=="")
        {

            unset($data['password']);

        }
        else
        {

            $data['password']=bcrypt($data['password']);

        }


        if($file = $request->file('photo_id'))
        {

            $image_name = time().$file->getClientOriginalName();
            $file->move('images',$image_name);
            $photo = Photo::create(['file'=>$image_name]);
            $data['photo_id']=$photo->id;


        }


        $user->update($data);
        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

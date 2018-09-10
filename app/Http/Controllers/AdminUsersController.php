<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;

use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Alle users uit database halen
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    //Bij het creeëren van een user toont hij alle rollen die beschikbaar zijn
    $roles = Role::lists('name','id')->all();
    return view('admin.users.create', compact('roles'));
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
        //return $request->all();
        if (trim($request->password)== ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->getPassword());
        }

        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($request->password);
        User::create($input);
        // User::create($request->all());
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
        $user = User::findOrFail($id);
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        if (trim($request->password)== ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->getPassword());
        }

        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
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
       $user = User::findOrFail($id); //opzoeken van de te deleten user
        unlink(public_path() . $user->photo->file); //delete uit folder
        $user->delete();


        Session::flash('deleted_user', 'The User is DELETED');
        return redirect('/admin/users');
    }

    public function editaccount(){
        $user = Auth::user();
        $countries = Country::countries();
        return view('editaccount', compact('user','countries'));
    }

    public function updateaccount(UsersEditRequest $request){
        $user = Auth::user();
        $input = $request->all();
        if($input['password'] == null){
            $input = array_except($input, ['password']);
        }else{
            $input['password'] = bcrypt($input['password']);
        }
        $user->update($input);
        return back()->with('success', 'Account successfully updated!');

    }
}

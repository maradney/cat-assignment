<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;

class UserController extends Controller
{
    protected $base_view_path = 'dashboard.users.';

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $index = request()->get('page',  1);
        $data['counter_offset'] = ($index * 20) - 20;

        $query = User::role('user');
        $data['resources'] = $query->paginate(20);

        return view($this->base_view_path . 'index', $data);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view($this->base_view_path . 'create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(UserCreateRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->assignRole('user');

        return redirect()->route('users.index')->with('message', [
            'type' => 'success',
            'message' => 'User created successfully.'
        ]);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(User $user)
    {
        $data['resource'] = $user;
        return view($this->base_view_path . 'show', $data);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(User $user)
    {
        $data['resource'] = $user;
        return view($this->base_view_path . 'edit', $data);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(UserEditRequest $request, User $user)
    {
        $data = $request->all();
        if($request->get('password')){
            $data['password'] = bcrypt($data['password']);
        }elseif(array_key_exists('password', $data)){
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('message', [
            'type' => 'success',
            'message' => 'User updated successfully.'
        ]);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        $user->removeRole('user'); // just in case.
        $user->delete();
        return redirect()->route('users.index')->with('message', [
            'type' => 'success',
            'message' => 'User deleted successfully.'
        ]);
    }
}

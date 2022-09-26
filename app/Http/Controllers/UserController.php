<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        // dd($users);

        return view('users.index', compact('users'));
        //dd('UserController@index'); //debug
    }

    public function show($id)
    {
        // $user = User::where('id', '=', $id)->first(); outro jeito de fazer
        if (!$user = User::find($id))
            return redirect()->route('users.index');
        
        return view('users.show', compact('user'));
        // dd('users.show', $id); debug
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return redirect()->route('users.index');
        // return redirect()->route('users.show', $user->id);
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();

    }
}

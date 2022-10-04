<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        // dd($request->search);
        $users = $this->model
                        ->getUsers(
                            search: $request->search ?? ''
                        );

        return view('users.index', compact('users'));
        //dd('UserController@index'); //debug
    }

    public function show($id)
    {
        // $user = $this->model->where('id', '=', $id)->first(); outro jeito de fazer
        if (!$user = $this->model->find($id))
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

        $this->model->create($data);

        return redirect()->route('users.index');
        // return redirect()->route('users.show', $user->id);
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();

    }
    
    public function edit($id)
    {
        if (!$user = $this->model->find($id))
            return redirect()->route('users.index');
        
        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user =$this->model->find($id))
            return redirect()->route('users.index');

        $data = $request->only('name', 'email');
        if($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if(!$user =$this->model->find($id))
            return redirect()->route('users.index');

        $user->delete();
        return redirect()->route('users.index');
        
    }
}

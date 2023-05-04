<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master.user.index', [
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.user.create',[

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:users,telp',
            'password' => 'required|string',
            'role' => 'required|string'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('userIndex')->with('success', 'Your data has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return redirect()->route('userIndex');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        return view('master.user.edit', [
            'post' => $user->where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {
        $rules = [
            'name' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string'
        ];

        $query = $user->select('email', 'telp')->where('id', $id)->first();

        if ($request->email != $query->email){
            $rules['email'] = 'required|email|unique:users,email';
        }

        if($request->telp != $query->telp){
            $rules['telp'] = 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:14|unique:users,telp';
        }

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user->where('id', $id)->update($validatedData);

        return redirect()->route('userIndex')->with('success', 'Your data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $user->where('id', $id)->delete();
        
        return redirect()->route('userIndex')->with('success', 'Your data has been deleted successfully!');
    }
}

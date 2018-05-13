<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('Users/profile')->with('user', $user);
    }

    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('Users/profile-red')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:50|min:2',
            'surname' => 'required|string|max:100|min:2',
            'email' => 'required|string|email|max:256',
            'phone' => 'required|string|min:8|max:12',
            'password' => 'nullable|string|min:6|max:20|confirmed',
            'picture' => 'image',
        );

        $this->validate($request, $rules);
        $user = User::find(Auth::user()->id);
        
        if ($request->hasFile('picture')) {
            $fileNameWithExt = $request->file('picture')->GetClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('picture')->storeAs('public/users', $fileNameToStore);
            if ($user->picture != "noimage.png") {
                Storage::delete('public/users/' . $user->picture);
            }
            $user->picture = $fileNameToStore;
        }
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->input('email') != $user->email) {
            $user->email = $request->input('email');
        }
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->action('UserController@index')->with('success', 'Lietotāja dati veiksmīgi atjaunoti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = User::find(Auth::user()->id);
        if($user->picture != "noimage.png"){
            Storage::delete('public/users/' . $user->picture);
        }
        $user->delete();
        return redirect('/')->with('success', 'Lietotājs veiksmīgi dzēsts');
    }
}
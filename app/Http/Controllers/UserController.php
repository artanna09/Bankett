<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;

class UserController extends Controller
{
    // Attēlot lietotāja profilu
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('Users/profile')->with('user', $user);
    }

    // Atvērt lietotāja profila rediģēšanas skatu
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
    // Rediģēt lietotāja profilu
    public function update(Request $request)
    {
        // Validācijas noteikumi
        $rules = array(
            'name' => 'required|string|between:2,50',
            'surname' => 'required|string|between:2,50',
            'email' => 'required|string|email|between:6,256',
            'phone' => 'required|string|between:8,12',
            'password' => 'nullable|string|between:6,20|confirmed',
            'picture' => 'image',
        );

        $this->validate($request, $rules);

        $user = User::find(Auth::user()->id);
        
        // Ja jauna bilde tika izvēlēta, tad izdzēst veco un augšupielādēt jauno
        if ($request->hasFile('picture')) {
            $fileNameWithExt = $request->file('picture')->GetClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('picture')->storeAs('public/users', $fileNameToStore);
            // Ja bilde bija noimage.png, tad nedzēst no
            if ($user->picture != "noimage.png") {
                Storage::delete('public/users/' . $user->picture);
            }
            $user->picture = $fileNameToStore;
        }
        // Pārbaudīt, vai parole tika mainīta
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        if($user->email != $request->input('email')){
            $existingEmail = User::where('email','=', $request->input('email'))->first();
            if($existingEmail->id != Auth::user()->id){
                return view('Users/profile-red')->with('error', 'Lietotājs ar tādu e-pastu jau eksistē sistēmā')
                                                ->with('user', $user);
            }
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
    // Izdzēst lietotāju
    public function destroy()
    {
        $user = User::find(Auth::user()->id);
        // Ja bilde bija noimage.png, tad nedzēst bildi
        if($user->picture != "noimage.png"){
            Storage::delete('public/users/' . $user->picture);
        }
        $user->delete();
        return redirect('/')->with('success', 'Lietotājs veiksmīgi dzēsts');
    }
}
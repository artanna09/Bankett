<?php

namespace App\Http\Controllers;

use App\Service;
use App\Service_type;
use App\User_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::query();
        if (Input::has('title')) {
            $services->where('title', 'like', '%' . Input::get('title') . '%');
        }
        $services = $services->orderBy('updated_at', 'desc')->paginate(10);
        $serviceTypes = Service_type::orderBy('name')->get();
        foreach ($services as $service) {
            $service->description = str_limit($service->description, 100);
        }
        return view('Service/pakalpojumi')->with('services', $services)->with('serviceTypes', $serviceTypes);
    }

    public function sort($id)
    {
        $services = Service::query();
        $services->where('service_type_id', '=', $id);
        if (Input::has('title')) {
            echo 'Has title';
            $services->where('title', 'like', '%' . Input::get('title') . '%');
        }
        $services = $services->orderBy('updated_at', 'desc')->paginate(10);
        $serviceTypes = Service_type::orderBy('name')->get();
        return view('Service/pakalpojumi')->with('services', $services)->with('serviceTypes', $serviceTypes);
    }

    public function favorites()
    {
        $userFavorites = User_service::where('user_id', '=', Auth::id())->paginate(10);
        return view('Service/favoriti')->with('favorites', $userFavorites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Service/pakalpojums-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('Service/pakalpojums')->with('service', $service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Service/pakalpojums-red');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function request()
    {
        return view('E-mail/pakalpojums-admin');
    }

    public function email(Request $request)
    {
        $content = $request->input('content');
        $pictureName = $request->file('picture')->GetClientOriginalName();

        
        Mail::send('E-mail.send', ['mailer' => Auth::user()->email, 'content' => $content], function ($message) use ($request, $pictureName) {
            $message->from(Auth::user()->email, Auth::user()->name . ' ' . Auth::user()->surname);
            $message->to('artanna09@inbox.lv', 'Admin');
            $message->attach($request->picture, ['as' => $pictureName]);
        });

        return redirect()->action('ServicesController@index');
    }
}

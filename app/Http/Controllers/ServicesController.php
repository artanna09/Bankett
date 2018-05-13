<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use App\Service_type;
use App\User_service;
use App\Feedbacks;
use App\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        if (Input::has('title') && !empty(Input::get('title'))) {
            $services->where('title', 'like', '%' . Input::get('title') . '%');
        }
        if (Input::has('fromPrice') && !empty(Input::get('fromPrice'))) {
            $services->where('price', '>=', Input::get('fromPrice'));
        }
        if (Input::has('toPrice') && !empty(Input::get('toPrice'))) {
            $services->where('price', '<=', Input::get('toPrice'));
        }
        if (Input::has('peopleCount') && !empty(Input::get('peopleCount'))) {
            $services->where('person_number_from', '<=', Input::get('peopleCount'))
                        ->where('person_number_to', '>=', Input::get('peopleCount'));
        }
        if (Input::has('district') && Input::get('district') != "Visi") {
            $services->where('district', '=', Input::get('district'));
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
        foreach ($services as $service) {
            $service->description = str_limit($service->description, 100);
        }
        return view('Service/pakalpojumi')->with('services', $services)->with('serviceTypes', $serviceTypes);
    }

    public function favorites()
    {
        $userFavorites = Favorites::where('user_id', '=', Auth::id())->paginate(10);
        return view('Service/favoriti')->with('favorites', $userFavorites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceTypes = Service_type::orderBy('name')->pluck('name', 'id');
        return view('Service/pakalpojums-add')->with('serviceTypes', $serviceTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required|string|max:100',
            'extra_service' => 'string|max:1000',
            'district' => 'required|string|max:50',
            'adress' => 'string|max:100',
            'price' => 'required|numeric|min:0',
            'email' => 'required|string|max:256',
            'phone' => 'required|string|max:20',
            'person_number_from' => 'digits_between:1,100000',
            'person_number_to' => 'integer|min:' . $request->person_number_from,
            'description' => 'required|string|max:5000',
            'photo' => 'required|image',
        );

        $this->validate($request, $rules);

        $fileNameWithExt = $request->file('photo')->GetClientOriginalName();
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('photo')->storeAs('public/services', $fileNameToStore);

        $service = new Service;
        $service->title = $request->input('title');
        $service->extra_service = $request->input('extra_service');
        $service->district = $request->input('district');
        $service->adress = $request->input('adress');
        $service->price = $request->input('price');
        $service->email = $request->input('email');
        $service->phone = $request->input('phone');
        $service->person_number_from = $request->input('person_number_from');
        $service->person_number_to = $request->input('person_number_to');
        $service->description = $request->input('description');
        $service->photo = $fileNameToStore;        
        $service->service_type_id = $request->input('serviceType');        
        $service->save();

        return redirect()->action('ServicesController@index')->with('success', 'Pakalpoums pievienots');
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
        $feedbacks = Feedbacks::where('service_id', '=', $id)->get();
        // echo "<pre>";
        // echo print_r($feedbacks[0]->user);
        // echo "</pre>";
        // return;
        return view('Service/pakalpojums')
                ->with('service', $service)
                ->with('feedbacks', $feedbacks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $serviceTypes = Service_type::orderBy('name')->pluck('name', 'id');
        return view('Service/pakalpojums-red')
                ->with('service', $service)
                ->with('serviceTypes', $serviceTypes);
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
        $rules = array(
            'title' => 'required|string|max:100',
            'extra_service' => 'string|max:1000',
            'district' => 'required|string|max:50',
            'adress' => 'string|max:100',
            'price' => 'required|numeric|min:0',
            'email' => 'required|string|max:256',
            'phone' => 'required|string|max:20',
            'person_number_from' => 'digits_between:1,100000',
            'person_number_to' => 'integer|min:' . $request->person_number_from,
            'description' => 'required|string|max:5000',
            'photo' => 'image',
        );

        $this->validate($request, $rules);

        $service = Service::find($id);
        
        if ($request->hasFile('photo')) {
            $fileNameWithExt = $request->file('photo')->GetClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('public/services', $fileNameToStore);
            Storage::delete('public/services/' . $service->photo);
            $service->photo = $fileNameToStore;
        }

        $service->title = $request->input('title');
        $service->extra_service = $request->input('extra_service');
        $service->district = $request->input('district');
        $service->adress = $request->input('adress');
        $service->price = $request->input('price');
        $service->email = $request->input('email');
        $service->phone = $request->input('phone');
        $service->person_number_from = $request->input('person_number_from');
        $service->person_number_to = $request->input('person_number_to');
        $service->description = $request->input('description');
        $service->save();

        return redirect()->action('ServicesController@index')->with('success', 'Pakalpoums atjaunots');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        Storage::delete('public/services/' . $service->photo);
        $service->delete();
        return redirect('/services')->with('success', 'Pakalpojums dzēsts');
    }

    public function request()
    {
        return view('E-mail/pakalpojums-admin');
    }

    public function emailRequest(Request $request)
    {
        $content = $request->input('content');
        $pictureName = $request->file('photo')->GetClientOriginalName();
        $admins = User::where('role_id', '=', 1)->get();
        
        Mail::send('E-mail.requestService', ['mailer' => Auth::user()->email, 'content' => $content], function ($message) use ($request, $pictureName) {
            $message->from(Auth::user()->email, Auth::user()->name . ' ' . Auth::user()->surname);
            $message->to($admins);
            $message->attach($request->photo, ['as' => $pictureName]);
            $message->subject("Bankett pakalpojuma pieprasījums");
        });

        return redirect()->action('ServicesController@index');
    }

    public function contact($id){
        return view('E-mail/e-zina')->with('serviceId', $id);
    }

    public function emailContact(Request $request)
    {
        $content = $request->input('content');
        $serviceId = $request->input('serviceId');
        $service = Service::find($serviceId);
        $contactEmail = $service->email;
        $serviceName = $service->title;

        Mail::send('E-mail.contactService', ['mailer' => Auth::user()->email, 'content' => $content, 'serviceName' => $serviceName], function ($message) use ($contactEmail) {
            $message->from(Auth::user()->email, Auth::user()->name . ' ' . Auth::user()->surname);
            $message->to($contactEmail);
            $message->subject("Bankett ziņa");
        });

        return redirect()->action('ServicesController@index');
    }

    public function storeFeedback(Request $request, $id){
        $rules = array(
            'text' => 'required|string|max:1000',
        );

        $this->validate($request, $rules);

        $feedback = new Feedbacks;
        $feedback->text = $request->input('text');
        $feedback->user()->associate(User::find(Auth::user()->id));
        $feedback->service()->associate(Service::find($id));
        $feedback->save();

        return redirect()->action('ServicesController@show', ['id' => $id])->with('success', 'Atsauksme pievienota');
    }

    public function deleteFeedback($id){
        $feedback = Feedbacks::find($id);
        $serviceId = $feedback->service_id;
        $feedback->delete();
        return redirect()->action('ServicesController@show', ['id' => $serviceId])->with('success', 'Atsauksme dzēsta');
    }

    public function addToFavorites($id){
        $user = Auth::user();
        $favorite = Favorites::where("user_id", '=', $user->id)->where('service_id','=',$id)->get();
        if (count($favorite)) {
            return redirect()->action('ServicesController@show', ['id' => $id])->with('error', 'Pakalpojums jau ir favorītos');
        }
        $favorite = new Favorites;
        $favorite->user()->associate(User::find(Auth::user()->id));
        $favorite->service()->associate(Service::find($id));
        $favorite->save();
        return redirect()->action('ServicesController@show', ['id' => $id])->with('success', 'Pakalpojums pievienots favorītiem');
    }

    public function removeFromFavorites($id){
        $favorite = Favorites::find($id);
        $favorite->delete();
        return redirect()->action('ServicesController@favorites')->with('success', 'Pakalpojums dzēsts no favorītiem');        
    }
}

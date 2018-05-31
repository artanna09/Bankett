<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use App\Service_type;
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
     // Attēlot pakalpojumu lapu
    public function index()
    {
        // Izveidot jaunu pieprasījumu datu bāzei
        // Un pievienot filtrus, kas ir meklēšanas ievadlauku vērtības
        // Katrs lauks tiek pārbaudīts uz tukšumu
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

        $services = $services->orderBy('title')->paginate(10);
        $serviceTypes = Service_type::orderBy('name')->get();

        foreach ($services as $service) {
            // Attēlot pirmos 100 simbolus
            $service->description = str_limit($service->description, 100);
        }

        return view('Service/pakalpojumi')->with('services', $services)->with('serviceTypes', $serviceTypes);
    }

    // Filtrēt pakalpojumus pēc to veida
    public function filter($id)
    {
        $services = Service::query();
        // Princips kā index() funkcijai, tikai tiek iegūti pakalpojumi
        // ar pareizo pakalpojuma veidu
        $services->where('service_type_id', '=', $id);

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
        $services = $services->orderBy('title')->paginate(10);
        $serviceTypes = Service_type::orderBy('name')->get();
        foreach ($services as $service) {
            // Attēlot pirmos 100 simbolus
            $service->description = str_limit($service->description, 100);
        }
        return view('Service/pakalpojumi')->with('services', $services)->with('serviceTypes', $serviceTypes);
    }

    // Attēlot  favorītus
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
    // Pakalpojuma izveidošanas skats
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
    // Izveidot pakalpojumu
    public function store(Request $request)
    {
        // Lauku validācijas nosacījumi
        $rules = array(
            'title' => 'required|string|between:1,100',
            'extra_service' => 'nullable|max:1000',
            'district' => 'required|string',
            'adress' => 'nullable|max:100',
            'price' => 'required|numeric|between:0.01,99999999999999999999',
            'email' => 'required|string|between:6,256',
            'phone' => 'required|string|between:6,20',
            'person_number_from' => 'nullable|integer',
            'person_number_to' => 'nullable|integer|min:' . $request->person_number_from,
            'description' => 'required|string|max:5000',
            'photo' => 'required|image',
        );

        $this->validate($request, $rules);

        // Saglabāt failu
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
        if($request->input('person_number_from') == null){
            $service->person_number_from = 0;
        } else {
            $service->person_number_from = $request->input('person_number_from');
        }
        if($request->input('person_number_to') == null){
            $service->person_number_to = 0;
        } else {
            $service->person_number_to = $request->input('person_number_to');
        }
        $service->description = $request->input('description');
        $service->photo = $fileNameToStore;        
        $service->service_type_id = $request->input('serviceType');        
        $service->save();

        return redirect()->action('ServicesController@index')->with('success', 'Pakalpojums pievienots');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Attēlot pakalpojumu
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
    // Refiģēt pakalpojumu skats
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
    // Rediģēt pakalpojumu
    public function update(Request $request, $id)
    {
        // Validācijas noteikumi
        $rules = array(
            'title' => 'required|string|between:1,100',
            'extra_service' => 'nullable|max:1000',
            'district' => 'required|string',
            'adress' => 'nullable|max:100',
            'price' => 'required|numeric|between:0.01,99999999999999999999',
            'email' => 'required|string|between:6,256',
            'phone' => 'required|string|between:8,20',
            'person_number_from' => 'nullable|integer',
            'person_number_to' => 'nullable|integer|min:' . $request->person_number_from,
            'description' => 'required|string|max:5000',
            'photo' => 'image',
        );

        $this->validate($request, $rules);

        $service = Service::find($id);
        
        // Ja jauna bilde tika ievietota, tad dzēst veco un ielikt jauno
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
        if($request->input('person_number_from') == null){
            $service->person_number_from = 0;
        } else {
            $service->person_number_from = $request->input('person_number_from');
        }
        if($request->input('person_number_to') == null){
            $service->person_number_to = 0;
        } else {
            $service->person_number_to = $request->input('person_number_to');
        }
        $service->description = $request->input('description');
        $service->service_type_id = $request->input('serviceType');        
        $service->save();

        return redirect()->action('ServicesController@index')->with('success', 'Pakalpoums atjaunots');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Izdzēst pakalpojumu
    public function destroy($id)
    {
        $service = Service::find($id);
        Storage::delete('public/services/' . $service->photo);
        $service->delete();
        return redirect('/services')->with('success', 'Pakalpojums dzēsts');
    }

    // Atvērt rakstīšanas skatu e-ziņai, kura tiks aizsūtīta administratoriem
    // par pakalpojumu, kuru vēlas piedāvāt pievienošanai
    public function request()
    {
        return view('E-mail/pakalpojums-admin');
    }

    // Aizsūtīt ziņu administratoriem
    public function emailRequest(Request $request)
    {
        // Validācijas noteikumi
        $rules = array(
            'content' => 'between:1,7000',
            'photo' => 'required|image',
        );

        $this->validate($request, $rules);

        // Iegūt ziņu un bildes nosaukumu
        $content = $request->input('content');
        $pictureName = $request->file('photo')->GetClientOriginalName();

        // Iegūt visus administratorus
        $admins = User::where('role_id', '=', 1)->get();
        $adminEmails = array();
        //Ielikt administratoru e-pastus masīvā
        foreach($admins as $admin){
            array_push($adminEmails, $admin->email);
        }

        //Nosūtīt ziņu
        Mail::send('E-mail.requestService', ['mailer' => Auth::user()->email, 'content' => $content], function ($message) use ($request, $pictureName, $adminEmails) {
            $message->from(Auth::user()->email, Auth::user()->name . ' ' . Auth::user()->surname);
            $message->to($adminEmails);
            $message->attach($request->photo, ['as' => $pictureName]);
            $message->subject("Bankett pakalpojuma pieprasījums");
        });

        return redirect()->action('ServicesController@index');
    }

    // Attēlot skatu, lai sazināties ar pakalpojuma sniedzēju
    public function contact($id){
        return view('E-mail/e-zina')->with('serviceId', $id);
    }

    // Nosūtīt ziņu pakalpojuma sniedzējam
    public function emailContact(Request $request)
    {
        // Validācijas noteikumi
        $rules = array(
            'content' => 'between:1,5000',
        );

        $this->validate($request, $rules);

        $content = $request->input('content');
        $serviceId = $request->input('serviceId');
        $service = Service::find($serviceId);
        $contactEmail = $service->email;
        $serviceName = $service->title;

        // Aizsūtīt ziņu
        Mail::send('E-mail.contactService', ['mailer' => Auth::user()->email, 'content' => $content, 'serviceName' => $serviceName], function ($message) use ($contactEmail) {
            $message->from(Auth::user()->email, Auth::user()->name . ' ' . Auth::user()->surname);
            $message->to($contactEmail);
            $message->subject("Bankett ziņa");
        });

        return redirect()->action('ServicesController@index')->with('success', 'Jūsu e-ziņa ir iesutīta pakalpojua sniedzējam');;
    }

    // Pievienot atsauksmi
    public function storeFeedback(Request $request, $id){
        // Attēlot kļūdu tekstu latviešu valodā
        $messages = [
            'between' => 'Ievadītai atsauksmei jābūt no :min līdz :max simbolu skaitam',
        ];

        // Validācijas noteikumi
        $rules = array(
            'text' => 'between:1,1000',
        );

        $this->validate($request, $rules, $messages);

        $feedback = new Feedbacks;
        $feedback->text = $request->input('text');
        $feedback->user()->associate(User::find(Auth::user()->id));
        $feedback->service()->associate(Service::find($id));
        $feedback->save();

        return redirect()->action('ServicesController@show', ['id' => $id])->with('success', 'Atsauksme pievienota');
    }

    // Izdzēst atsauksmi
    public function deleteFeedback($id){
        $feedback = Feedbacks::find($id);
        $serviceId = $feedback->service_id;

        // Ja lietotājs nav administrators vai atsauksmes veidotājs
        // Tad attēlot kļūdu
        if(!(Auth::user()->isAdmin()) && Auth::user()->id != $feedback->user_id){
            return redirect()->action('ServicesController@show', ['id' => $serviceId])->with('error', 'Jums nav tiesības izdzēst cita lietotāja atsauksmi');
        }
        $feedback->delete();
        return redirect()->action('ServicesController@show', ['id' => $serviceId])->with('success', 'Atsauksmes dzēšana veiksmīgi izpildīta');
    }

    // Pievienot favorītiem
    public function addToFavorites($id){
        $user = Auth::user();
        // Pārliecināties, ka šis pakalpojums jau nav favorītos
        $favorite = Favorites::where("user_id", '=', $user->id)->where('service_id','=',$id)->get();
        if (count($favorite)) {
            return redirect()->action('ServicesController@show', ['id' => $id])->with('error', 'Pakalpojums jau ir favorītos');
        }
        // Pievienot favorītiem
        $favorite = new Favorites;
        $favorite->user()->associate(User::find(Auth::user()->id));
        $favorite->service()->associate(Service::find($id));
        $favorite->save();
        return redirect()->action('ServicesController@show', ['id' => $id])->with('success', 'Pakalpojums veiksmīgi pievienots favorītiem');
    }

    // Izņemt no favorītiem
    public function removeFromFavorites($id){
        $favorite = Favorites::find($id);
        $favorite->delete();
        return redirect()->action('ServicesController@favorites')->with('success', 'Pakalpojums ir dzēsts no favorītiem');        
    }
}

<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Attēlot visas ziņas
    public function index()
    {
        $posts = Blog::orderBy('created_at', 'desc')->paginate(10);
        foreach ($posts as $post) {
            $post->text = str_limit($post->text, 100);
        }
        return view('Blog/blogs')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Atvērt ziņas veidošanas skatu
    public function create()
    {
        return view('Blog/zina-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Saglabāt ziņu
    public function store(Request $request)
    {

        // Validācijas noteikumi
        $rules = array(
            'title' => 'required|string|between:1,100',
            'text' => 'required|string|between:1,10000',
            'picture' => 'required|image',
        );

        $this->validate($request, $rules);

        // Pievienot bildi
        $fileNameWithExt = $request->file('picture')->GetClientOriginalName();
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('picture')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('picture')->storeAs('public/posts', $fileNameToStore);

        $post = new Blog;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->picture = $fileNameToStore;
        $post->user()->associate(User::find(Auth::user()->id));
        $post->save();

        return redirect()->action('BlogController@index')->with('success', 'Ziņa tika pievienota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Attēlot ziņu
    public function show($id)
    {
        $post = Blog::find($id);
        return view('Blog/zina')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Ziņas rediģēšanas skats
    public function edit($id)
    {
        $post = Blog::find($id);
        return view('Blog/zina-red')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Rediģēt ziņu
    public function update(Request $request, $id)
    {
        // Valdācijas noteikumi
        $rules = array(
            'title' => 'required|string|between:1,100',
            'text' => 'required|string|between:1,10000',
            'picture' => 'image',
        );

        $this->validate($request, $rules);

        $post = Blog::find($id);
        
        // Izdzēst veco bildi un pievienot jauno bildi,ja tā tika izvēlēta
        if ($request->hasFile('picture')) {
            $fileNameWithExt = $request->file('picture')->GetClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('picture')->storeAs('public/posts', $fileNameToStore);
            Storage::delete('public/posts/' . $post->picture);
            $post->picture = $fileNameToStore;
        }

        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->save();

        return redirect()->action('BlogController@index')->with('success', 'Ziņa atjaunota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Izdzēst ziņu
    public function destroy($id)
    {
        $post = Blog::find($id);
        Storage::delete('public/posts/' . $post->picture);
        $post->delete();
        return redirect('/blog')->with('success', 'Ziņa izdēsta');
    }
}

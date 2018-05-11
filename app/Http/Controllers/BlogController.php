<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('temp/Blog/blogs')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('temp/Blog/zina-add');
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
            'text' => 'required|string|max:10000',
            'picture' => 'image',
        );

        $this->validate($request, $rules);

        //Handle file upload
        if ($request->hasFile('picture')) {
            //Get file name with  the extension
            $fileNameToStore = $request->picture->getClientOriginalName();
            //Upload image
            $path = $request->file('picture')->storeAs('public/posts', $fileNameToStore);
        } else {
            $fileNameToStore = 'posts/noimage.jpg';
        }

        $post = new Blog;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->picture = $fileNameToStore;
        $post->user()->associate(User::find(Auth::user()->id));
        $post->save();

        return redirect()->action('BlogController@index', array($post->id))->withMessage('Pievienota jauna ziņa!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Blog::find($id);
        return view('temp/Blog/zina')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}

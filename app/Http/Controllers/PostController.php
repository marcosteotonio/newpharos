<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Media;
use App\Notices;
use App\Post;
use App\Profile;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Notices::orderBy('created_at', 'desc')->latest()->paginate(10);

        return view('posts.index', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = Profile::all();

        return view('posts.create', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required|min:10',

        ]);

        $slug = str_slug($request->title, '-');
        $request->merge(['slug' => $slug]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = "{$slug}.{$request->image->extension()}";
            $path = "/uploads/notices";
            $destinationPath = public_path($path);
            $image->move($destinationPath, $name);
            $request->merge(['media'=> $name]);
            $request->merge(['media_type'=>'image']);
        }

        $post = Notices::create($request->all());





        return redirect()->route('posts.index')
            ->with('success', 'Noticias criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Notices::find($id);

        return view('posts.edit', compact( 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        request()->validate([
//            'title' => 'required',
//            'description' => 'required|min:10',
//            'media' => 'required',
//        ]);
        $data = $request->all();

        $slug = str_slug($request->title, '-');
        $request->merge(['slug' => $slug]);


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = "{$slug}.{$request->image->extension()}";
            $path = "/uploads/notices";
            $destinationPath = public_path($path);
            $image->move($destinationPath, $name);
            $request->merge(['media'=> $name]);
            $request->merge(['media_type'=>'image']);
        }

        Notices::find($id)->update($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Noticia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Notices::find($id)->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Postagem deletada com sucesso!');
    }
}

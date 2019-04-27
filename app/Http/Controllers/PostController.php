<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Media;
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
        $posts = Post::orderBy('created_at', 'desc')->latest()->paginate(10);

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
            'body' => 'required|min:10',
            'typeFile' => 'required',
        ]);

        $slug = str_slug($request->title, '-');
        $request->merge(['slug' => $slug]);

        $post = Post::create($request->all());

        if ($request->profile_id) {
            $post->profiles()->sync($request->profile_id);
        }

        switch ($request->typeFile) {
            case 'typeImage':

                if ($request->hasFile('image')) {

                    $media = new Media;

                    $image = $request->file('image');
                    $name = "{$slug}.{$request->image->extension()}";
                    $path = "/uploads/posts";
                    $destinationPath = public_path($path);
                    $imagePath = $destinationPath . "/" . $name;
                    $image->move($destinationPath, $name);

                    $media->path = $path . "/" . $name;
                    $media->type = "image";

                    $post->medias()->save($media);
                }

                break;

            case 'typeMovie':

                if ($request->movie) {
                    $media = new Media;
                    $media->path = $request->movie;
                    $media->type = "movie";

                    $post->medias()->save($media);
                }

                break;

            default:
                break;
        }

        return redirect()->route('posts.index')
            ->with('success', 'Postagem criada com sucesso!');
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
    public function edit(Post $post)
    {
        $profiles = Profile::all();

        return view('posts.edit', compact('post', 'profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required|min:10',
            'typeFile' => 'required',
        ]);

        $slug = str_slug($request->title, '-');
        $request->merge(['slug' => $slug]);

        $post->update($request->all());

        // $post->profiles()->detach();
        if ($request->profile_id) {
            $post->profiles()->sync($request->profile_id);
        }

        switch ($request->typeFile) {
            case 'typeImage':

                if ($request->hasFile('image')) {

                    $post->medias()->delete();

                    $media = new Media;

                    $image = $request->file('image');
                    $name = "{$slug}.{$request->image->extension()}";
                    $path = "/uploads/posts";
                    $destinationPath = public_path($path);
                    $imagePath = $destinationPath . "/" . $name;
                    $image->move($destinationPath, $name);

                    $media->path = $path . "/" . $name;
                    $media->type = "image";

                    $post->medias()->save($media);
                }

                break;

            case 'typeMovie':

                if ($request->movie) {

                    $post->medias()->delete();
                    $media = new Media;
                    $media->path = $request->movie;
                    $media->type = "movie";

                    $post->medias()->save($media);
                }

                break;

            default:
                break;
        }

        return redirect()->route('posts.index')
            ->with('success', 'Postagem atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->medias()->count() > 0 && $post->medias[0]->type == "image") {
            unlink(public_path($post->medias[0]->path));
        }

        $post->medias()->delete();
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Postagem deletada com sucesso!');
    }
}

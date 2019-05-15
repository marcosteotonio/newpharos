<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Media;
use App\Notices;
use App\Post;
use App\Profile;
use App\Http\Controllers\Api\HelperController;
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
        $Helper = new HelperController();
        request()->validate([
            'title' => 'required',
            'description' => 'required|min:10',

        ]);
        $video = $Helper->linkSanatizer($request->get('video'));
        $agenciado = $request->get('agenciado') ? json_encode( $request->get('agenciado') ) : null;
        $slug = str_slug($request->title, '-');

        $request->merge([
            'slug' => $slug,
            'video'=> $video,
            'agenciado'=> $agenciado,
            ]);

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
        $profile = Profile::select('user_id','fancy_name')->get();
        
        if ($post->agenciado){
            $agenciados = json_decode($post->agenciado);
            foreach($profile as $key => $value){
                if( in_array(  $value->user_id, json_decode($post->agenciado) ) ){
                    $profiles[] = [
                        'user_id' => $value->user_id,
                        'fancy_name' => $value->fancy_name,
                        'selected' => true,
                    ];
                } else {
                    $profiles[] = [
                        'user_id' => $value->user_id,
                        'fancy_name' => $value->fancy_name,
                        'selected' => false,
                    ];
                }
                
            }
        } else {
            foreach($profile as $key => $value){
                $profiles[] = [
                    'user_id' => $value->user_id,
                    'fancy_name' => $value->fancy_name,
                    'selected' => false,
                ];
            }
        }
        return view('posts.edit', compact( 'post', 'profiles'));
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
        $Helper = new HelperController();

//        request()->validate([
//            'title' => 'required',
//            'description' => 'required|min:10',
//            'media' => 'required',
//        ]);
        $data = $request->all();

        $agenciado = $request->get('agenciado') ? json_encode( $request->get('agenciado') ) : null;
        $slug = str_slug($request->title, '-');
        $request->merge([
            'slug' => $slug,
            'agenciado'=> $agenciado,
            ]);
            
        if($request->get('video')){
            if( strpos( $request->get('video'),'embed') > 0 ){
                $video = $request->get('video');
            } else {
                $video = $Helper->linkSanatizer( $request->get('video') );
            }
            $request->merge([
                'video'=> $video,
            ]);
        }
        // dd($request->all());
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = "{$slug}.{$request->image->extension()}";
            $path = "/uploads/notices";
            $destinationPath = public_path($path);
            $image->move($destinationPath, $name);
            $request->merge(['media'=> $name]);
            $request->merge(['media_type'=>'image']);
        }

        //because of the link sanitazer, I cant let videos null pass throught
        $data = $request->all();
        if( $request->get('video') == null ){
            unset( $data['video'] );
        }


        Notices::find($id)->update($data);

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

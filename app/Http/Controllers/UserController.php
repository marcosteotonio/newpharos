<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Media;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('level', 1)->orderBy('name', 'asc')->latest()->paginate(10);

        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create($request->all());

        if ($request->hasFile('image')) {
            $media = new Media;

            $slug = str_slug($request->name, "-");

            $image = $request->file('image');
            $name = "{$slug}.{$request->image->extension()}";
            $path = "/uploads/users";
            $destinationPath = public_path($path);
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);

            $media->path = $path . "/" . $name;
            $media->type = "image";

            $user->medias()->save($media);
        }

        return redirect()->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->all();

        if (!$request->password) {
            $data = $request->except('password');
        }

        $user->update($data);

        if ($request->hasFile('image')) {
            $user->medias()->delete();

            $media = new Media;
            $slug = str_slug($request->name, "-");
            $image = $request->file('image');
            $name = "{$slug}.{$request->image->extension()}";
            $path = "/uploads/users";
            $destinationPath = public_path($path);
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);

            $media->path = $path . "/" . $name;
            $media->type = "image";

            $user->medias()->save($media);
        }

        return redirect()->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuário deletado com sucesso!');
    }

    public function profile()
    {
        $user = auth()->user();

        return view('profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->all();

        if (!$request->password) {
            $data = $request->except('password');
        }

        $user->update($data);

        if ($request->hasFile('image')) {
            $user->medias()->delete();

            $media = new Media;
            $slug = str_slug($request->name, "-");
            $image = $request->file('image');
            $name = "{$slug}.{$request->image->extension()}";
            $path = "/uploads/users";
            $destinationPath = public_path($path);
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);

            $media->path = $path . "/" . $name;
            $media->type = "image";

            $user->medias()->save($media);
        }

        return redirect()->back()
            ->with('success', 'Seu perfil foi atualizado com sucesso!');
    }
}

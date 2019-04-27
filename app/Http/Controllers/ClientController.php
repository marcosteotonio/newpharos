<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with(['user' => function ($query) {
            $query->where('level', 3)->orderBy('name', 'asc');
        }])->where('status', 1)->latest()->paginate(10);

        return view('clients.index', compact('clients'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function awaiting()
    {
        $clients = Client::with(['user' => function ($query) {
            $query->where('level', 3)->orderBy('name', 'asc');
        }])->where('status', 2)->latest()->paginate(10);

        return view('clients.awaiting', compact('clients'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'contact' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create($request->all());

        $client = new Client();
        $client->contact = $request->contact;
        $client->phone_number = $request->phone_number;
        $client->status = $request->status;

        $user->client()->save($client);

        return redirect()->route('clients.index')
            ->with('success', 'Produtora cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $producer
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $client->user->id,
            'contact' => 'required',
            'phone_number' => 'required',
        ]);

        $client->update($request->all());

        $client->user->name = $request->name;
        $client->user->email = $request->email;

        $client->user->update();

        return redirect()->route('clients.index')
            ->with('success', 'Produtora atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $producer)
    {
        $producer->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Produtora deletada com sucesso!');
    }

    public function solicitation()
    {
        return view("clients.solicitation");
    }
}

<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Client;
use App\Http\Controllers\Controller;
use App\Mail\CartProfiles;
use App\Profile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PDF;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::orderBy('created_at', 'desc')->paginate(15);

        return view('carts.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = Profile::all();
        $clients = Client::all();

        return view('carts.create', compact('profiles', 'clients'));
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
            'client_id' => 'required',
            'profile_id' => 'required_without_all',
        ]);

        $cart = Cart::create($request->all());
        $cart->profiles()->sync($request->profile_id);

        $message = "O pedido foi salvo na lista de carrinhos!";

        $this->savePDF($cart);

        if ($request->action == 'create_send') {
            if (!$this->send($cart)) {
                return redirect()->route('carts.index')
                    ->with('warning', 'Ocorreu um erro ao enviar o pedido!');
            }

            $message = "O pedido foi criado e enviado para produtora!";
        }

        return redirect()->route('carts.index')
            ->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        return view('admin.carts.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function sendCart(Cart $cart)
    {
        if (!$this->send($cart)) {
            return redirect()->route('carts.index')
                ->with('warning', 'Ocorreu um erro ao enviar o pedido!');
        }

        return redirect()->route('carts.index')
            ->with('success', 'O pedido foi enviado para a produtora!');
    }

    /**
     * Gera e salva o PDF
     *
     * @param Cart $cart
     * @return void
     */
    private function savePDF(Cart $cart)
    {
        if ($cart->profiles->count() > 0) {
            $path = "public/uploads/carts/{$cart->id}";
            foreach ($cart->profiles as $profile) {
                if (!file_exists($path)) {
                    File::makeDirectory($path, 0775, true);
                }

                $name = str_slug($profile->user->name);

                PDF::loadView('emails.profile', compact('profile'))->save("{$path}/{$name}.pdf");
            }
        }

        return;
    }

    public function previewPDF(Cart $cart, Profile $profile)
    {
        $path = "public/uploads/carts/{$cart->id}/";
        $nameFile = str_slug($profile->user->name);

        return response()->file("{$path}{$nameFile}.pdf");
    }

    public function send(Cart $cart)
    {
        // return new \App\Mail\CartProfiles($cart);

        try {
            Mail::to($cart->client->user)->send(new CartProfiles($cart));

            $cart->sent = true;
            $cart->save();
        } catch (Exception $e) {
            Log::info('Falha ao enviar pedido via e-mail.', [$e->getMessage()]);

            return false;
        }

        return true;
    }
}

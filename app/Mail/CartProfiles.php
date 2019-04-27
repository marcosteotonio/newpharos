<?php

namespace App\Mail;

use App\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CartProfiles extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The cart instance
     *
     * @var Cart
     */
    public $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('emails.carts.profiles')->subject("Solicitação de agenciados!");
        $path = "uploads/carts/{$this->cart->id}/";
        foreach ($this->cart->profiles as $profile) {
            $nameFile = str_slug($profile->user->name);
            $email->attach(public_path() . "/{$path}{$nameFile}.pdf");
        }

        return $email;
    }
}

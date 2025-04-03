<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;

class ClearExpiredCarts extends Command
{
    protected $signature = 'cart:clear-expired';
    protected $description = 'Supprime les paniers qui ont expiré';

    public function handle()
    {
        $carts = session()->get('cart', []);
        $cart_timestamp = session('cart_timestamp', now());

        if (now()->diffInMinutes($cart_timestamp) > 30) {
            session()->forget('cart');
            session()->forget('cart_timestamp');
            $this->info('Paniers expirés supprimés.');
        } else {
            $this->info('Aucun panier expiré.');
        }
    }
}


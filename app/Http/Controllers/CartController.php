<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];

        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $product = $request->get('product');

        if(session()->has('cart')) {
            
            session()->push('cart', $product);

        } else {

            $products[] = $product;

            session()->put('cart', $products);
        }

        flash('Produto Adicionado no carrinho com Sucesso.')->success();
        return redirect()->route('cart.index');
    }

    public function remove($slug)
    {
        if(!session()->has('cart')) {
            return redirect()->route('cart.index');
        }

        $products = session()->get('cart');

        $products = array_filter($products, function($line) use($slug){
            return $line['slug'] != $slug;
        });

        session()->put('cart', $products);

        flash('Produto removido do carrinho com Sucesso.')->success();
        return redirect()->route('cart.index');
    }

    public function cancel()
    {
        session()->forget('cart');

        flash('Desistência da compra realizada com Sucesso.')->success();
        return redirect()->route('cart.index');
    }
}

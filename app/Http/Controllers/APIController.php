<?php

namespace App\Http\Controllers;

use App\Models\UserCart;
use Illuminate\Http\Request;
use App\Models\PaymentInformation;

class APIController extends Controller
{
    public function userCarts(Request $request){

        $add_order = new UserCart;
        
        $add_order->create([
            'acc_id' => $request['user_id'],
            'category' => $request['category'],
            'title' => $request['title'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'images' => $request['images'],
        ]);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function ex(){
        $cart = UserCart::all();

        return response()->json($cart);
    }

    public function deleteCart(Request $request){
        $id = $request['id'];
        $cart = UserCart::find($id);
        $cart->delete();

        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function allOrders(){
        $orders = PaymentInformation::with('cartPayments')->get();

        return response()->json([
            'orders' => $orders
        ]);
    }
}

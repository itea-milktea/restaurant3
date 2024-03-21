<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use App\Models\UserCart;
use Illuminate\Http\Request;
use App\Models\PaymentInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use App\Models\R5Model\OnlineOrderingAccounts;

class PaymentGatewayController extends Controller
{
    public function index(Request $request, $id)
    {

        $cart = UserCart::where('acc_id', $id)->get();
        $user = User::find($id);
        $date = Carbon::now()->toDateString();
        return view('billing.paymentGateway', compact('cart', 'date', 'user'));
    }

    public function payment(Request $request, $id)
    {
        $cart = UserCart::where('acc_id', $id)->get();
        $user = User::find($id);
        $productItems = [];
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        foreach ($cart as $data) {
            $item_name = $data->title;
            $price = $data->price;
            $quantity = $data->quantity;
            $category = $data->category;

            $total_price = $price * 112;

            $total_price_db = $quantity * $price;

            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $item_name
                    ],
                    'currency' => 'php',
                    'unit_amount' => $total_price
                ],
                'quantity' => $quantity,
            ];
        }

        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items' => [$productItems],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'metadata' => [
                'user_id' => $user->id
            ],
            'customer_email' => $user->email,
            'success_url' => route('success', [
                'acc_id' => $user->id,
                'customer_name' => $user->name,
                'customer_email' => $user->email,
                'item_name' => $item_name,
                'category' => $category,
                'quantity' => $quantity,
                'total_price' => $total_price_db,
            ]),
            'cancel_url' => route('checkout')
        ]);

        return redirect()->away($checkoutSession->url);

    }

    public function success(Request $request)
    {
        $acc_id = $request->query('acc_id');
        $customer_name = $request->query('customer_name');
        $customer_email = $request->query('customer_email');
        $item_name = $request->query('item_name');
        $category = $request->query('category');
        $quantity = $request->query('quantity');
        $total_price = $request->query('total_price');


        $prefix = 'ANAA';
        $sequential_number = mt_rand(10000, 99999);
        $code = mt_rand(10000, 99999);
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // All uppercase letters
        $randomLetters = '';
        $maxIndex = strlen($letters) - 1;
        $length = 2;
        $i = 1;
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, $maxIndex);
            $randomLetters .= $letters[$randomIndex];
        }
        $invoice_number = $prefix . $code . $randomLetters . $i . ' - ' . $sequential_number;



        $user = User::find($acc_id);
        $cartUser = UserCart::where('acc_id', $acc_id)->get();

        $payment_method = 'Card';
        $status = 'Pending';
        $payment_status = 'Paid';
        $invoice = [
            'acc_id' => $acc_id,
            'invoice_no' => $invoice_number,
            'customer_name' => $customer_name,
            'customer_email' => $customer_email,
            'payment_method' => $payment_method,
            'payment_status' => $payment_status,
            'room_no' => $user->userDetails->room_number,
            'status' => $status
        ];

        $status_cart = 'Paid';
        $payment_info = PaymentInformation::create($invoice);
        foreach ($cartUser as $cart) {
            $item_name = $cart->title;
            $payment_status_cart = $status_cart;
            $category = $cart->category;
            $quantity = $cart->quantity;
            $total_price = $cart->price * $quantity;

            if($payment_info){
                $payment_info->cartPayments()->create([
                    'payment_id' => $payment_info->id,
                    'account_id' => $acc_id,
                    'item_name' => $item_name,
                    'category' => $category,
                    'status' => $payment_status_cart,
                    'quantity' => $quantity,
                    'total_price' => $total_price,
                ]);
            }

        }

        Http::post('http://192.168.101.70:8000/api/get-payment-orders', [
            'acc_id' => $acc_id,
            'invoice_no' => $invoice_number,
            'customer_name' => $customer_name,
            'customer_email' => $customer_email,
            'payment_method' => $payment_method,
            'payment_status' => $payment_status,
            'room_no' => $user->userDetails->room_number,
            'status' => $status,

            'payment_id' => $payment_info->id,
            'account_id' => $acc_id,
            'item_name' => $item_name,
            'category' => $category,
            'status_cart' => $payment_status_cart,
            'quantity' => $quantity,
            'total_price' => $total_price,
        ]);

        
    
        $orders = PaymentInformation::where('acc_id', $acc_id)->first();
        return view('completeCheckout.checkoutInvoice', compact('orders'));

    }

    public function cancel()
    {
        return "error";
    }

    public function updateCart(Request $request, $id)
    {
        $quantities = $request->input('quantity');

        foreach ($quantities as $id => $quantity) {

            $item = UserCart::find($id);

            if ($item) {

                $item->quantity = $quantity;
                $item->save();
            }
        }

        return redirect()->back();
    }

    public function deleteItem($id, $item_id)
    {
        $cartItem = UserCart::where('id', $id)->first();

        Http::post('http://192.168.101.70:8000/api/delete-item-invoice', [
            'id' => $id,
            'item' => $item_id
        ]);


        $cartItem->delete();
       

        return redirect()->back();
    }

    public function continueOrder($id){

        $cart = OnlineOrderingAccounts::where('acc_id', $id)->get();

        foreach($cart as $carts){
            $carts->delete();
        }
        Http::post('http://192.168.101.70:8000/api/delete-from-r3-cart', [
            'acc_id' => $id
        ]);

        return redirect('http://192.168.101.70:8000/orders/restaurant-ordering');
    }


    public function cashOnReceipt($id){
        $prefix = 'ANAA';
        $sequential_number = mt_rand(10000, 99999);
        $code = mt_rand(10000, 99999);
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // All uppercase letters
        $randomLetters = '';
        $maxIndex = strlen($letters) - 1;
        $length = 2;
        $i = 1;
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, $maxIndex);
            $randomLetters .= $letters[$randomIndex];
        }
        $invoice_number = $prefix . $code . $randomLetters . $i . ' - ' . $sequential_number;

        $user = User::find($id);

        $cartUser = UserCart::where('acc_id', $user->id)->get();

        $payment_method = 'Cash On Delivery';
        $status = 'Pending';
        $payment_status = 'Pending Payment';
        $invoice = [
            'acc_id' => $user->id,
            'invoice_no' => $invoice_number,
            'customer_name' => $user->name,
            'customer_email' => $user->email,
            'payment_method' => $payment_method,
            'payment_status' => $payment_status,
            'room_no' => $user->userDetails->room_number,
            'status' => $status
        ];

        $status_cart = 'Pending';
        $payment_info = PaymentInformation::create($invoice);
        foreach ($cartUser as $cart) {
            $item_name = $cart->title;
            $payment_status_cart = $status_cart;
            $category = $cart->category;
            $quantity = $cart->quantity;
            $total_price = $cart->price * $quantity;

            if($payment_info){
                $payment_info->cartPayments()->create([
                    'payment_id' => $payment_info->id,
                    'account_id' => $user->id,
                    'item_name' => $item_name,
                    'category' => $category,
                    'status' => $payment_status_cart,
                    'quantity' => $quantity,
                    'total_price' => $total_price,
                ]);
            }

        }

        Http::post('http://192.168.101.70:8000/api/get-payment-orders', [
            'acc_id' => $user->id,
            'invoice_no' => $invoice_number,
            'customer_name' => $user->name,
            'customer_email' => $user->email,
            'payment_method' => $payment_method,
            'payment_status' => $payment_status,
            'room_no' => $user->userDetails->room_number,
            'status' => $status,

            'payment_id' => $payment_info->id,
            'account_id' => $user->id,
            'item_name' => $item_name,
            'category' => $category,
            'status_cart' => $payment_status_cart,
            'quantity' => $quantity,
            'total_price' => $total_price,
        ]);

        $orders = PaymentInformation::where('acc_id', $user->id)->first();
        return view('completeCheckout.checkoutInvoice', compact('orders'));
    }
}

<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\R1Model\Tables;
use App\Models\R1Model\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentGatewayReservationController extends Controller
{
    public function paymentReservation(Request $request){
        Stripe::setApiKey(config('stripe.sk'));

        $user = Auth::user();

        $table = Tables::find($request['table_id'])->first();
        $name = $request['name'];
        $email = $request['email'];
        $tel_number = $request['tel_number'];
        $res_date = $request['res_date'];
        $table_id = $request['table_id'];
        $guest_no = $request['guest_number'];
        $location = $request['location'];
        $price = $table->price;
        $table_name = $table->name;

        $total_price = $price * 100;

        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'php',
                        'product_data' => [
                            "name" => $table->name
                        ],
                        'unit_amount' => $total_price,
                    ],
                    'quantity' => 1,
                ],
            ],
            'customer_email' => $email,
            'mode' => 'payment',
            'success_url' => route('success_table_reservation',[
                'name' => $name,
                'email' => $email,
                'tel_number' => $tel_number,
                'res_date' => $res_date,
                'table_name' => $table_name,
                'guest_number' => $guest_no,
                'location' => $location,
                'total_price' => $total_price
            ]),
            'cancel_url' => route('checkout'),
        ]);


        return redirect()->away($session->url);
    }

    public function success(Request $request){
        $name = $request->query('name');
        $email = $request->query('email');
        $tel_number = $request->query('tel_number');
        $res_date = $request->query('res_date');
        $table_name = $request->query('table_name');
        $guest_number = $request->query('guest_number');
        $location = $request->query('location');
        $total_price = $request->query('total_price');

        $reservation = new Reservation;
        $payment_status = 'Paid';
        if($reservation){
            $reservation->create([
                'name' => $name,
                'email' => $email,
                'tel_number' => $tel_number,
                'res_date' => $res_date,
                'table_id' => $table_name,
                'guest_number' => $guest_number,
                'location' => $location,
                'payment_status' => $payment_status
            ]);

            Http::post('http://192.168.101.86:8000/api/get-reservation-data', [
                'name' => $name,
                'email' => $email,
                'tel_number' => $tel_number,
                'res_date' => $res_date,
                'table_id' => $table_name,
                'guest_number' => $guest_number,
                'location' => $location,
                'payment_status' => $payment_status
            ]);

            $reserve = Reservation::where('email', $email)->first();

            return view('r1Receipt.reservationReceipt', compact('reserve', 'total_price','table_name'));
        }else{
            Alert::error('Something went wrong', 'Please try again');
            return redirect()->back();
        }
    }
}

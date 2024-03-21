<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\R1Model\EventReservation;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentGatewayEventController extends Controller
{
    public function eventPayment(Request $request, $id){
        Stripe::setApiKey(config('stripe.sk'));

        $user = Auth::user();

        $name = $request['name'];
        $email = $request['email'];
        $tel_number = $request['tel_number'];
        $guest_number = $request['guest_number'];
        $event_type = $request['event_type'];
        $downpayment = 5000;
        $other_request = $request['other_request'];
        $payment_status = $request['payment_status'];
        $res_date = $request['res_date'];


        $reservation = $event_type.' Reservation';
        $total_price = $downpayment * 100;

        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'php',
                        'product_data' => [
                            "name" => $reservation
                        ],
                        'unit_amount' => $total_price,
                    ],
                    'quantity' => 1,
                ],
            ],
            'customer_email' => $email,
            'mode' => 'payment',
            'success_url' => route('event.success',[
                'name' => $name,
                'email' => $email,
                'tel_number' => $tel_number,
                'res_date' => $res_date,
                'guest_number' => $guest_number,
                'event_type' => $event_type,
                'other_request' => $other_request,
                'payment_status' => $payment_status,
                'downpayment' => $downpayment
            ]),
            'cancel_url' => route('checkout'),
        ]);


        return redirect()->away($session->url);
    }

    public function success(Request $request){
        $name = $request->query('name');
        $email = $request->query('email');
        $tel_number = $request->query('tel_number');
        $guest_number = $request->query('guest_number');
        $event_type =$request->query('event_type');
        $downpayment = $request->query('downpayment');
        $other_request = $request->query('other_request');
        $res_date = $request->query('res_date');


        $reservation = new EventReservation;
        $payment_status = 'Paid';
        if($reservation){
            $reservation->create([
                'name' => $name,
                'email' => $email,
                'tel_number' => $tel_number,
                'res_date' => $res_date,
                'guest_number' => $guest_number,
                'event_type' => $event_type,
                'other_request' => $other_request,
                'payment_status' => $payment_status,
                'downpayment' => $downpayment
            ]);

            Http::post('http://192.168.101.86:8000/api/get-event-reservation-data', [
                'name' => $name,
                'email' => $email,
                'tel_number' => $tel_number,
                'res_date' => $res_date,
                'guest_number' => $guest_number,
                'event_type' => $event_type,
                'other_request' => $other_request,
                'payment_status' => $payment_status,
                'downpayment' => $downpayment
            ]);

            $reserve = EventReservation::where('email', $email)->first();
            return view('r1Receipt.eventReceipt', compact('reserve'));
        }else{
            Alert::error('Something went wrong', 'Please try again');
            return redirect()->back();
        }
        
    }
}

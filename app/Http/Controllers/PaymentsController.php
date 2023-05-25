<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmMail;
use App\Http\Controllers\BookingsController;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use Vonage\Client;



class PaymentsController extends Controller
{

    public function pay(Request $request){

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $confirmation_code = '';
        $length = strlen($characters);
        
        for ($i = 0; $i < 6; $i++) {
            $confirmation_code .= $characters[mt_rand(0, $length - 1)];
        }

        $roomType = $request->input('type');
        $nights = $request->input('nights');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');
        $roomId = $request->input('roomId');
        $guests = $request->input('guests');
        $price = $request->input('price');
        $user = Auth::user();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            Stripe\Charge::create ([
                "amount" => $price * 100,
                "currency" => "gbp",
                "source" => $request->stripeToken,
                'metadata' => [
                    'Confirmation Code' => $confirmation_code,
                    'Booked By (id)' => $user->id,
                    'Cardholder name' => $request['name'],
                    'Room Type' => $roomType,
                    'Nights' => $nights,
                    'Price per night' => $price/$nights,
                    'Check In Date' => $checkin,
                    'Check Out Date' => $checkout,
                    'Room Id' => $roomId,
                    'Number of Guests' => $guests,
                ],
                "description" => "Booking payment by: ".$user->name.' '.$user->surname.'.',
            ]);
        }
        catch (\Stripe\Exception\CardException $e) {
            if ($e->getStripeCode() === 'requires_action') {
                $error = [
                    'title' => "This transaction requires authentication",
                    'paragraph' => "We apologize for the inconvenience, but we were unable to complete your payment as it requires additional authentication. This extra security measure is in place to protect you and your payment information from fraud. If you have any questions or need assistance, please don't hesitate to contact us. We appreciate your patience and cooperation in helping us ensure the security of your payment.",
                ];
                return view('error', compact('error'));
            } else {
                $error = [
                    'title' => $e->getMessage(),
                    'paragraph' => "We're sorry, but we were unable to process your payment. This could be due to a variety of reasons, including insufficient funds, an expired card, or incorrect details. Please double-check your payment details and try again. If you're still having trouble, please contact your bank or try a different payment method. We apologize for any inconvenience this may have caused and thank you for your patience and understanding.",
                ];
                return view('error', compact('error'));

                
            }
        }

   
        Session::flash('success', 'Payment successful!');

        $user = Auth::user();
        $booking = Booking::create([
            'confirmation_code' => $confirmation_code,
            'booked_at' => date('Y-m-d'),
            'user_id' => $user->id,
            'room_id' => $request['roomId'],
            'check_in_date' => $request['checkin'],
            'check_out_date' => $request['checkout'],
            'guests' => $guests,
            'price' => $price,
        ]);

        Mail::to($user->email)->send(new ConfirmMail($confirmation_code, $user->name, $request['checkin'], $request['checkout'], $guests, $roomType, $price));

        $basic  = new \Vonage\Client\Credentials\Basic("9e0fb6b0", "YSzqECF8hFamuNQS");
        $client = new \Vonage\Client($basic);
        $client->setHttpClient(new \GuzzleHttp\Client(['verify' => false]));

        $text = 'Hi '.$user->name.'. Your booking was successful. Confirmation code: #'.$confirmation_code;

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("447311550508", 'The Crown', $text)
        );

        return view('success', compact('booking'));
    }
}

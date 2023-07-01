<?php

namespace App\Http\Controllers;

use DateTime;
use GuzzleHttp\Client;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    // Show Register Form
    public function registerPhone() {
        return view('users.register_phone')->with('title', 'Register');
    }


    // Store code and phone and Show code verification view
    public function verify(Request $request)
    {
        function send($response, $phone, $codeSentTime) {
            // dd($phone, $response, $time);

            $html = view('users.register_verify', compact('phone', 'response', 'codeSentTime'))->render();

            return response()->json([
                'html' => $html,
                'phone' => $phone,
                'response' => $response,
                'codeSentTime' => $codeSentTime,
            ]);
        }

        $request->validate(
            [
                'phone' => ['required', 'regex:/^01[3-9]\d{8}$/']
            ],
            [
                'phone' => ['ফোন নম্বরটি সঠিক নয়']
            ]
        );

        $phone = $request->phone;
        $code = rand(10000, 99999);

        $verification = Verification::where('phone', $phone)->first();

        if ($verification) {
            $codeSentTime = new DateTime($verification->updated_at);
            $currentTime = new DateTime();

            $difference = $currentTime->getTimestamp() - $codeSentTime->getTimestamp();

            if($difference <= 7) {
                return send('none', $phone, $verification->updated_at);
            }
            else {
                // Update existing record
                $verification->code = $code;
                $verification->save();
            }
        } else {
            // Create new record
            $verification = new Verification();
            $verification->phone = $phone;
            $verification->code = $code;
            $verification->save();
        }


        $url = 'http://api.greenweb.com.bd/api.php';
        $message = $code . " is your OTP code for তুমিও পারবে";
        $data = array(
                        'to' => $phone,
                        'message' => $message,
                        'token' => '96480256571687553817f2b04c4e726a6931f8ada2dff09d61a'
                    );

        $client = new Client();
        $response = $client->post($url, ['form_params' => $data]);

        // Process the response
        if ($response->getStatusCode() == 200) {
            $responseData = $response->getBody()->getContents();

            return send($responseData, $phone, $verification->updated_at);

        } else {
            $errorCode = $response->getStatusCode();

            return send($errorCode, $phone, $verification->updated_at);
        }

    }


    // Verify Code and Show Registration Form
    public function register(Request $request) {
        $phone = $request->phone;

        $request->validate(
            [
                'code' =>
                [
                        'required',
                        Rule::exists('verifications')->where(function ($query) use ($phone) {
                        $query->where('phone', $phone);
                    })
                ]
            ],
            [
                'code' => ['কোডটি সঠিক নয়']
            ]
        );

        return view('users.register_form');
    }

    // Show Login Form
    public function login() {
        return view('users.login')->with('title', 'Student Login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function index()
    {


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://maytapi-whatsapp.p.rapidapi.com/15701/screen",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: maytapi-whatsapp.p.rapidapi.com",
                "x-rapidapi-key: ad51d62d52msh403618c1113ce3ep1f1609jsn618d21b54d29",
            ],
        ]);
        //$response=utf8_decode(curl_exec($curl));
        $response =base64_encode(curl_exec($curl)) ;
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return view('images', compact('response')) ;
        }


    }
}

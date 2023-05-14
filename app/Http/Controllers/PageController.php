<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
//use Mail;
//use Illuminate\Mail\NewMail;


class PageController extends Controller
{
    public function pay()
    {
        return view('payment');
    }

    public function formulir()
    {
        return view('home');
    }

    public function proses (Request $request){
        $payment_code = $request->input('payment_code');
        $amount = (int)$request->input('amount');
        $name = $request->input('name');

        // Link untuk validate
        $url = "https://do27w.mocklab.io/pay/validate";

        // dari link Url tersebut maka akan ditetapkan sebagai pilihan url
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Accept: application/json",
        "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // menyimpan dalam bentuk array yang disimpan di variable dt
        $dt = array(
            "payment_code" => $payment_code,
            "amount" => $amount,
            "name" => $name
        );
        // mengubah format data array menjadi JSON
        $encodeDt = json_encode($dt);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $encodeDt);

        // memberikan response dari hasil vadilate
        $resp = curl_exec($curl);
        curl_close($curl);
        // mengubah object JSON menjadi objek PHP yang dimasukkan dalam variable decodeDt
        $decodeDt = json_decode($resp);
        $message =  $decodeDt->message;

        echo "<h1> Email : ". $message. "</h1>";

        if (str_contains($message,'Success')){
            echo  '<h2> Silahkan Cek Email Anda </h2>';
            return redirect()->route('sendemail');
        }else{
            echo '<h2> Proses Gagal </h2>';
        }
    }
}

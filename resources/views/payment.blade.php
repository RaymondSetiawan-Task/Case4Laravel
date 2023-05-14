
<!DOCTYPE html>
<html>
    <body>
        <?php
        $payment_code = "BTX001VIP";
        $amount = 100000;
        $name = "Raymond Setiawan";

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

        // memberikan response dari hasil validate
        $resp = curl_exec($curl);
        curl_close($curl);

        // mengubah object JSON menjadi objek PHP yang dimasukkan dalam variable decodeDt
        $decodeDt = json_decode($resp);
        $message =  $decodeDt->message;

        echo "<h1><font color='lime'> ". $message. "</font></h1>";


        if (str_contains($message,'Success')){
            echo  "<h2> <font color='blue'> Silahkan Cek Email Anda </font></h2>";
        }else{
            echo '<h2> Proses Gagal </h2>';
        }

        ?> 
    </body>
</html>

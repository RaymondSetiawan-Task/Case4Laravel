<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Process Pembayaran Tiket</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </head>

    <body>
    <form class="form-horizontal" role="form" method="post" action="/payment" >
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
    <div class="container">	
                <div class="text-bg-success p-3">
                    <h1>Pembayaran Tiket BTX</h1>
                </div>
                <br>
                <div class="col-auto fs-5" >
                    <label for="nmBayar" class="col-form-label">Nama Bayar : </label>
                    <input class="form-control" type="text" id="name" name="name" value="Raymond Setiawan" readonly>
                    
                </div>
                
                <div class="col-auto fs-5" >
                    <label for="kdbayar" class="col-form-label">Kode Bayar : </label> 
                    <input class="form-control" type="text" id="payment_code" name="payment_code" value="BTX001VIP" readonly >
                </div>
            
                <div class="col-auto fs-5" >
                    <label for="jmlhBayar" class="col-form-label">Jumlah Bayaran : </label> 
                    <input class="form-control" type="text" id="amount" name="amount" value="100000" readonly>
                    
                </div>
                            
                <br>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg">Payment Process</button>
                </div>
            
        </div>
    </form>
    </body>
</html>
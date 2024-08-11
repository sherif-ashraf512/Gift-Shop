<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>download PDF</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/bootstrap.css', 'resources/css/main.css' , 'resources/js/bootstrap.js' ])
</head>
<body>
    <div class="container p-2">
        <div class="mt-3">
            <div class="mb-5">
                <h2>Receiver Info</h2>
                <div class="w-25 rec-info border border-3 rounded p-2 border-black">
                    <h4>Name: {{$order->rec_name}}</h4>
                    <h4>Address: {{$order->rec_address}}</h4>
                    <h4>Phone: {{$order->rec_phone}}</h4>
                </div>
            </div>
            <div class="text-center">
                <h2 class="text-decoration-underline">Product Info</h2>
                <div>
                    <img width="150" src="{{"storage/".$order->product->image}}" alt="...">
                    <h3>Title: {{$order->product->title}}</h3>
                    <h3>Price: {{$order->product->price}}</h3>
                    <h3>Payment status: {{$order->payment_status}}</h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

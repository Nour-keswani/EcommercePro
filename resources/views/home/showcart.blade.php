<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style type="text/css">

        button.colse {
            right: 20px;
            position: absolute;
        }
        .h1_center {
            text-align: center;
            font-weight: 800;
            font-size: 30px;
            padding: 20px

        }
        .center {
            text-align: center;
            margin: 20px auto;
        }
        caption {
            display: table-caption;
            text-align: center;
            font-weight: 800;
            font-size: 30px;
            border: 2px solid #000;
            border-bottom: thin;
            background: #f8444e;
            color: aliceblue;
        }
        table,th,td {
            border: 1px solid #000;
            padding: 20px;
            margin-top: 10%
        }
        .th_deg {
            padding: 20px;
            background-color: silver;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')


        @if (session()->has('messages'))
            <div class="alert alert-success">
                <button type="button" class="colse" data-dismiss="alert"
                aria-hidden="true">X</button>
                {{ session()->get('messages') }}
            </div>
        @endif
        <div class="center">
            <table>
                <caption style="caption-side:top">CART SHOP</caption>
                <tr>
                    <th class="th_deg">#</th>
                    <th class="th_deg">Product Titlte: </th>
                    <th class="th_deg">Product Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Action</th>
                </tr>

                <?php $totalprice=0; ?>
                <?php $totalproduct=1; ?>

                @foreach ($cart as $cart)

                <tr>
                    <td><?php echo $totalproduct; ?></td>
                    <td>{{ $cart->product_title }}</td>
                    <td>{{ $cart->quntity }}</td>
                    <td>€{{ $cart->price }}</td>
                    <td><img src="/product/{{ $cart->image }}" width="80px" height="80px"/></td>
                    <td>
                        <a onclick="return confirm('Are you sure to remove this product?')"
                            href="{{ url('/remove_cart',$cart->id) }}"
                            class="btn btn-danger">Remove</a>
                    </td>
                </tr>
                <?php $totalproduct++; ?>
                <?php $totalprice = $totalprice + $cart->price ?>
                @endforeach
            </table>
            <div>
                <h1 class="h1_center">Total Price: €{{ $totalprice }}</h1> <hr>
            </div>
            <div>
                <h1 class="h1_center">Procced to Order</h1>
                <a href="{{ url('cash_order',$totalproduct) }}" class="btn btn-danger">Cash on Delivery</a>
                <a href="{{ url('stripe',$totalprice) }}" class="btn btn-danger">Pay Using Card</a>
            </div>
        </div>
    </div>
      <!-- footer start -->
      {{-- @include('home.footer') --}}
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>

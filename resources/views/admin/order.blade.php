<!DOCTYPE html>
<html lang="en">
    <head>
    @include('admin.css')
    <style type="text/css">
        button.colse {
            right: 20px;
            position: absolute;
        }
        .alert.alert-success {
            text-align: center;
            font-weight: 900;
            font-size: larger;
            width: 320px;
            align-items: center;
            display: flex;
            left: 72%;
        }
        .div_center {
            text-align: center;
            padding-top: 20px;
        }
        .h2_font {
            font-size: 30px;
            font-weight: bold;
        }
        table.table_deg {
            width: 80%;
        }
        table, th, td {
            border: 2px solid #fff;
            margin: 10px auto;
            border-spacing: 0px;
        }
        table tr {
            font-size: 18px;
        }
        thead {
            background: silver;
            color: black;
            height: 50px;
        }
        tbody {

        }
    </style>
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
            <!-- partial -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="colse" data-dismiss="alert"
                            aria-hidden="true">X</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="div_center">
                        <h2 class="h2_font">All Orders</h2>
                        <table class="table_deg">
                            <tr>
                                <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Product Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Image</th>
                                    <th colspan="2">Action</th>
                                </thead>
                            </tr>
                            @foreach ($orders as $order)

                            <tr>
                                <tbody>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->product_title }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->delivery_status }}</td>
                                    <td>
                                        <img width="75px" height="75px"
                                            src="product/{{ $order->image }}" />
                                    </td>
{{-- TODO --}}
                                    <th>
                                        <a onclick="return confirm('Are You Sure To Remove This Order?')"
                                            href="{{ url('delete_order',$order->id) }}"
                                            class="btn btn-danger">Remove</a>
                                    </th>

                                    <th>
                                        @if($order->delivery_status=='processing')
                                            <a href="{{ url('delivered',$order->id) }}"
                                                class="btn btn-primary">Delivered</a>
                                        @else
                                            <h1 >Delivered</h1>
                                        @endif
                                    </th>

                                </tbody>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
    </body>
</html>



<!DOCTYPE html>
<html lang="en">
    <head>
    @include('admin.css')
    <style type="text/css">
        button.colse {
            right: 20px;
            position: absolute;
        }
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid #fff;
        }
        .th_color{
            background: silver;
            color: #000;
        }
        .th_deg {
            padding: 20px
        }
        img{
            width: 90px;
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

                    @if (session()->has('meesage'))
                        <div class="alert alert-success">
                            <button type="button" class="colse" data-dismiss="alert"
                            aria-hidden="true">X</button>
                            {{ session()->get('meesage') }}
                        </div>
                    @endif

                    <div class="div_center">
                        <h2 class="h2_font">All Products</h2>
                    </div>

                    <table class="center">
                        <tr class="th_color">
                            <th class="th_deg">title</th>
                            <th class="th_deg">Description</th>
                            <th class="th_deg">Quantity</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Discount</th>
                            <th class="th_deg">Category</th>
                            <th class="th_deg">Image</th>
                            <th class="th_deg">Edit</th>
                            <th class="th_deg">Delete</th>
                        </tr>

                        @foreach ($product as $product)
                        <tr>
                            <th>{{ $product->title }}</th>
                            <th>{{ $product->description }}</th>
                            <th>{{ $product->quantity }}</th>
                            <th>{{ $product->price }}</th>
                            <th>{{ $product->discount_price }}</th>
                            <th>{{ $product->category }}</th>
                            <th>
                                <img src="/product/{{ $product->image }}" />
                            </th>
                            <th>
                                <a class="btn btn-success"
                                    href="{{ url('edit_product',$product->id) }}">Edit</a>
                            </th>
                            <th>
                                <a onclick="return confirm('Are You Sure To Delete This?')"
                                class="btn btn-danger"
                                href="{{ url('delete_product',$product->id) }}">Delete</a>
                            </th>
                        </tr>
                        @endforeach

                    </table>

                </div>
            </div>
            <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
    </body>
</html>

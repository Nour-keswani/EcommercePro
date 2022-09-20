<!DOCTYPE html>
<html lang="en">
    <head>
    <base href="/public">
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
        .text_color {
            color: #000;
            padding-bottom: 20px
        }
        select.text_color{
            padding-bottom: 5px
        }
        label {
            display: inline-block;
            width: 200px
        }
        .div_design {
            padding-bottom: 15px
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
                        <h2 class="h2_font">Edit Product</h2>

                        <form action="{{ url('/edit_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="div_design">
                                <label for="">Product Title :</label>
                                <input class="text_color" type="text" name="title" placeholder="Write a title" value="{{ $product->title }}" required>
                            </div>

                            <div class="div_design">
                                <label for="">Product Description :</label>
                                <input class="text_color" type="text" name="description" placeholder="Write a Description" value="{{ $product->description }}" required>
                            </div>

                            <div class="div_design">
                                <label for="">Product Quantity :</label>
                                <input class="text_color" type="number" name="quantity" placeholder="Write a Quantity" value="{{ $product->quantity }}" required>
                            </div>

                            <div class="div_design">
                                <label for="">Product Price :</label>
                                <input class="text_color" type="number" name="price" placeholder="Write a Price" value="{{ $product->price }}" required>
                            </div>

                            <div class="div_design">
                                <label for="">Discount Price :</label>
                                <input class="text_color" type="number" name="dis_price" placeholder="Write a Discount" value="{{ $product->discount_price }}">
                            </div>

                            <div class="div_design">
                                <label for="">Product Category :</label>
                                <select class="text_color" name="category" id="" required>
                                    <option value="" selected="" value="{{ $product->category }}">
                                        {{ $product->category }}
                                    </option>

                                    @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">
                                        {{ $category->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="div_design">
                                <label for="">Current Product Image :</label>
                                <img width="100" height="100" style="margin: auto"
                                    src="/product/{{ $product->image }}" />
                            </div>

                            <div class="div_design">
                                <label for="">Change Product Image :</label>
                                <input type="file" name="image">
                            </div>

                            <div class="div_design">
                                <input class="btn btn-primary" type="submit" name="submit" value="Edit Product">
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
    </body>
</html>


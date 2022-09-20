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
                        <h2 class="h2_font">Add Product</h2>

                        <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="div_design">
                                <label for="">Product Title :</label>
                                <input class="text_color" type="text" name="title" placeholder="Write a title" required>
                            </div>

                            <div class="div_design">
                                <label for="">Product Description :</label>
                                <input class="text_color" type="text" name="description" placeholder="Write a Description" required>
                            </div>

                            <div class="div_design">
                                <label for="">Product Quantity :</label>
                                <input class="text_color" type="number" name="quantity" placeholder="Write a Quantity" required>
                            </div>

                            <div class="div_design">
                                <label for="">Product Price :</label>
                                <input class="text_color" type="number" name="price" placeholder="Write a Price" required>
                            </div>

                            <div class="div_design">
                                <label for="">Discount Price :</label>
                                <input class="text_color" type="number" name="dis_price" placeholder="Write a Discount">
                            </div>

                            <div class="div_design">
                                <label for="">Product Category :</label>
                                <select class="text_color" name="category" id="" required>
                                    <option value="" selected="">
                                        Add a category here
                                    </option>

                                    @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">
                                        {{ $category->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="div_design">
                                <label for="">Product Image Here :</label>
                                <input type="file" name="image">
                            </div>

                            <div class="div_design">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Product">
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

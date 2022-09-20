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
        .input_color {
            color: #000;
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
                <h2 class="h2_font">Add Category</h2>
                <form action="{{ url('/add_category') }}" method="POST">
                    @csrf
                    <input type="text" name="category" placeholder="write category name" class="input_color" required>
                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">

                </form>
            </div>

            <table class="center">
                <tr class="th_color">
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>

                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->category_name }}</td>
                    <td>
                        <a  onclick="return confirm('Are You Sure To Delete This?')"
                            class="btn btn-danger"
                            href="{{ url('delete_category',$data->id) }}">Delete</a>
                    </td>
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

<section class="product_section layout_padding" id="producten">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">

        @foreach ($product as $products)

          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ url('product_details',$products->id) }}" class="option1">
                      Product Details
                      </a>

                      <form action="{{ url('add_cart',$products->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="number" name="quant" value="1" min="1" max="25">
                            <input type="submit" value="Add to Cart">
                        </div>
                      </form>

                   </div>
                </div>
                <div class="img-box">
                   <img src="product/{{ $products->image }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{ $products->title }}
                   </h5>

                   @if ($products->discount_price!=null)
                   <h6 style="color: #f00">
                        Discount Price <br />
                      €{{ $products->discount_price }}
                   </h6>

                    <h6 style="text-decoration: line-through; color:blue;">
                        Price <br />
                        €{{ $products->price }}
                    </h6>

                    @else
                    <h6 style="color:black; font-weight: 800;">
                        Price <br />
                        €{{ $products->price }}
                    </h6>


                   @endif


                </div>
             </div>
          </div>

        @endforeach

        <div class="mx-auto p-10 w-4/5">
            {!! $product->links() !!}
        {{-- {!! $product->withQueryString()->links('pagination::bootstrap-5') !!} --}}
        </div>

       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>

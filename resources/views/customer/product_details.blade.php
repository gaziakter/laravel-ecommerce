@extends('customer.layouts.template')
@section('page_title')
Prodcut Details - Ecommerce website
@endsection
@section('content')
<div class="product-details-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                   <div class="electronic_img"><img src="{{ asset($products->product_img) }}"></div>
                </div>
             </div>
             <div class="col-lg-8 col-sm-8">
                <div class="box_main">
                   <h4 class="shirt_text text-left">{{ $products->product_name }}</h4>
                   <p class="price_text text-left">Start Price  <span style="color: #262626;">$ {{ $products->price }}</span></p>
                   <div class="my-3 product-details">
                    <p class="lead">{{ $products->product_short_des }}</p>
                   </div>
                   <div class="btn_main">
                      <div class="buy_bt"><a href="#">Buy Now</a></div>
                   </div>
                   <ul class="p-2 bg-light my-2">
                    <li>Category : {{ $products->product_category_name }}</li>
                    <li>Sub Category : {{ $products->product_sub_category_name }}</li>
                 </ul>
                </div>
             </div>
        </div>
    </div>
    <div class="container">
        <h1 class="fashion_taital">Related Products</h1>
        <div class="fashion_section_2">
           <div class="row">
            @foreach ( $related_product as $item)
            <div class="col-lg-4 col-sm-4">
               <div class="box_main">
                  <h4 class="shirt_text">{{ $item->product_name }}</h4>
                  <p class="price_text">Price  <span style="color: #262626;">$ {{ $item->price }}</span></p>
                  <div class="tshirt_img"><img src="{{ asset($item->product_img) }}"></div>
                  <div class="btn_main">
                     <div class="buy_bt"><a href="#">Buy Now</a></div>
                     <div class="seemore_bt"><a href="{{ route('product.details', [$item->id, $item->slug]) }}">See More</a></div>
                  </div>
               </div>
            </div>              
            @endforeach
           </div>
        </div>
     </div>
</div>
@endsection

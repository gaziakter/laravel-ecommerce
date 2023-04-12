@extends('customer.layouts.template')
@section('page_title')
Category - Ecommerce website
@endsection
@section('content')
<div class="category-product">
    <div class="container">
        <h1 class="fashion_taital">{{ $categories->category_name }}</h1>
        <div class="fashion_section_2">
           <div class="row">
              @foreach ($products as $item)
              <div class="col-lg-4 col-sm-4">
                 <div class="box_main">
                    <h4 class="shirt_text">{{ $item->product_name }}</h4>
                    <p class="price_text">Price  <span style="color: #262626;">$ {{ $item->price }}</span></p>
                    <div class="tshirt_img"><img src="{{ asset($item->product_img) }}"></div>
                    <div class="btn_main">
                       <div class="buy_bt">
                        <div class="buy_bt">
                           <form action="{{ route('add.to.cart') }}" method="POST">
                              @csrf
                              <input type="hidden" name="product_id" value="{{ $item->id }}">
                              <input type="hidden" name="unit_price" value="{{ $item->price }}">
                              <input type="hidden" name="quantity" value="1">
                              <input type="submit" value="Buy Now" class="btn btn-warning">
                           </form>
                        </div>
                       </div>
                       <div class="seemore_bt"><a href="#">See More</a></div>
                    </div>
                 </div>
              </div>
              @endforeach
           </div>
        </div>
     </div>
</div>
@endsection
@extends('admin.layouts.template')
@section('page_title')
Fianl Page - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Final Page</h5>
          </div>
          <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Your Shipping Address :</label>
                <div class="col-sm-10">
                  <p>
                    {{ $shipping_address->address_info }}
                    {{ $shipping_address->city_name }},
                    {{ $shipping_address->post_code }},
                    {{ $shipping_address->phone_number }}
                  </p>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product :</label>
                <div class="col-sm-10">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                          <thead class="table-light">
                            <tr>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th>Unit Price</th>
                              <th>Total Price</th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                              @php
                                  $total = 0;
                              @endphp
                            @foreach ($cart_item as $item)
                            @php
                              $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                            @endphp
                            <tr>
                              <td>{{ $product_name }}</td>
                              <td>{{ $item->quantity }}</td>
                              <td>{{ $item->unit_price }}</td>
                              <td>{{ $item->total_price }}</td>
                            @php
                                $total =   $total + $item->total_price;
                            @endphp
                            @endforeach
                            <tr>
                              <td colspan="3"><b>Total Price</b></td>
                              <td><b>{{ $total }}</b></td>
                            </tr>
                            <tr>
                              <td>
         
                                <form action="" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-danger"  value="Cancell Order">
                                </form>
                              </td>
                              <td>
                                <form action="{{ route('make.order') }}" method="POST">
                                    @csrf
                                    <input type="submit" class="btn btn-primary"  value="Place Order">
                                </form>
                            </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                </div>
              </div>
        </div>
      </div>
</div>
@endsection
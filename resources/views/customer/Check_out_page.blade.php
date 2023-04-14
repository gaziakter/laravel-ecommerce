@extends('admin.layouts.template')
@section('page_title')
Checkout Page - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Prossege to Checkout</h5>
          </div>
          <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('place.order') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Phone Number</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="01783943225">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Adderss</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address_info" name="address_info" placeholder="Dhampti, Debidwar">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">City</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Cumilla">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Post code</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="post_code" name="post_code" placeholder="3533">
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Next</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection
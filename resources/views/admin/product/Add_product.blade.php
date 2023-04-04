@extends('admin.layouts.template')
@section('page_title')
Add New Product  - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Product</h5>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="category_sub_name" name="category_sub_name" placeholder="Siling Fan">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="product_price" name="product_price" placeholder="100">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="long_description" id="long_description" cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="defaultSelect" class="col-sm-2 col-form-label">Select Category</label>
                <div class="col-sm-10">
                    <select id="category" name="category" class="form-select">
                        <option>Select Category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>               
              </div>
              <div class="row mb-3">
                <label for="defaultSelect" class="col-sm-2 col-form-label">Select Sub Category</label>
                <div class="col-sm-10">
                    <select id="sub_category" name="sub_category" class="form-select">
                        <option>Select Sub Category</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>               
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" id="inputGroupFile02">
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection
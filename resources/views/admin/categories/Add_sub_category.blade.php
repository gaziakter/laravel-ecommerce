@extends('admin.layouts.template')
@section('page_title')
Add New Sub Catetory - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Sub Category</h5>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="category_sub_name" name="category_sub_name" placeholder="Siling Fan">
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
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Sub Category</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection
@extends('admin.layouts.template')
@section('page_title')
Edit Sub Catetory - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Sub Category</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('update.sub.category') }}" method="POST">
              @csrf
              <input type="hidden" name="sub_category_id" value="{{ $editcate->id }}">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Edit Sub Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" value="{{ $editcate->sub_category_name }}">
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit Sub Category</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection
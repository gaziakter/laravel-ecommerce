@extends('admin.layouts.template')
@section('page_title')
Edit Catetory - Ecommerce website
@endsection
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Category</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('update.category') }}" method="POST">
              @csrf
              <input type="hidden" value="{{ $categories->id }}" name="category_id">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $categories->category_name }}">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit Category</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection
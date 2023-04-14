@extends('customer.layouts.template')
@section('page_title')
Pending Order - Ecommerce website
@endsection
@section('content')
@if (session()->has('message'))
<div class="alert alert-success">
{{ session()->get('message') }}
</div> 
@endif
@endsection


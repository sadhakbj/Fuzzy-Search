@extends('layouts.app')

@section('content')
  <div class="row">
    @if(session()->has('flash_message'))
      <div class="alert alert-info">
        {{ session()->get('flash_message') }}
      </div>
    @endif
    <div class="col col-md-12">
      <h2>All Products &nbsp;<a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Create</a></h2>
      <hr/>
      <div class="col-md-9">
        <div class="col col-md-6">
          <form action="{{ route('products.search') }}" method="post">
            {{ csrf_field() }}
            <label>
              <input type="search" class="form-control" name="search" placeholder="Search for product."/>
            </label>
            <button class="btn btn-danger"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <div class="col col-md-12">
          <hr/>
          @foreach($products as $product)
            <li>{{ $product->description }}</li>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

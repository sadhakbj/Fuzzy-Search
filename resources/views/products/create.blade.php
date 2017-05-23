@extends('layouts.app')

@section('content')
  <h2>Create new product</h2>

  <form action="{{ route('products.store') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="description">Product</label>
      <input type="text" required name="description" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
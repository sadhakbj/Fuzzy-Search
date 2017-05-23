@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col col-md-12">
      <h2>Search Results for <i>"{{ $query }}"</i></h2>
      <div class="col-md-9">
        <div class="col col-md-12">
          <hr/>
          @foreach($searchProducts as $product)
            <li>{{ $product->description }}</li>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2>Products</h2>
        </div>
    </div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 p-2 offset-md-1 h-100">
                <div class="card shadow">
                    <a href="{{route('products.show', ['title' => $product->title, 'id' => $product->identifier])}}">
                        <div class="card">
                            <img src="{{$product->picture}}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->title}} ({{$product->stock}})</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($product->details, 50, '...') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

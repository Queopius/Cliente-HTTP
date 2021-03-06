@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>{{$product->title}} ({{$product->stock}})</h2>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <a href="{{route('products.purchase', ['title' => $product->title, 'id' => $product->identifier])}}" class="btn btn-success btn-lg">Purchase</a>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <img src="{{$product->picture}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($product->details, 50, '...') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

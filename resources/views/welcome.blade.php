@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6>Categories</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($categories as $category)
                        <li class="list-group-item">
                            <a href="{{route('categories.products.show', ['title' => $category->title, 'id' => $category->identifier])}}">
                                {{$category->title}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>   
        </div>
        <div class="col-md-9 mt-3">
            <div class="row">
                <div class="col">
                    <h2>Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('products.show', ['title' => $product->title, 'id' => $product->identifier]) }}">
                            <div class="card-deck">
                                <div class="card shadow-sm w-100">
                                    <img src="{{ $product->picture }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->title }} ({{ $product->stock }})</h5>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                {{ $product->details }}
                                            </small>
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection

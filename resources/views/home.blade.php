@extends('layouts.app')

@section('css')
<style>
    ul.a {
        list-style-type: circle;
    }

    ul.b {
        list-style-type: square;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="pb-2">
                        <a href="{{ url('category/add')}}" class="btn btn-sm btn-primary">Add Category</a>
                    </div>
                    <div>
                        <ul class="a">
                            @foreach($categories as $category)
                            <li>{{ $category->name }} <a style="font-size:9px;padding:0px;" class="btn btn-warning btn-sm" href="{{ url('product/add', $category->id) }}">Add Product</a>
                                <ul>
                                    @foreach($category->subcategory as $category)
                                    <li>{{ $category->name }} <a style="font-size:9px;padding:0px;" class="btn btn-warning btn-sm" href="{{ url('product/add', $category->id) }}">Add Product</a>
                                        @if($category->product->isNotEmpty())
                                        <ul class="b">
                                            @foreach($category->product as $product)
                                            <li>{{ $product->name }}</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                        @if($category->product->isNotEmpty())
                        <ul class="b">
                            @foreach($category->product as $product)
                            <li>{{ $product->name }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
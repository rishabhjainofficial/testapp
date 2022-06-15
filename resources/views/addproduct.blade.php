@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Product</div>

                <div class="card-body">
                    <form method="post" action="{{ url('product/store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="col-md-6">
                                <label for="parent_id">Parent Category</label>
                                <input type="text" class="form-control" value="{{ $category->name }}" disabled/>
                                <input type="hidden" class="form-control" name="parent_id" value="{{ $category->id }}"/>
                            </div>
                            <div class="col-md-12 pt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

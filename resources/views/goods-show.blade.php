@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            @if (Session::has('message'))
                <div class="card-header alert alert-info text-center">{{ Session::get('message') }}</div>
            @endif
            <div class="card-header text-center">{{ $goods->name }}</div>
            <div class="card-block">
                <form class="form-horizontal">
                    <div class="row justify-content-center">
                        <div class="col-md-10 form-group">
                            <label for="id">Id</label>
                            <input type="text" class="form-control" value="{{$goods->id}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{$goods->name}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="modified">Modified</label>
                            <input type="text" class="form-control" value="{{$goods->modified}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="program_id">Program id</label>
                            <input type="text" class="form-control" value="{{$program->code}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="program_name">Program name</label>
                            <input type="text" class="form-control" value="{{$program->name}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" value="{{$goods->price}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="currency">Currency</label>
                            <input type="text" class="form-control" value="{{$currency->name}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="5" readonly>{{$goods->description}}</textarea>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="manufacturer">Manufacturer</label>
                            <input type="text" class="form-control" value="{{$manufacturer->name}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="ean">EAN</label>
                            <input type="text" class="form-control" value="{{$goods->ean}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <figure class="figure text-center">
                                <a href="{{ asset('img/'.$goods->image) }}" target="_blank"><img src="{{ asset('img/'.$goods->image) }}" class="figure-img img-fluid rounded" style="width: 200px; height: 200px;" alt="{{ $goods->name }}"></a>
                            </figure>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="price_old">Price old</label>
                            <input type="text" class="form-control" value="{{$goods->price_old}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="shipping_costs">Shipping costs</label>
                            <input type="text" class="form-control" value="{{$goods->shipping_costs}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="merchant_category">Merchant category</label>
                            <input type="text" class="form-control" value="{{$merchant->category}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="merchant_email">Merchant email</label>
                            <input type="text" class="form-control" value="{{$merchant->email}}" readonly>
                        </div>
                    </div>
                </form>
                <div class="card-footer text-center form-group">
                    <a href="{{ url('goods')}}" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


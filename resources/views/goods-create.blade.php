@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            @if ($errors->any())
                <div class="card-header text-center alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header text-center">New goods</div>
            <div class="card-block">
                <form class="form-horizontal" method="post" action="/goods" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row justify-content-center">
                        <div class="col-md-10 form-group">
                            <label for="id">Id</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{ $goods['id'] }}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="modified">Modified</label>
                            <input type="text" class="form-control" id="modified" name="modified" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="program_id">Program id</label>
                            <input type="text" class="form-control" id="program_id" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="program_name">Program name</label>
                            <select class="form-control" id="program_name" name="program_id">
                                @foreach($program as $item)
                                    <option value="{{ $item->id }}" data-attr="{{ $item->code }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="currency">Currency</label>
                            <select class="form-control" id="currency" name="currency_id">
                                    @foreach($currency as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="id" name="description" rows="5">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="manufacturer">Manufacturer</label>
                            <select class="form-control" id="manufacturer" name="manufacturer_id">
                                @foreach($manufacturer as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="ean">EAN</label>
                            <input type="text" class="form-control" id="ean" name="EAN" value="{{ old('EAN') }}">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="img-goods">Image (jpeg, jpg, png)</label>
                            <input type="file" class="form-control-file" id="img-goods" name="img_name">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="price_old">Price old</label>
                            <input type="text" class="form-control" id="price_old" name="price_old" value="{{ old('price_old') }}">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="shipping_costs">Shipping costs</label>
                            <input type="text" class="form-control" id="shipping_costs" name="shipping_costs" value="{{ old('shipping_costs') }}">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="merchant_category">Merchant category</label>
                            <select class="form-control" id="merchant_category" name="merchant_id">
                                @foreach($merchant as $item)
                                    <option value="{{ $item->id }}" data-attr="{{ $item->email }}">{{ $item->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="merchant_email">Merchant email</label>
                            <input type="text" class="form-control" id="merchant_email" readonly>
                        </div>
                        <div class="col-md-10 form-group text-center">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center form-group">
                <a href="{{ url('/goods')}}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection


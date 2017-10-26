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
            <div class="card-header text-center">Update goods</div>
            <div class="card-header text-center">{{ $goods->name }}</div>
            <div class="card-block">
                {{--<form class="form-horizontal"  method="post" action="goods/{{$goods->id}}" enctype="multipart/form-data">--}}
                {{--<form class="form-horizontal"  method="post" action="http://laratest.app/goods/{{ $goods->id }}" enctype="multipart/form-data">--}}
                <form class="form-horizontal"  method="post" action="{{url('goods',$goods->id)}}" enctype="multipart/form-data">
                    {!! method_field('patch') !!}
                    {{ csrf_field() }}
                    <div class="row justify-content-center">
                        <div class="col-md-10 form-group">
                            <label for="id">Id</label>
                            <input type="text" class="form-control" name="id" value="{{$goods->id}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$goods->name}}">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="modified">Modified</label>
                            <input type="text" class="form-control" value="{{$goods->modified}}" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="program_id">Program id</label>
                            <input type="text" class="form-control" id="program_id" readonly>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="program_name">Program name</label>
                            <select class="form-control" id="program_name" name="program_id">
                                @foreach($program as $item)
                                    @if($item->id == $goods->program_id)
                                        <option value="{{ $item->id }}" data-attr="{{ $item->code }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}" data-attr="{{ $item->code }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" value="{{$goods->price}}">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="currency">Currency</label>
                            <select class="form-control" id="currency" name="currency_id">
                                @foreach($currency as $item)
                                    @if($item->id == $goods->currency_id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="5">{{$goods->description}}</textarea>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="manufacturer">Manufacturer</label>
                            <select class="form-control" id="manufacturer" name="manufacturer_id">
                                @foreach($manufacturer as $item)
                                    @if($item->id == $goods->manufacturer_id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="ean">EAN</label>
                            <input type="text" class="form-control" name="EAN" value="{{$goods->ean}}">
                        </div>
                        <div class="col-md-10 form-group">
                            <figure class="figure text-center">
                                <img src="{{ asset('storage/img/'.$goods->image) }}" class="figure-img img-fluid rounded" style="width: 200px; height: 200px;" alt="{{ $goods->name }}">
                            </figure>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="img-goods">Image (jpeg, jpg, png)</label>
                            <input type="file" class="form-control-file" id="img-goods" name="img_name">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="price_old">Price old</label>
                            <input type="text" class="form-control" name="price_old" value="{{$goods->price_old}}">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="shipping_costs">Shipping costs</label>
                            <input type="text" class="form-control" name="shipping_costs" value="{{$goods->shipping_costs}}">
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="merchant_category">Merchant category</label>
                            <select class="form-control" id="merchant_category" name="merchant_id">
                                @foreach($merchant as $item)
                                    @if($item->id == $goods->merchant_id)
                                        <option value="{{ $item->id }}" data-attr="{{ $item->email }}" selected>{{ $item->category }}</option>
                                    @else
                                        <option value="{{ $item->id }}" data-attr="{{ $item->email }}">{{ $item->category }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-10 form-group">
                            <label for="merchant_email">Merchant email</label>
                            <input type="text" id="merchant_email" class="form-control" readonly>
                        </div>
                        <div class="col-md-10 form-group text-center">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center form-group">
                {{--<a href="{{ url('/goods')}}" class="btn btn-success">Save</a>--}}
                <a href="{{ url('/goods')}}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection


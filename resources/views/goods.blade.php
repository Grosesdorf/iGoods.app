@extends('layouts.app')

@section('content')
    <h1>List iGoods</h1>
    <a href="{{url('/goods/create')}}" class="btn btn-success">Create</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info text-center">
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Modified</th>
            <th>Price</th>
            <th>Price old</th>
            <th>Shipping costs</th>
            <th>EAN</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($goods as $item)
            <tr class="text-center">
                <td>{{ $item->id }}</td>
                <td>
                    <div class="card" style="width: 10rem;">
                        <div class="card-body">
                            <p class="card-text">{{ $item->name }}</p>
                        </div>
                        <a href="{{ asset('img/'.$item->image) }}" target="_blank"><img class="card-img-top" src="{{ asset('img/'.$item->image) }}" alt="{{ $item->name }}"></a>
                    </div>
                </td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->modified }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->price_old }}</td>
                <td>{{ $item->shipping_costs }}</td>
                <td>{{ $item->ean }}</td>
                <td><a href="{{url('goods',$item->id)}}" class="btn btn-primary btn-sm">Read</a></td>
                <td><a href="{{route('goods.edit',$item->id)}}" class="btn btn-info btn-sm">Update</a></td>
                <td>
                    <button type="button" id="{{ $item->id }}" data-token="{{ csrf_token() }}" class="btn-delete btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="nav justify-content-center">
        {{ $goods->links() }}
    </div>
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection


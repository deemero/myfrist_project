@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('error'))
            <div class="alert alert-danger d-blok" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <div class="card">
                 {{-- @if (session('status'))
                        <div class="alert alert-success d-blok" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                <div class="card-header">
                    <div class="form-group row">
                        <h4 class="col-sm-6" style="margin-top: auto; margin-bottom: auto;">
                                LIST OF ORDER </h4>
                        <div class="col-sm-6">
                            <a href="{{route('order.create')}}" class="btn btn-primary"
                                style="float: right;"> New Order</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success d-blok" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td><b> RECEIPT NO </b></td>
                                    <td><b> ADDRESS </b></td>
                                    <td><b> TEL. NO </b></td>
                                    <td><b> BUYER NAME </b></td>
                                    <td><b> ACTION </b></td>
                                </tr>
                            </thead>
                            {{-- @if($order_list->isEmpty())
                                <tr>
                                    <td colspan="3"><b> New Order History </b></td>
                                </tr>
                            @else --}}
                                @foreach ($list_of_order as $list)
                                <tr>
                                    <td>{{ $list->rec_no }}</td>
                                    <td>{{ $list->address }}</td>
                                    <td>{{ $list->tel_no }}</td>
                                    <td>{{ $list->user->name }}</td>
                                    <td>

                                    <a href="{{route ('order.edit', ['id' => $list->id])}}" class="btn btn-warning">EDIT</a>

                                    <a href="#" class="btn btn-danger" onclick="event.preventDefault();
                                        document.getElementById('delete-form-id-{{ $list->id}}').submit();">Delete</a>
                                    <form id="delete-form-id-{{ $list->id}}"
                                    action="{{ route('order.delete', ['id' => $list->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                            {{-- @endif --}}
                        </table>
                        {{-- {{ $order_list->links('pagination::bootstrap-4'); }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

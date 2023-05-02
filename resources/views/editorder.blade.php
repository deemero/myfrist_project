@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="card-header">
                    Update Order
                </div>

                <div class="card-body">
                    <form  action="{{route('order.update', ['id' => $order_detail->id])}}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label> Receipt Number </label>
                            <input type="text" name="rec_no" value="{{$order_detail->rec_no }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Address </label>
                            <input type="text" name="address"  value="{{$order_detail->address }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Tel. Number </label>
                            <input type="text" name="tel_no"   value="{{$order_detail->tel_no }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="email"   value="{{old('email' , $order_detail->email)}}" class="form-control @error
                            ('email') is-invalid
                            @enderror" required>
                            @error('email')
                            <span class="invalid-feedback d-block " role='alert'>
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

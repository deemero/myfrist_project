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
                    Create Order
                </div>

                <div class="card-body">
                    <form action="{{route ('order.create')}}" method="post" enctype="multipart/form-data">
                        <div class="card-body">


                        </div>
                        @csrf
                        <div class="form-group">
                            <label> Receipt Number </label>
                            <input type="text" name="rec_no" value="{{ $new_rec_no }}" class="form-control">
                            @error('rec_no') is-invalid
                            @enderror
                            @error('rec_no')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Address </label>
                            <textarea name="address"  class="form-control" rows="3"></textarea>
                            @error('address') is-invalid
                            @enderror
                            @error('address')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Tel. Number </label>
                            <input type="text" name="tel_no" class="form-control">
                            @error('tel_no') is-invalid
                            @enderror
                            @error('tel_no')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Email </label>
                            <input type="text" name="email" class="form-control">
                            @error('email') is-invalid
                            @enderror
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    <div>
                    <input type="file" name='attachment'>
                    </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

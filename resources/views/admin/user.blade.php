@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="panel-body col-md-offset-3">
            @if ($errors->count() > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        @if (session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif
        <div class="card col-md-4" >
            <div class="card-body">
                <h5 class="card-title">{{$masyvas['name']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$masyvas['email']}}</h6>
                <p class="card-text">Subscription:
                @foreach($masyvas['subscription'] as $value)
                    {{$value}},
                    @endforeach
                </p>
                <a  href="{{route('admin.index')}}" class="btn btn-primary">Back</a>
                <form action="{{ route('delete.user', $id) }}" method="POST"
                      style="display: inline"
                      onsubmit="return confirm('Are you sure?');">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <button class="btn btn-danger">Delete User</button>
                </form>
            </div>
        </div>

        <form class="col-md-4 col-md-offset-2" action="{{route('update.user', $id)}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$masyvas['name']}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{$masyvas['email']}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Edit User</button>
        </form>
    </div>

    @endsection
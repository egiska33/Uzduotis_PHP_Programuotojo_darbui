@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif
        <div class="col-md-6 col-md-offset-3">
            <ul class="list-group">
                <li class="list-group-item active">Subscription list</li>
                @foreach($subscription as $key=>$value)
                <li class="list-group-item">{{$value['name']}}
                    <form action="{{route('delete.subscription', $key)}}" method="POST"
                          style="display: inline"
                          onsubmit="return confirm('Are you sure?');">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button class="btn btn-danger btn-sm pull-right">Delete</button>
                    </form>
                </li>
                @endforeach
            </ul>
            <hr>
            <a href="{{route('add.subscription')}}" class="btn btn-primary">Add Subscription</a>

             </div>
    </div>
    @endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="panel-body col-md-offset-3 ">
            @if ($errors->count() > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <form class="col-md-6 col-md-offset-3" action="{{route('store.subscription')}}" method="post">
            {{ csrf_field() }}
        <div class="form-group">
            <label for="subscription">Add new subscription</label>
            <input type="text" class="form-control" name="subscription">
            </div>
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
    @endsection
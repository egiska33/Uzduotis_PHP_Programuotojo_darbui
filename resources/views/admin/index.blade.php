@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                SortBy
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="{{route('sortByName', 'name')}}">Name</a></li>
                <li><a href="{{route('sortByName', 'email')}}">Email</a></li>
                <li><a href="{{route('sortByName', 'data')}}">Date</a></li>
            </ul>
        </div>


        <div class="col-md-10 col-md-offset-1">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subscriptions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($masyvas as $key=>$value)
            <tr>
            <td><a href="{{route('edit.user', $key )}}">{{$value['name']}}</a></td>
            <td>{{$value['email']}}</td>
            <td>
                @foreach($value['subscription'] as $item)
                    {{$item}},
                @endforeach
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    </div>
       </div>
    @endsection
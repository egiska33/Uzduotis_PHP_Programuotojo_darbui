@extends('layouts.app');

@section('content')
    <div class="container">
    <h2 class="text-center">Prenumerata</h2>
        <div class="panel-body col-md-offset-3">
            @if ($errors->count() > 0)
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    <form class="col-md-6 col-md-offset-3" method="post" action="{{route('form.save')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Example multiple select</label>
            <select multiple name="subscription[]" class="form-control selectpicker" id="exampleFormControlSelect2">
                @foreach($subs as $value)
                <option value="{{$value['name']}}">{{$value['name']}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection
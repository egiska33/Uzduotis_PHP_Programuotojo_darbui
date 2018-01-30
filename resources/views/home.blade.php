@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('message'))
                <div class="alert alert-info">{{ session('message') }}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading"><h2 class="text-center">Hello You visit Egidijus test page</h2></div>

            </div>
        </div>
    </div>
</div>
@endsection

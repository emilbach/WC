@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-weight: bold">Warning!</div>

                    <div class="panel-body">
                        You're not registered!
                        <a class="button" style="font-weight: bold" href="{{ url('/') }}">Go back</a>
                        or
                        <a class="button" style="font-weight: bold" href="{{ url('/register') }}">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
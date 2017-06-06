@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-weight: bold">Error!</div>

                    <div class="panel-body">
                        The email is already taken!
                        <a class="button" style="font-weight: bold" href="{{ url('/register') }}">Try again!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
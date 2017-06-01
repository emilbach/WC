@extends('layouts.admin-app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{URL('css/tabs-look.css')}}">
        <link rel="stylesheet" href="{{URL('css/tables-info.css')}}" />
        <link rel="stylesheet" href="{{URL('css/main.css')}}" />
    </head>
    <body class="tabs-back">
    <div class="w3-container">
        <h2 style="text-align: center">Billing Information</h2>
        <table class="table-fill">
            <thead>
            <tr>
                <th>Method</th>
                <th>Default Value</th>
                <th>Consumption (m3)</th>
                <th>Consumption A Forfait</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bill as $billing)
                <tr>
                    <td>{{$billing->method}}</td>
                    <td>{{$billing->default_value}}</td>
                    <td>{{$billing->consumption}}</td>
                    <td>{{$billing->consumption_a_forfait}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </body>
@endsection

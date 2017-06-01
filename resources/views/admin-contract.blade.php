@extends('layouts.admin-app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{URL('css/tabs-look.css')}}">
        <link rel="stylesheet" href="{{URL('css/tables-info.css')}}" />
        <link rel="stylesheet" href="{{URL('css/main.css')}}" />
    </head>
    <body class="tabs-back">
    <div class="w3-container">
        <h2 style="text-align: center">Contract Information</h2>
            <table class="table-fill">
                <thead>
                <tr>
                    <th>Contract Number</th>
                    <th>Contract Type</th>
                    <th>Starting Date</th>
                    <th>Suspension Date</th>
                    <th>Closing Date</th>
                    <th>Status</th>
                    <th>Old Contract Number</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($contract as $ct)
                        <tr >
                            <td>{{$ct->contract_no}}</td>
                            <td>{{$ct->type}}</td>
                            <td>{{ date('d M Y', strtotime($ct->starting_date)) }}</td>
                            <td>{{ date('d M Y', strtotime($ct->suspension_date)) }}</td>
                            <td>{{ date('d M Y', strtotime($ct->closing_date)) }}</td>
                            <td>{{$ct->status}}</td>
                            <td>{{$ct->old_contract_no}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
    <script type="text/javascript" src="{{URL('js/tabs.js')}}"></script>
    </body>
@endsection

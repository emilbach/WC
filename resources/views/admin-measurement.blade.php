@extends('layouts.admin-app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{URL('css/tabs-look.css')}}">
        <link rel="stylesheet" href="{{URL('css/tables-info.css')}}" />
        <link rel="stylesheet" href="{{URL('css/main.css')}}" />
    </head>
    <body class="tabs-back">
    <div class="w3-container">
        <h2 style="text-align: center">Measurement System Information</h2>
        <table class="table-fill">
            <thead>
            <tr>
                <th>Folder Number</th>
                <th>Measuring Tool</th>
                <th>Size</th>
                <th>Register Number</th>
                <th>Old Number</th>
                <th>Stamp Number</th>
                <th>Box Number</th>
                <th>Manhole Number</th>
                <th>Current Measure</th>
                <th>Installing Date</th>
                <th>Notes</th>
            </tr>
            </thead>
            <tbody>
            @foreach($measurement as $ms)
                <tr>
                    <td>{{$ms->folder_no}}</td>
                    <td>{{$ms->measuring_tool}}</td>
                    <td>{{$ms->size}}</td>
                    <td>{{$ms->register_no}}</td>
                    <td>{{$ms->old_no}}</td>
                    <td>{{$ms->stamp_no}}</td>
                    <td>{{$ms->box_no}}</td>
                    <td>{{$ms->manhole_no}}</td>
                    <td>{{$ms->current_measure}}</td>
                    <td>{{ date('d M Y', strtotime($ms->installing_date)) }}</td>
                    <td>{{$ms->notes}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="{{URL('js/tabs.js')}}"></script>
    </body>
@endsection

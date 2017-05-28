@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{URL('css/tabs-look.css')}}">
        <link rel="stylesheet" href="{{URL('css/main.css')}}" />
        <link rel="stylesheet" href="{{URL('css/tables-info.css')}}" />
    </head>
    <body class="tabs-back">
    <div class="w3-container">
        <h2 style="text-align: center">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
        <h3 style="text-align: center">{{ Auth::user()->address }}</h3>
        <h3 style="text-align: center; margin-bottom: 1%">{{ Auth::user()->city }}</h3>
        <div class="w3-row">
            <a href="javascript:void(0)" onclick="openTab(event, 'Contract');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="text-align: center; font-weight: bold">Contract Information</div>
            </a>
            <a href="javascript:void(0)" onclick="openTab(event, 'Billing');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="text-align: center; font-weight: bold">Billing Information</div>
            </a>
            <a href="javascript:void(0)" onclick="openTab(event, 'Measuring');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="text-align: center; font-weight: bold">Measuring System Information</div>
            </a>
        </div>

        <div id="Contract" class="w3-container tabs" style="display:none; margin-top: 5%">
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
                    @foreach($contracts as $contract)
                        <tr >
                            <td>{{$contract->contract_no}}</td>
                            <td>{{$contract->type}}</td>
                            <td>{{$contract->starting_date}}</td>
                            <td>{{$contract->suspension_date}}</td>
                            <td>{{$contract->closing_date}}</td>
                            <td>{{$contract->status}}</td>
                            <td>{{$contract->old_contract_no}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="Billing" class="w3-container tabs" style="display:none; margin-top: 5%">
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
                @foreach($billings as $billing)
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

        <div id="Measuring" class="w3-container tabs" style="display:none; margin-top: 5%">
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
                @foreach($measurements as $measurement)
                    <tr>
                        <td>{{$measurement->folder_no}}</td>
                        <td>{{$measurement->measuring_tool}}</td>
                        <td>{{$measurement->size}}</td>
                        <td>{{$measurement->register_no}}</td>
                        <td>{{$measurement->old_no}}</td>
                        <td>{{$measurement->stamp_no}}</td>
                        <td>{{$measurement->box_no}}</td>
                        <td>{{$measurement->manhole_no}}</td>
                        <td>{{$measurement->current_measure}}</td>
                        <td>{{$measurement->installing_date}}</td>
                        <td>{{$measurement->notes}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="{{URL('js/tabs.js')}}"></script>
    </body>
@endsection

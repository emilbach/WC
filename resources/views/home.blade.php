@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="{{URL('css/main.css')}}" />
        <link rel="stylesheet" href="{{URL('css/tables-info.css')}}" />
    </head>
    <body class="tabs-back">
    <div class="w3-container">
        <h2 style="text-align: center">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
        <h3 style="text-align: center">{{ Auth::user()->address }}</h3>
        <h3 style="text-align: center; margin-bottom: 1%">{{ Auth::user()->city }}</h3>
        <div class="w3-row">
            <a href="javascript:void(0)" onclick="openCity(event, 'Contract');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="text-align: center; font-weight: bold">Contract Information</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'Billing');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="text-align: center; font-weight: bold">Billing Information</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'Measuring');">
                <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding" style="text-align: center; font-weight: bold">Measuring System Information</div>
            </a>
        </div>

        <div id="Contract" class="w3-container city" style="display:none; margin-top: 5%">
            <table class="table-fill">
                <thead>
                <tr>

                    <th class="text-center">Suspension Date</th>
                    <th class="text-center">Closing Date</th>
                    <th class="text-center">Contract Date</th>
                    <th class="text-center">Contract Type</th>
                    <th class="text-center">Contract Status</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Customer Cat</th>
                    <th class="text-center">Unit</th>
                    <th class="text-center">Block</th>
                    <th class="text-center">Area</th>
                    <th class="text-center">Subarea</th>
                    <th class="text-center">Indexing</th>
                </tr>
                </thead>
                <tbody class="table-hover">
                <tr>
                    <td class="text-center">January</td>
                    <td class="text-center">$ 50,000.00</td>
                </tr>
                <tr>
                    <td class="text-center">February</td>
                    <td class="text-center">$ 10,000.00</td>
                </tr>
                <tr>
                    <td class="text-center">March</td>
                    <td class="text-center">$ 85,000.00</td>
                </tr>
                <tr>
                    <td class="text-center">April</td>
                    <td class="text-center">$ 56,000.00</td>
                </tr>
                <tr>
                    <td class="text-center">May</td>
                    <td class="text-center">$ 98,000.00</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div id="Billing" class="w3-container city" style="display:none">
            <h2>Paris</h2>
            <p>Paris is the capital of France.</p>
        </div>

        <div id="Measuring" class="w3-container city" style="display:none">
            <h2>Tokyo</h2>
            <p>Tokyo is the capital of Japan.</p>
        </div>
    </div>
    <script type="text/javascript" src="{{URL('js/tabs.js')}}"></script>
    </body>
@endsection

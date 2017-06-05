@extends('layouts.app')

@section('content')
    <head>

        <link rel="stylesheet" href="{{URL('css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{URL('css/tables-info.css')}}" />
        <link rel="stylesheet" href="{{URL('css/admin-tabs.css')}}">
    </head>
    <body style="background-color: #8eb4cb">
    <div class="w3-container">
        <h2 style="text-align: center">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
        <h3 style="text-align: center">{{ Auth::user()->address }}, {{ Auth::user()->city }}</h3>
        <p data-placement="top" data-toggle="tooltip" align="center" style="margin-bottom: 3%">
            <button class="btn btn-warning" data-toggle="modal" data-target="#edit" >
                <span class="glyphicon glyphicon-edit"></span>
                Edit your info
            </button>
        </p>

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a href="javascript:void(0)" class="tablink" onclick="openTab(event, 'Contract');" style="font-weight: bold">
                    Contract Information
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="tablink" onclick="openTab(event, 'Billing');" style="font-weight: bold">
                    Billing Information
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="tablink" onclick="openTab(event, 'Measuring');" style="font-weight: bold">
                    Measuring System Information
                </a>
            </li>
        </ul>
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
                            <td>{{$contract->contract_type}}</td>
                            <td>{{ date('d M Y', strtotime($contract->starting_date)) }}</td>
                            <td>{{ date('d M Y', strtotime($contract->suspension_date)) }}</td>
                            <td>{{ date('d M Y', strtotime($contract->closing_date)) }}</td>
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
                        <td>{{$billing->pay_method}}</td>
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
                        <td>{{ date('d M Y', strtotime($measurement->installing_date)) }}</td>
                        <td>{{$measurement->notes}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit the bills</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('updateUserInfo') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->city }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script type="text/javascript" src="{{URL('js/tabs.js')}}"></script>
    <script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('js/jquery.min.js')}}"></script>
    </body>
@endsection

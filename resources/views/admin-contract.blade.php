@extends('layouts.admin-app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{URL('css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{URL('css/tabs-look.css')}}">
        <link rel="stylesheet" href="{{URL('css/admin-approve.css')}}">
        <link rel="stylesheet" href="{{URL('css/tables-info.css')}}">
    </head>
    <body style="background-color: #8eb4cb">
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
                <th>Edit</th>
                <th>Delete</th>
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
                    <td>
                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </p>
                    </td>
                    <td>
                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit the contract</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        @foreach($contract as $ct)
                        <div class="form-group">
                            <label for="contract_no" class="col-md-4 control-label">Contract Number</label>

                            <div class="col-md-6">
                                <input id="contract_no" type="number" class="form-control" name="contract_no" value="{{ $ct->contract_no }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control" name="type" value="{{ $ct->type }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="starting_date" class="col-md-4 control-label">Starting Date</label>

                            <div class="col-md-6">
                                <input id="starting_date" type="date" class="form-control" name="starting_date" value="{{ $ct->starting_date }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="suspension_date" class="col-md-4 control-label">Suspension Date</label>

                            <div class="col-md-6">
                                <input id="suspension_date" type="date" class="form-control" name="suspension_date" value="{{ $ct->suspension_date }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="closing_date" class="col-md-4 control-label">Closing Date</label>

                            <div class="col-md-6">
                                <input id="closing_date" type="date" class="form-control" name="closing_date" value="{{ $ct->closing_date }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="status" class="col-md-4 control-label">Status</label>

                                <div class="col-md-6">
                                    <input id="status" type="text" class="form-control" name="status" value="{{ $ct->status }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="old_contract_no" class="col-md-4 control-label">Old Contract Number</label>

                                <div class="col-md-6">
                                    <input id="old_contract_no" type="number" class="form-control" name="old_contract_no" value="{{ $ct->old_contract_no }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </form>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script type="text/javascript" src="{{URL('js/tabs.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/admin-pan.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/bootstrap.min.js')}}"></script>

    </body>
@endsection

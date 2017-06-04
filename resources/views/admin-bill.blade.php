@extends('layouts.admin-app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{URL('css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{URL('css/admin-approve.css')}}">
        <link rel="stylesheet" href="{{URL('css/tables-info.css')}}">
    </head>
    <body style="background-color: #8eb4cb">
    <div class="w3-container">
        <h2 style="text-align: center; font-weight: bold">Billing Information</h2>
        <p data-placement="top" data-toggle="tooltip" align="right" style="margin: 1.5%">
            <button class="btn btn-success" data-toggle="modal" data-target="#add" >
                <span class="glyphicon glyphicon-plus"></span>
                Add new bill
            </button>
        </p>
        <table class="table-fill">
            <thead>
            <tr>
                <th>Method</th>
                <th>Default Value</th>
                <th>Consumption (m3)</th>
                <th>Consumption A Forfait</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bill as $billing)
                <tr>
                    <td>{{$billing->pay_method}}</td>
                    <td>{{$billing->default_value}}</td>
                    <td>{{$billing->consumption}}</td>
                    <td>{{$billing->consumption_a_forfait}}</td>
                    <td>
                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                <span class="glyphicon glyphicon-edit"></span>
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

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Add new bill</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.post.addBill', $email) }}">
                        {{ csrf_field() }}
                        <input name="email" value="{{ $email }}" type="hidden">
                            <div class="form-group">
                                <label for="pay_method" class="col-md-4 control-label">Method</label>

                                <div class="col-md-6">
                                    <input id="pay_method" type="text" class="form-control" name="pay_method" required autofocus>

                                    @if ($errors->has('pay_method'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pay_method') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="default_value" class="col-md-4 control-label">Default Value</label>

                                <div class="col-md-6">
                                    <input id="default_value" type="number" class="form-control" name="default_value" required autofocus>

                                    @if ($errors->has('default_value'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('default_value') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="consumption" class="col-md-4 control-label">Consumption</label>

                                <div class="col-md-6">
                                    <input id="consumption" type="number" step="0.01" class="form-control" name="consumption" required autofocus>

                                    @if ($errors->has('consumption'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('consumption') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="consumption_a_forfait" class="col-md-4 control-label">Consumption A Forfait</label>

                                <div class="col-md-6">
                                    <input id="consumption_a_forfait" type="number" step="0.01" class="form-control" name="consumption_a_forfait" required autofocus>

                                    @if ($errors->has('consumption_a_forfait'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('consumption_a_forfait') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Add</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Edit the bills</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.post.updateBill') }}">
                        {{ csrf_field() }}

                        <input name="email" value="{{ $email }}" type="hidden">
                            <div class="form-group">
                                <label for="pay_method" class="col-md-4 control-label">Paying Method</label>

                                <div class="col-md-6">
                                    <input id="pay_method" type="text" class="form-control" name="pay_method" value="{{ old('pay_method') }}" required autofocus>

                                    @if ($errors->has('pay_method'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pay_method') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="default_value" class="col-md-4 control-label">Default Value</label>

                                <div class="col-md-6">
                                    <input id="default_value" type="number" class="form-control" name="default_value" value="{{ old('default_value') }}" required autofocus>

                                    @if ($errors->has('default_value'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('default_value') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="consumption" class="col-md-4 control-label">Consumption</label>

                                <div class="col-md-6">
                                    <input id="consumption" type="number" step="0.01" class="form-control" name="consumption" value="{{ old('consumption') }}" required autofocus>

                                    @if ($errors->has('consumption'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('consumption') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="consumption_a_forfait" class="col-md-4 control-label">Consumption A Forfait</label>

                                <div class="col-md-6">
                                    <input id="consumption_a_forfait" type="number" step="0.01" class="form-control" name="consumption_a_forfait" value="{{ old('consumption_a_forfait') }}" required autofocus>

                                    @if ($errors->has('consumption_a_forfait'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('consumption_a_forfait') }}</strong>
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

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-warning-sign"></span>
                        Are you sure you want to delete this Record?
                    </div>
                    <div class="modal-footer ">
                        <a class="btn btn-success" href="{{ route('admin.user.deleteBill', $email) }}" >
                            <span class="glyphicon glyphicon-ok-sign"></span> 
                            Yes
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span>
                             No
                        </button>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script type="text/javascript" src="{{URL('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/bootstrap.min.js')}}"></script>
    </body>
@endsection

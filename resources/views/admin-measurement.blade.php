@extends('layouts.admin-app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{URL('css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{URL('css/tabs-look.css')}}">
        <link rel="stylesheet" href="{{URL('css/tables-info.css')}}">
    </head>
    <body style="background-color: #8eb4cb">
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
                <th>Edit</th>
                <th>Delete</th>
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
                    <h4 class="modal-title custom_align" id="Heading">Edit the measurement</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        @foreach($measurement as $ms)
                            <div class="form-group">
                                <label for="folder_no" class="col-md-4 control-label">Folder Number</label>

                                <div class="col-md-6">
                                    <input id="folder_no" type="number" class="form-control" name="folder_no" value="{{ $ms->folder_no }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="measuring_tool" class="col-md-4 control-label">Measuring Tool</label>

                                <div class="col-md-6">
                                    <input id="measuring_tool" type="text" class="form-control" name="measuring_tool" value="{{ $ms->measuring_tool }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="size" class="col-md-4 control-label">Size</label>

                                <div class="col-md-6">
                                    <input id="size" type="text" class="form-control" name="size" value="{{ $ms->size }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="register_no" class="col-md-4 control-label">Register Number</label>

                                <div class="col-md-6">
                                    <input id="register_no" type="number" class="form-control" name="register_no" value="{{ $ms->register_no }}" required autofocus>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="old_no" class="col-md-4 control-label">Old Number</label>

                                <div class="col-md-6">
                                    <input id="old_no" type="number" class="form-control" name="old_no" value="{{ $ms->old_no }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stamp_no" class="col-md-4 control-label">Stamp Number</label>

                                <div class="col-md-6">
                                    <input id="stamp_no" type="number" class="form-control" name="stamp_no" value="{{ $ms->stamp_no }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="box_no" class="col-md-4 control-label">Box Number</label>

                                <div class="col-md-6">
                                    <input id="box_no" type="number" class="form-control" name="box_no" value="{{ $ms->box_no }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="manhole_no" class="col-md-4 control-label">Manhole Number</label>

                                <div class="col-md-6">
                                    <input id="manhole_no" type="number" class="form-control" name="manhole_no" value="{{ $ms->manhole_no }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_measure" class="col-md-4 control-label">Current Measure</label>

                                <div class="col-md-6">
                                    <input id="current_measure" type="number" step="0.01" class="form-control" name="current_measure" value="{{ $ms->current_measure }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="installing_date" class="col-md-4 control-label">Installing Date</label>

                                <div class="col-md-6">
                                    <input id="installing_date" type="date" class="form-control" name="installing_date" value="{{ $ms->installing_date }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="notes" class="col-md-4 control-label">Notes</label>

                                <div class="col-md-6">
                                    <input id="notes" type="text" class="form-control" name="notes" value="{{ $ms->notes }}" required>

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
    <script type="text/javascript" src="{{URL('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/admin-pan.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/bootstrap.min.js')}}"></script>
    </body>
@endsection

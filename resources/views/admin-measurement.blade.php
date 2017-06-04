@extends('layouts.admin-app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{URL('css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{URL('css/admin-approve.css')}}">
        <link rel="stylesheet" href="{{URL('css/tables-info.css')}}">
    </head>
    <body style="background-color: #8eb4cb">
    <div class="w3-container">
        <h2 style="text-align: center; font-weight: bold">Measurement System Information</h2>
        <p data-placement="top" data-toggle="tooltip" align="right" style="margin: 1.5%">
            <button class="btn btn-success" data-toggle="modal" data-target="#add" >
                <span class="glyphicon glyphicon-plus"></span>
                Add new measurement
            </button>
        </p>
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

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Add new measurement</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.post.addMeasurement', $email) }}">
                        {{ csrf_field() }}
                        <input name="email" value="{{ $email }}" type="hidden">
                            <div class="form-group">
                                <label for="folder_no" class="col-md-4 control-label">Folder Number</label>

                                <div class="col-md-6">
                                    <input id="folder_no" type="number" class="form-control" name="folder_no" value="{{ old('folder_no') }}" required autofocus>

                                    @if ($errors->has('folder_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('folder_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="measuring_tool" class="col-md-4 control-label">Measuring Tool</label>

                                <div class="col-md-6">
                                    <input id="measuring_tool" type="text" class="form-control" name="measuring_tool" value="{{ old('measuring_tool') }}" required autofocus>

                                    @if ($errors->has('measuring_tool'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('measuring_tool') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="size" class="col-md-4 control-label">Size</label>

                                <div class="col-md-6">
                                    <input id="size" type="text" class="form-control" name="size" value="{{ old('size') }}" required autofocus>

                                    @if ($errors->has('size'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="register_no" class="col-md-4 control-label">Register Number</label>

                                <div class="col-md-6">
                                    <input id="register_no" type="number" class="form-control" name="register_no" value="{{ old('register_no') }}" required autofocus>

                                    @if ($errors->has('register_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('register_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="old_no" class="col-md-4 control-label">Old Number</label>

                                <div class="col-md-6">
                                    <input id="old_no" type="number" class="form-control" name="old_no" value="{{ old('old_no') }}" required>

                                    @if ($errors->has('old_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('old_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stamp_no" class="col-md-4 control-label">Stamp Number</label>

                                <div class="col-md-6">
                                    <input id="stamp_no" type="number" class="form-control" name="stamp_no" value="{{ old('stamp_no') }}" required>

                                    @if ($errors->has('stamp_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('stamp_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="box_no" class="col-md-4 control-label">Box Number</label>

                                <div class="col-md-6">
                                    <input id="box_no" type="number" class="form-control" name="box_no" value="{{ old('box_no') }}" required>

                                    @if ($errors->has('box_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('box_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="manhole_no" class="col-md-4 control-label">Manhole Number</label>

                                <div class="col-md-6">
                                    <input id="manhole_no" type="number" class="form-control" name="manhole_no" value="{{ old('manhole_no') }}" required>

                                    @if ($errors->has('manhole_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('manhole_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_measure" class="col-md-4 control-label">Current Measure</label>

                                <div class="col-md-6">
                                    <input id="current_measure" type="number" step="0.01" class="form-control" name="current_measure" value="{{ old('current_measure') }}" required>

                                    @if ($errors->has('current_measure'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current_measure') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="installing_date" class="col-md-4 control-label">Installing Date</label>

                                <div class="col-md-6">
                                    <input id="installing_date" type="date" class="form-control" name="installing_date" value="{{ old('installing_date') }}" required>

                                    @if ($errors->has('installing_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('installing_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="notes" class="col-md-4 control-label">Notes</label>

                                <div class="col-md-6">
                                    <input id="notes" type="text" class="form-control" name="notes" value="{{ old('notes') }}" required>

                                    @if ($errors->has('notes'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
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
                    <h4 class="modal-title custom_align" id="Heading">Edit the measurement</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.post.updateMeasurement') }}">
                        {{ csrf_field() }}
                        <input name="email" value="{{ $email }}" type="hidden">
                            <div class="form-group">
                                <label for="folder_no" class="col-md-4 control-label">Folder Number</label>

                                <div class="col-md-6">
                                    <input id="folder_no" type="number" class="form-control" name="folder_no" value="{{ old('folder_no') }}" required autofocus>

                                    @if ($errors->has('folder_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('folder_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="measuring_tool" class="col-md-4 control-label">Measuring Tool</label>

                                <div class="col-md-6">
                                    <input id="measuring_tool" type="text" class="form-control" name="measuring_tool" value="{{ old('measuring_tool') }}" required autofocus>

                                    @if ($errors->has('measuring_tool'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('measuring_tool') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="size" class="col-md-4 control-label">Size</label>

                                <div class="col-md-6">
                                    <input id="size" type="text" class="form-control" name="size" value="{{ old('size') }}" required autofocus>

                                    @if ($errors->has('size'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="register_no" class="col-md-4 control-label">Register Number</label>

                                <div class="col-md-6">
                                    <input id="register_no" type="number" class="form-control" name="register_no" value="{{ old('register_no') }}" required autofocus>

                                    @if ($errors->has('register_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('register_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="old_no" class="col-md-4 control-label">Old Number</label>

                                <div class="col-md-6">
                                    <input id="old_no" type="number" class="form-control" name="old_no" value="{{ old('old_no') }}" required>

                                    @if ($errors->has('old_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('old_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stamp_no" class="col-md-4 control-label">Stamp Number</label>

                                <div class="col-md-6">
                                    <input id="stamp_no" type="number" class="form-control" name="stamp_no" value="{{ old('stamp_no') }}" required>

                                    @if ($errors->has('stamp_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('stamp_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="box_no" class="col-md-4 control-label">Box Number</label>

                                <div class="col-md-6">
                                    <input id="box_no" type="number" class="form-control" name="box_no" value="{{ old('box_no') }}" required>

                                    @if ($errors->has('box_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('box_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="manhole_no" class="col-md-4 control-label">Manhole Number</label>

                                <div class="col-md-6">
                                    <input id="manhole_no" type="number" class="form-control" name="manhole_no" value="{{ old('manhole_no') }}" required>

                                    @if ($errors->has('manhole_no'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('manhole_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_measure" class="col-md-4 control-label">Current Measure</label>

                                <div class="col-md-6">
                                    <input id="current_measure" type="number" step="0.01" class="form-control" name="current_measure" value="{{ old('current_measure') }}" required>

                                    @if ($errors->has('current_measure'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current_measure') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="installing_date" class="col-md-4 control-label">Installing Date</label>

                                <div class="col-md-6">
                                    <input id="installing_date" type="date" class="form-control" name="installing_date" value="{{ old('installing_date') }}" required>

                                    @if ($errors->has('installing_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('installing_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="notes" class="col-md-4 control-label">Notes</label>

                                <div class="col-md-6">
                                    <input id="notes" type="text" class="form-control" name="notes" value="{{ old('notes') }}" required>

                                    @if ($errors->has('notes'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
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
                        <a class="btn btn-success" href="{{ route('admin.user.deleteMeasurement', $email) }}" >
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
    <script type="text/javascript" src="{{URL('/js/admin-pan.js')}}"></script>
    <script type="text/javascript" src="{{URL('/js/bootstrap.min.js')}}"></script>
    </body>
@endsection

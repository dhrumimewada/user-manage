@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Employee</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('PostEmp') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" value="{{ base64_encode($empdata[0]->id) }}" name="emp_id">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $empdata[0]->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                <select id="department" class="form-control" name="department" value="" required>
                                <option disabled value="" selected>Select Department</option>
                                <option value="PHP" {{{ $empdata[0]->department == 'PHP'  ? 'selected': ''}}}>PHP</option>
                                <option value="BD" {{{ $empdata[0]->department == 'BD'  ? 'selected': ''}}}>BD</option>
                                <option value=".NET" {{{ $empdata[0]->department == '.NET'  ? 'selected': ''}}} >.NET</option>
                                </select>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">DOB</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required>

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address" value="{{ old('address') }}" required></textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">Profile Photo</label>

                            <div class="col-md-6">
                                <span class="image_url"></span>
                                <input id="image" type="file" class="form-control" name="image" required>
                                <br>



                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hobby') ? ' has-error' : '' }}">
                            <label for="hobby" class="col-md-4 control-label">Hobby</label>

                            <div class="col-md-6">
                                <label >
                                <input id="hobby1" type="checkbox" class="form-control" name="hobby[]" value="1">    Dancing
                                </label>
                                <label >
                                <input id="hobby2" type="checkbox" class="form-control" name="hobby[]" value="2">    Yoga
                                </label>
                                <label >
                                <input id="hobby3" type="checkbox" class="form-control" name="hobby[]" value="3">    Painting
                                </label>


                                @if ($errors->has('hobby'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hobby') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <label >
                                <input id="male" type="radio" class="form-control" name="gender" value="1" @if(old('gender')=="1") checked @endif>    Male
                                </label>
                                <label >
                                <input id="female" type="radio" class="form-control" name="gender" value="2" @if(old('gender')=="2") checked @endif>    Female
                                </label>


                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="col-md-4 control-label">Salary</label>

                            <div class="col-md-6">
                                <input id="salary" type="number" min="5000" class="form-control" name="salary" value="{{ old('salary') }}" required>

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

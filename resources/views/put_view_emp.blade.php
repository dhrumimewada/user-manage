@extends('layouts.app')

@section('content')
@php
//dd($user);
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if(Session::has('success'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                {{Session::get('success')}}
                </div>
                @endif
                <div class="panel-heading">{{ ($Readonly)?'Employee Detail':'Form' }}</div>

                <div class="panel-body">
                    <form class="form-horizontal form-validate" method="POST" action="{{ route('put_emp') }}">
                        {{ csrf_field() }}

                        @if(!$Readonly)
                        <input type="hidden" name="emp_id" value="{{ $user->id }}">
                        @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ ($user->name)?$user->name:old('name') }}" required autofocus {{($Readonly)?'readonly':'' }}>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                            <label for="mobile_no" class="col-md-4 control-label">mobile no</label>

                            <div class="col-md-6">
                                <input id="mobile_no" type="text" class="form-control" name="mobile_no" value="{{ ($user->mobile_no)?$user->mobile_no:old('mobile_no') }}" required {{($Readonly)?'readonly':'' }} onkeypress="return isNumber(event)">

                                @if ($errors->has('mobile_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                            <label for="area" class="col-md-4 control-label">Area</label>

                            <div class="col-md-6">
                                <input id="area" type="text" class="form-control" name="area" value="{{ ($user->area)?$user->area:old('area') }}" required {{($Readonly)?'readonly':'' }}>

                                @if ($errors->has('area'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('native_place') ? ' has-error' : '' }}">
                            <label for="native_place" class="col-md-4 control-label">native place</label>

                            <div class="col-md-6">
                                <input id="native_place" type="text" class="form-control" name="native_place" value="{{ ($user->native_place)?$user->native_place:old('native_place') }}" required {{($Readonly)?'readonly':'' }}>

                                @if ($errors->has('native_place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('native_place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">location</label>

                            <div class="col-md-6">
                                <select id="location" class="form-control" name="location" value="{{ old('location') }}" required {{($Readonly)?'disabled':'' }}>
                                <option disabled value="" selected>Select location</option>
                                <option value="Gujrat" @if($user->location == 'Gujrat'){{ 'selected' }} @endif >Gujrat</option>
                                <option value="Mumbai" @if($user->location == 'Mumbai'){{ 'selected' }} @endif>Mumbai</option>
                                <option value="Delhi" @if($user->location == 'Delhi'){{ 'selected' }} @endif>Delhi</option>
                                </select>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            @if(!$Readonly)
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            @else
                                <a href="{{ route('home') }}" class="btn btn-primary">
                                    back
                                </a>
                             @endif
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content_footer_js')
<script type="text/javascript" src="js/put_emp.js"></script>
<script type="text/javascript">
     function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
</script>
@endsection
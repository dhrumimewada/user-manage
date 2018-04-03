@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">

@if (session('emp_msg'))
                <div class="alert alert-success">
                    {{ session('emp_msg') }}
                </div>
            @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employee
                <a class='pull-right btn btn-primary btn-sm' href="{{ route('create_emp') }}">Add Employee </a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($myusers) > 0)
                    <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>Email</th>
                            <th>View Form</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($myusers as $key => $data)
                          <tr>
                            <td>{{ $data->email }}</td>
                            <td>
                            @if($data->name != '')
                            <a href="{{ url('view_emp/'.base64_encode($data->id)) }}" title="Edit Details"><i class="fa fa-eye" style="font-size: 26px;"></i></a>
                            </td>
                            @else
                            {{ 'Pending' }}
                            @endif
                          </tr>
                        @endforeach


                        </tbody>
                      </table>
                    @else
                    <div class="alert alert-warning alert-dismissible" role="alert">
                    No Employee Added
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')


@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><span class="semi-bold">Property Manager’s Pre-Survey Information Questionnaire</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="box simple ">
                    <div class="box-header">
                        <h4><span class="semi-bold">Overview</span>
                        <span class="box-tools pull-right">
                            <a href="javascript:;" class="download"><i class="fa fa-download"></i></a>
                        </span></h4>
                    </div>

                    <div class="grid-body ">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="alert alert-success">
                            <i class="fa fa-check"></i> Thank you for your diligence and cooperation. We will contact you if there are any further questions.
                            <a href="{{ url('home') }}">Back Dashboard</a>
                        </div>


                    </div>
                    <div class="grid-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            KKPDATA<small> Create Accounts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Home</a></li>
            <li class="active">KKPData</li>
            <li class="active">Step 8</li>
        </ol>
    </section>
@endsection

@section('content')
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('admin/kkpdata/process_step8/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 8 - (HVAC System)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="trained_hvac_system_employees">
                    Who is trained/capable of shutting-down the HVAC system in buildings during shelter-in-place emergencies? </label>
                <div class="col-md-4">
                    <textarea id="trained_hvac_system_employees" name="trained_hvac_system_employees" class="form-control">{{$account['trained_hvac_system_employees']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="hvac_system_shutdown">
                    How is the system HVAC system shut down during shelter-in-place emergencies? </label>
                <div class="col-md-4">
                    <textarea id="hvac_system_shutdown" name="hvac_system_shutdown" class="form-control">{{$account['hvac_system_shutdown']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="hvac_controls_located">
                    Where are the HVAC controls located in facility buildings? </label>
                <div class="col-md-4">
                    <textarea id="hvac_controls_located" name="hvac_controls_located" class="form-control">{{$account['hvac_controls_located']}}</textarea>
                </div>
            </div>



            <!------------------------- --?

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}/kkpdata/step7/{{$account['id']}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>






































@endsection
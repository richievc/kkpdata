@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            KKPDATA<small> Create Accounts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Home</a></li>
            <li class="active">KKPData</li>
            <li class="active">Step 9</li>
        </ol>
    </section>
@endsection

@section('content')
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('admin/kkpdata/process_step9/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 9 - (Emergency Power)</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="systems_powered_by_generator">
                    Does the facility have an emergency power generator? </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="systems_powered_by_generator-0">
                        <input type="radio" name="systems_powered_by_generator" id="systems_powered_by_generator-0" value="yes"
                                {{($account['systems_powered_by_generator'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="systems_powered_by_generator-1">
                        <input type="radio" name="systems_powered_by_generator" id="systems_powered_by_generator-1" value="no"
                                {{($account['systems_powered_by_generator'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="power_generator_fueled">
                    If YES, what systems are powered by the emergency power generator?  </label>
                <div class="col-md-4">
                    <textarea id="power_generator_fueled" name="power_generator_fueled" class="form-control">{{$account['power_generator_fueled']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="backup_power_systems_tested">
                    If YES, how/when are backup power systems tested under load? </label>
                <div class="col-md-4">
                    <textarea id="backup_power_systems_tested" name="backup_power_systems_tested" class="form-control">{{$account['backup_power_systems_tested']}}</textarea>
                </div>
            </div>

            <!------------------------- --?

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}/kkpdata/step8/{{$account['id']}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>






































@endsection
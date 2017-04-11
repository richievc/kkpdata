@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            KKPDATA<small> Create Accounts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Home</a></li>
            <li class="active">KKPData</li>
            <li class="active">Step 15</li>
        </ol>
    </section>
@endsection

@section('content')
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('admin/kkpdata/process_step15/' . $account['id'])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 15 - (Security Operations)</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_on_site_security_force">
                    Does the facility have an on-site security force?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_on_site_security_force-0">
                        <input type="radio" name="has_on_site_security_force" id="has_on_site_security_force-0" value="yes"
                                {{($account['has_on_site_security_force'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_on_site_security_force-1">
                        <input type="radio" name="has_on_site_security_force" id="has_on_site_security_force-1" value="no"
                        {{($account['has_on_site_security_force'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="on_site_security_force_shift">
                    If YES, how many and what are the shift hours? </label>
                <div class="col-md-4">
                    <textarea id="on_site_security_force_shift" name="on_site_security_force_shift" class="form-control">{{$account['on_site_security_force_shift']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="duties_of_officers">
                    If YES, what are the functions/duties of officers? </label>
                <div class="col-md-4">
                    <textarea id="duties_of_officers" name="duties_of_officers" class="form-control">{{$account['duties_of_officers']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="dispatched_during_emergencies">
                    If YES, how are officers notified and dispatched during emergencies? </label>
                <div class="col-md-4">
                    <textarea id="dispatched_during_emergencies" name="dispatched_during_emergencies" class="form-control">{{$account['dispatched_during_emergencies']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="level_of_confidence_management">
                    If YES, rate the level of confidence management has in officers on a scale of 1-10 (High):  </label>
                <div class="col-md-4">
                    <input type="number" min="1" max="10" step="1" value="{{$account['level_of_confidence_management']}}" name="level_of_confidence_management" id="level_of_confidence_management" class="form-control">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="level_of_confidence_employees">
                    If YES, rate the level of confidence employees have in officers on a scale of 1-10 (High): </label>
                <div class="col-md-4">
                    <input type="number" min="1" max="10" step="1" value="{{$account['level_of_confidence_employees']}}" name="level_of_confidence_employees" id="level_of_confidence_employees" class="form-control">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="level_of_confidence_employees">
                    If YES, who is in direct charge of the officer deployment? </label>
                <div class="col-md-4">
                    <textarea id="level_of_confidence_employees" name="level_of_confidence_employees" class="form-control">{{$account['level_of_confidence_employees']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="specific_concerns_security_force">
                    Please describe any specific concerns you have about your current security officer force: </label>
                <div class="col-md-4">
                    <textarea id="specific_concerns_security_force" name="specific_concerns_security_force" class="form-control">{{$account['specific_concerns_security_force']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="in_charge_officer_deployment">
                    If YES, who is in direct charge of the officer deployment?  </label>
                <div class="col-md-4">
                    <textarea id="in_charge_officer_deployment" name="in_charge_officer_deployment" class="form-control">{{$account['in_charge_officer_deployment']}}</textarea>
                </div>
            </div>

            <!------------------------- --?
            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}/kkpdata/step14/{{$account['id']}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>






































@endsection
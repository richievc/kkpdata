@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            KKPDATA<small> Create Accounts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Home</a></li>
            <li class="active">KKPData</li>
            <li class="active">Step 3</li>
        </ol>
    </section>
@endsection

@section('content')
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('admin/kkpdata/process_step3/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 3 - (Facility Information)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="type_of_operation">
                    What type of operations are conducted at this facility?  </label>
                <div class="col-md-4">
                    <textarea id="type_of_operation" name="type_of_operation" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="business_hrs">
                    Please describe your business hours and any shift activity: </label>
                <div class="col-md-4">
                    <textarea id="business_hrs" name="business_hrs" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="assets_of_greatest_concern">
                    Describe the assets of greatest concern at the facility from your perspective:  </label>
                <div class="col-md-4">
                    <textarea id="assets_of_greatest_concern" name="assets_of_greatest_concern" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="employee_schedules">
                    How many employees are in the facility (and at what times of the day)? </label>
                <div class="col-md-4">
                    <textarea id="employee_schedules" name="employee_schedules" class="form-control"></textarea>
                </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="pharmacy_onsite">
                    Is there a pharmacy located on-site?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="pharmacy_onsite-0">
                        <input type="checkbox" name="pharmacy_onsite" id="pharmacy_onsite-0" value="yes">
                        Yes
                    </label>
                    <label class="checkbox-inline" for="pharmacy_onsite-1">
                        <input type="checkbox" name="pharmacy_onsite" id="pharmacy_onsite-1" value="no">
                        No
                    </label>
                </div>
            </div>


            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                </div>
            </div>

        </fieldset>
    </form>






































@endsection
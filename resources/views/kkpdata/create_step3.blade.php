@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            {!! view('kkpdata/partials/side_menu', compact('account')) !!}

            <div class="col-md-8">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('kkpdata/process_step3/' . $account['id'])}}" method="post" class="form-horizontal">
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
                    <textarea id="type_of_operation" name="type_of_operation" class="form-control">{{$account['type_of_operation']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="business_hrs">
                    Please describe your business hours and any shift activity: </label>
                <div class="col-md-4">
                    <textarea id="business_hrs" name="business_hrs" class="form-control">{{$account['business_hrs']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="assets_of_greatest_concern">
                    Describe the assets of greatest concern at the facility from your perspective:  </label>
                <div class="col-md-4">
                    <textarea id="assets_of_greatest_concern" name="assets_of_greatest_concern" class="form-control">{{$account['assets_of_greatest_concern']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="employee_schedules">
                    How many employees are in the facility (and at what times of the day)? </label>
                <div class="col-md-4">
                    <textarea id="employee_schedules" name="employee_schedules" class="form-control">{{$account['employee_schedules']}}</textarea>
                </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="pharmacy_onsite">
                    Is there a pharmacy located on-site?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="pharmacy_onsite-0">
                        <input type="radio" name="pharmacy_onsite" id="pharmacy_onsite-0" value="yes"
                            {{($account['pharmacy_onsite'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="pharmacy_onsite-1">
                        <input type="radio" name="pharmacy_onsite" id="pharmacy_onsite-1" value="no"
                            {{($account['pharmacy_onsite'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>


            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{url('kkpdata/step2/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>


            </div>
        </div>
    </div>



































@endsection
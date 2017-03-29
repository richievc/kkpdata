@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            KKPDATA<small> Create Accounts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Home</a></li>
            <li class="active">KKPData</li>
            <li class="active">Step 6</li>
        </ol>
    </section>
@endsection

@section('content')
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('admin/kkpdata/process_step5/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 6 - (Infrastructure)</legend>

            <h3>PA System</h3>

            <!-- Text input-->
            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="public_address_system">
                    What type of Public Address system does the facility employ?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="public_address_system-0">
                        <input type="radio" name="public_address_system" id="public_address_system-0" value="phone">
                        Phone
                    </label>
                    <label class="checkbox-inline" for="is_point_of_contact-1">
                        <input type="radio" name="public_address_system" id="public_address_system-1" value="analog">
                        Analog/hardwired
                    </label>
                </div>
            </div>

            <h3>Access Control</h3>

            <div class="form-group">
                <label class="col-md-4 control-label" for="employ_electronic_access_control">
                    Does the facility employ electronic access control?     </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="employ_electronic_access_control-0">
                        <input type="radio" name="employ_electronic_access_control" id="employ_electronic_access_control-0" value="yes">
                        Yes
                    </label>
                    <label class="checkbox-inline" for="employ_electronic_access_control-1">
                        <input type="radio" name="employ_electronic_access_control" id="employ_electronic_access_control-1" value="no">
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="type_of_system">
                    If YES, what type of system: </label>
                <div class="col-md-4">
                    <textarea id="type_of_system" name="type_of_system" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="system_enrollment">
                    If YES, how is system enrollment  </label>
                <div class="col-md-4">
                    <textarea id="system_enrollment" name="system_enrollment" class="form-control"></textarea>
                </div>
            </div>

            <h3>Alarm System</h3>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="alarm_systems">
                    How are alarm systems used at the facility? </label>
                <div class="col-md-4">
                    <textarea id="alarm_systems" name="alarm_systems" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="alarm_system_monitored">
                    How is the alarm system monitored and how are intrusions assessed and responded?  </label>
                <div class="col-md-4">
                    <textarea id="alarm_system_monitored" name="alarm_system_monitored" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="penalties_to_false_alarms">
                    If Police respond, have there been any previous penalties owing to false alarms?  </label>
                <div class="col-md-4">
                    <textarea id="penalties_to_false_alarms" name="penalties_to_false_alarms" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="history_of_nuisance">
                    What has been the history of false/nuisance alarms? </label>
                <div class="col-md-4">
                    <textarea id="history_of_nuisance" name="history_of_nuisance" class="form-control"></textarea>
                </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="has_panic_alarms">
                    Does the facility have any panic alarms?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="is_point_of_contact-0">
                        <input type="checkbox" name="is_point_of_contact" id="is_point_of_contact-0" value="yes">
                        Yes
                    </label>
                    <label class="checkbox-inline" for="is_point_of_contact-1">
                        <input type="checkbox" name="is_point_of_contact" id="is_point_of_contact-1" value="no">
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="panic_alarm_activated">
                    If YES, who exactly is contacted and what happens when a panic alarm is activated? </label>
                <div class="col-md-4">
                    <textarea id="panic_alarm_activated" name="panic_alarm_activated" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="panic_alarm_investigated">
                    If YES, how are panic alarms investigated and responded? </label>
                <div class="col-md-4">
                    <textarea id="panic_alarm_investigated" name="panic_alarm_investigated" class="form-control"></textarea>
                </div>
            </div>

            <h3>CCTV</h3>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="onsite_cctv">
                    How is the on-site CCTV system monitored? </label>
                <div class="col-md-4">
                    <textarea id="onsite_cctv" name="onsite_cctv" class="form-control"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="where_monitors_located">
                    Where is the DVR system and monitors located?  </label>
                <div class="col-md-4">
                    <textarea id="where_monitors_located" name="where_monitors_located" class="form-control"></textarea>
                </div>
            </div>


            <!------------------------- --?

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                </div>
            </div>

        </fieldset>
    </form>






































@endsection
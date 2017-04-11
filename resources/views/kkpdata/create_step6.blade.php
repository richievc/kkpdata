@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url(Request::segment(1) . '/kkpdata/process_step6/' . $account['id'])}}" method="post" class="form-horizontal">
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
                    What type of public address system does the facility employ?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="public_address_system-0">
                        <input type="radio" name="public_address_system" id="public_address_system-0" value="phone"
                                {{($account['public_address_system'] == 'phone' ? 'checked' : '')}}>
                        Phone
                    </label>
                    <label class="checkbox-inline" for="public_address_system-1">
                        <input type="radio" name="public_address_system" id="public_address_system-1" value="analog"
                                {{($account['public_address_system'] == 'analog' ? 'checked' : '')}}>
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
                        <input type="radio" name="employ_electronic_access_control" id="employ_electronic_access_control-0" value="yes"
                                {{($account['public_address_system'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="employ_electronic_access_control-1">
                        <input type="radio" name="employ_electronic_access_control" id="employ_electronic_access_control-1" value="no"
                                {{($account['public_address_system'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="type_of_system">
                    If YES, what type of system? </label>
                <div class="col-md-4">
                    <textarea id="type_of_system" name="type_of_system" class="form-control">{{$account['type_of_system']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="system_enrollment">
                    If YES, how is system enrollment?  </label>
                <div class="col-md-4">
                    <textarea id="system_enrollment" name="system_enrollment" class="form-control">{{$account['system_enrollment']}}</textarea>
                </div>
            </div>

            <h3>Alarm System</h3>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="alarm_systems">
                    How are alarm systems used at the facility? </label>
                <div class="col-md-4">
                    <textarea id="alarm_systems" name="alarm_systems" class="form-control">{{$account['alarm_systems']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="alarm_system_monitored">
                    How is the alarm system monitored and how are intrusions assessed and responded?  </label>
                <div class="col-md-4">
                    <textarea id="alarm_system_monitored" name="alarm_system_monitored" class="form-control">{{$account['alarm_system_monitored']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="penalties_to_false_alarms">
                    If Police respond, have there been any previous penalties owing to false alarms?  </label>
                <div class="col-md-4">
                    <textarea id="penalties_to_false_alarms" name="penalties_to_false_alarms" class="form-control">{{$account['penalties_to_false_alarms']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="history_of_nuisance">
                    What has been the history of false/nuisance alarms? </label>
                <div class="col-md-4">
                    <textarea id="history_of_nuisance" name="history_of_nuisance" class="form-control">{{$account['history_of_nuisance']}}</textarea>
                </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="has_panic_alarms">
                    Does the facility have any panic alarms?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="is_point_of_contact-0">
                        <input type="radio" name="is_point_of_contact" id="is_point_of_contact-0" value="yes"
                                {{($account['is_point_of_contact'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="is_point_of_contact-1">
                        <input type="radio" name="is_point_of_contact" id="is_point_of_contact-1" value="no"
                                {{($account['is_point_of_contact'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="panic_alarm_activated">
                    If YES, who exactly is contacted and what happens when a panic alarm is activated? </label>
                <div class="col-md-4">
                    <textarea id="panic_alarm_activated" name="panic_alarm_activated" class="form-control">{{$account['panic_alarm_activated']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="panic_alarm_investigated">
                    If YES, how are panic alarms investigated and responded? </label>
                <div class="col-md-4">
                    <textarea id="panic_alarm_investigated" name="panic_alarm_investigated" class="form-control">{{$account['panic_alarm_investigated']}}</textarea>
                </div>
            </div>

            <h3>CCTV</h3>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="onsite_cctv">
                    How is the on-site CCTV system monitored? </label>
                <div class="col-md-4">
                    <textarea id="onsite_cctv" name="onsite_cctv" class="form-control">{{$account['onsite_cctv']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="where_monitors_located">
                    Where are the DVR system and monitors located?  </label>
                <div class="col-md-4">
                    <textarea id="where_monitors_located" name="where_monitors_located" class="form-control">{{$account['where_monitors_located']}}</textarea>
                </div>
            </div>


            <!------------------------- --?

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url(Request::segment(1) . '/kkpdata/step5/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>


        </div>
    </div>
</div>

































@endsection
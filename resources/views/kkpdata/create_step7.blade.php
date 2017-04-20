@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            {!! view('kkpdata/partials/side_menu', compact('account')) !!}

            <div class="col-md-8">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('kkpdata/process_step7/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 7 - (Medical)</legend>

            <!-- Text input-->
            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="has_medical_clinic">
                    Does the facility have a medical clinic or staff on-site?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_medical_clinic-0">
                        <input type="radio" name="has_medical_clinic" id="has_medical_clinic-0" value="yes"
                                {{($account['has_medical_clinic'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_medical_clinic-1">
                        <input type="radio" name="has_medical_clinic" id="has_medical_clinic-1" value="no"
                                {{($account['has_medical_clinic'] == 0 ? 'checked' : '')}}>
                       No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="medical_clinic_description">
                    If YES, what type of facilities, equipment, and staff are on-site? </label>
                <div class="col-md-4">
                    <textarea id="medical_clinic_description" name="medical_clinic_description" class="form-control">{{$account['medical_clinic_description']}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="medical_staff_trained">
                    If YES, does medical staff possess training/qualifications in emergency trauma response? </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="medical_staff_trained-0">
                        <input type="radio" name="medical_staff_trained" id="medical_staff_trained-0" value="yes"
                            {{($account['medical_staff_trained'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="medical_staff_trained-1">
                        <input type="radio" name="medical_staff_trained" id="medical_staff_trained-1" value="no"
                            {{($account['medical_staff_trained'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="emergency_medical_kits_located">
                    Where are the facility's emergency medical kits located?  </label>
                <div class="col-md-4">
                    <textarea id="emergency_medical_kits_located" name="emergency_medical_kits_located" class="form-control">{{$account['emergency_medical_kits_located']}}</textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="aeds_located">
                    Where are the facility's AEDs located? </label>
                <div class="col-md-4">
                    <textarea id="aeds_located" name="aeds_located" class="form-control">{{$account['aeds_located']}}</textarea>
                </div>
            </div>


            <!------------------------- --?

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url('kkpdata/step6/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>

            </div>
        </div>
    </div>




































@endsection
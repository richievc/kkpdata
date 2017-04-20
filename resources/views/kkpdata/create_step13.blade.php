@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            {!! view('kkpdata/partials/side_menu', compact('account')) !!}

            <div class="col-md-8">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('kkpdata/process_step13/' . $account['id'])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 13 - (Security and Safety Reporting)</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="has_formally_documenting_security">
                    Does the facility have a system for formally documenting security and safety incidents?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="has_formally_documenting_security-0">
                        <input type="radio" name="has_formally_documenting_security" id="has_formally_documenting_security-0" value="yes"
                                {{($account['has_formally_documenting_security'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="has_formally_documenting_security-1">
                        <input type="radio" name="has_formally_documenting_security" id="has_formally_documenting_security-1" value="no"
                                {{($account['has_formally_documenting_security'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="formally_documented_stored">
                    If YES, how is the information documented and stored?</label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="formally_documented_stored-0">
                        <input type="radio" name="formally_documented_stored" id="formally_documented_stored-0" value="database"
                                {{($account['formally_documented_stored'] == 'database' ? 'checked' : '')}}>
                        Database
                    </label>
                    <label class="checkbox-inline" for="formally_documented_stored-1">
                        <input type="radio" name="formally_documented_stored" id="formally_documented_stored-1" value="written_reports"
                                {{($account['formally_documented_stored'] == 'written_reports' ? 'checked' : '')}}>
                        Written Report
                    </label>
                    <label class="checkbox-inline" for="formally_documented_stored-1">
                        <input type="radio" name="formally_documented_stored" id="formally_documented_stored-1" value="memos_emails"
                                {{($account['formally_documented_stored'] == 'memos_emails' ? 'checked' : '')}}>
                       Memos/Emails
                    </label>
                </div>
            </div>

            <!------------------------- --?

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url('kkpdata/step12/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>

            </div>
        </div>
    </div>




































@endsection
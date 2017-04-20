@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            {!! view('kkpdata/partials/side_menu', compact('account')) !!}

            <div class="col-md-8">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url('kkpdata/process_step11/' . $account['id'])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 11 - (Security Policies and Documentation)</legend>

           <h4>Pre-Employment Screening and HR Practices</h4>

            <div class="form-group">
                <label class="col-md-4 control-label" for="employees_subjected_to_background_checks">
                    Are employees subjected to background checks as part of the employment process?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="employees_subjected_to_background_checks-0">
                        <input type="radio" name="employees_subjected_to_background_checks" id="employees_subjected_to_background_checks-0" value="yes"
                                {{($account['employees_subjected_to_background_checks'] == 'yes' ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="employees_subjected_to_background_checks-1">
                        <input type="radio" name="employees_subjected_to_background_checks" id="employees_subjected_to_background_checks-1" value="no"
                                {{($account['employees_subjected_to_background_checks'] == 'nome' ? 'checked' : '')}}>
                        No
                    </label>
                    <label class="checkbox-inline" for="employees_subjected_to_background_checks-2">
                        <input type="radio" name="employees_subjected_to_background_checks" id="employees_subjected_to_background_checks-2" value="some"
                                {{($account['employees_subjected_to_background_checks'] == 'some' ? 'checked' : '')}}>
                        Some
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="describe_estbc">
                    If SOME, please describe any employees that are not subjected to background checks?  </label>
                <div class="col-md-4">
                    <textarea id="describe_estbc" name="describe_estbc" class="form-control">{{$account['describe_estbc']}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="employees_criminal_history">
                    If YES, do background checks include criminal history?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="employees_criminal_history-0">
                        <input type="radio" name="employees_criminal_history" id="employees_criminal_history-0" value="yes"
                                {{($account['employees_criminal_history'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="employees_criminal_history-1">
                        <input type="radio" name="employees_criminal_history" id="employees_criminal_history-1" value="no"
                                {{($account['employees_criminal_history'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="previous_employer_verifications">
                    If YES, do background checks include previous employer verifications? </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="previous_employer_verifications-0">
                        <input type="radio" name="previous_employer_verifications" id="previous_employer_verifications-0" value="yes"
                                {{($account['"previous_employer_verifications'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="previous_employer_verifications-1">
                        <input type="radio" name="previous_employer_verifications" id="previous_employer_verifications-1" value="no"
                                {{($account['"previous_employer_verifications'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="guidelines_for_termination">
                    Does the facility have written guidelines for terminating employees who have demonstrated
                    aggressive behavior or indicators of potential violence?
                </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="guidelines_for_termination-0">
                        <input type="radio" name="guidelines_for_termination" id="guidelines_for_termination-0" value="yes"
                                {{($account['"guidelines_for_termination'] == 1 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="guidelines_for_termination-1">
                        <input type="radio" name="guidelines_for_termination" id="guidelines_for_termination-1" value="no"
                                {{($account['"guidelines_for_termination'] == 0 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="guidelines_for_termination_file">
                    If YES, Please upload a copy for our review (MS Word or PDF): </label>
                <div class="col-md-4">
                    @if(!empty($account['guidelines_for_termination_file']))
                        FileName: {{$account['guidelines_for_termination_file']}}
                        <a href="{{url('admin/kkpdata/delete/'.$account['id'].'/step11/guidelines_for_termination_file')}}"><i class="fa fa-trash"></i></a>
                    @else
                        <input type="file" name="guidelines_for_termination_file" id="guidelines_for_termination_file" >
                    @endif
                </div>
            </div>

            <!------------------------- --?

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url('kkpdata/step10/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>





</div>
        </div>
    </div>

































@endsection
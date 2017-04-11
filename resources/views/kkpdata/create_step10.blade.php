@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>

    <form action="{{url(Request::segment(1) . '/kkpdata/process_step10/' . $account['id'])}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$account['id']}}">
        <fieldset>

            <!-- Form Name -->
            <legend>Step 10 - (Janitorial)</legend>

            <div class="form-group">
                <label class="col-md-4 control-label" for="janitorial_service">
                    What type of janitorial service is used?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="janitorial_service-0">
                        <input type="radio" name="janitorial_service" id="janitorial_service-0" value="inhouse"
                                {{($account['janitorial_service'] == 'inhouse' ? 'checked' : '')}}>
                        In-house Employees
                    </label>
                    <label class="checkbox-inline" for="janitorial_service-1">
                        <input type="radio" name="janitorial_service" id="janitorial_service-1" value="contract"
                                {{($account['janitorial_service'] == 'contract' ? 'checked' : '')}}>
                        Contract
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="contracted_janitorial_service">
                    If contract, what company is used?  </label>
                <div class="col-md-4">
                    <textarea id="contracted_janitorial_service" name="contracted_janitorial_service" class="form-control">{{$account['contracted_janitorial_service']}}</textarea>
                </div>
            </div>

            <!------------------------- --?

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="continue" name="continue" class="btn btn-primary pull-right">Continue</button>
                    <a href="{{ url(Request::segment(1) . '/kkpdata/step9/' . $account['id'])}}" id="previous" name="previous" class="btn btn-default pull-right">Previous</a>
                </div>
            </div>

        </fieldset>
    </form>


</div>
        </div>
    </div>




































@endsection
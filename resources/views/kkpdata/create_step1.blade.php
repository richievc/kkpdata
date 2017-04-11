@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>
    <div class="alert alert-default">
        <p>
            The following questionnaire is prepared to assist our security team in preparing for our upcoming security
            and emergency readiness assessment at your facility. The purpose of this questionnaire is to effectively
            familiarize our team with the assets and operations at your facility and any unique concerns you may have
            that may warrant special attention during our visit.
        </p>
        <p>
            Please answer each question completely. If you cannot complete this questionnaire in one session, please
            save before exiting your browser window. When you return and login again, your previously input
            information will be saved and can be edited if necessary.
        </p>
        <p>
            We also encourage you to upload any additional information as described you believe would be helpful to our
            team in best understanding the operations and infrastructure at your location. Please submit all questions
            or addendum information to: cgundry@cisworldervices.org.
        </p>
    </div>
    <hr>
    <form action="{{url('kkpdata/process_' . (!empty($account['id']) ? 'edit_' : '') . 'step1/' . (!empty($account['id']) ? $account['id'] : ''))}}" method="post" class="form-horizontal">
        {!! csrf_field() !!}

        <fieldset>

            <!-- Form Name -->
            <legend>Step 1 - (Background Information)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="facility">Name of Facility</label>
                <div class="col-md-4">
                    <input id="facility" name="facility" type="text" value="{{@$account['facility']}}" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="main_phone">Main Telephone</label>
                <div class="col-md-4">
                    <input id="main_phone" name="main_phone" type="text" value="{{@$account['main_phone']}}"  class="form-control input-md phone" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="your_name">Your Name</label>
                <div class="col-md-4">
                    <input id="your_name" name="your_name" type="text" value="{{@$account['your_name']}}"  class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="your_title">Your Title</label>
                <div class="col-md-4">
                    <input id="your_title" name="your_title" type="text" value="{{@$account['your_title']}}"  class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="your_phone">Your Phone</label>
                <div class="col-md-4">
                    <input id="your_phone" name="your_phone" type="text" value="{{@$account['your_phone']}}"  class="form-control input-md phone" required="">
                </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="is_point_of_contact">Will you be our Point of contact and on-site facilitator during our visit?  </label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="is_point_of_contact-0">
                        <input type="radio" name="is_point_of_contact" id="is_point_of_contact-0" value="yes"
                                {{(@$account['is_point_of_contact'] == 0 ? 'checked' : '')}}>
                        Yes
                    </label>
                    <label class="checkbox-inline" for="is_point_of_contact-1">
                        <input type="radio" name="is_point_of_contact" id="is_point_of_contact-1" value="no"
                               {{(@$account['is_point_of_contact'] == 1 ? 'checked' : '')}}>
                        No
                    </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="point_of_contact_name">If NO, who will be the assigned as our on-site contact? </label>
                <div class="col-md-4">
                    <input id="point_of_contact_name" name="point_of_contact_name" value="{{@$account['point_of_contact_name']}}" type="text"  class="form-control input-md">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="point_of_contact_phone">Point of contact phone</label>
                <div class="col-md-4">
                    <input id="point_of_contact_phone" name="point_of_contact_phone"  value="{{@$account['point_of_contact_phone']}}" type="text"  class="form-control input-md phone">
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

            </div>
        </div>
    </div>




































@endsection
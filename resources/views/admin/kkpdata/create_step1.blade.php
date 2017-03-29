@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            KKPDATA<small> Create Accounts</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">Home</a></li>
            <li class="active">KKPData</li>
            <li class="active">Step 1</li>
        </ol>
    </section>
@endsection

@section('content')
    <h2>PRE-SURVEY SECURITY QUESTIONNAIRE</h2>
    <div class="alert alert-warning">
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
    <form action="process_step1" method="post" class="form-horizontal">
        {!! csrf_field() !!}

        <fieldset>

            <!-- Form Name -->
            <legend>Step 1 - (Background Information)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="facility">Name of Facility</label>
                <div class="col-md-4">
                    <input id="facility" name="facility" type="text" placeholder="Name of Facility" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="main_phone">Main Telephone</label>
                <div class="col-md-4">
                    <input id="main_phone" name="main_phone" type="text" placeholder="Main Telephone" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="your_name">Your Name</label>
                <div class="col-md-4">
                    <input id="your_name" name="your_name" type="text" placeholder="Your Name" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="your_title">Your Title</label>
                <div class="col-md-4">
                    <input id="your_title" name="your_title" type="text" placeholder="Your Title" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="your_phone">Your Phone</label>
                <div class="col-md-4">
                    <input id="your_phone" name="your_phone" type="text" placeholder="Your Phone" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="is_point_of_contact">Will you be our Point of Contact and on-site facilitator during our visit?  </label>
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
                <label class="col-md-4 control-label" for="point_of_contact_name">If NO, who will be the assigned as our on-site contact? </label>
                <div class="col-md-4">
                    <input id="point_of_contact_name" name="point_of_contact_name" type="text" placeholder="Point of Contact Name" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="point_of_contact_phone">Point of contact phone</label>
                <div class="col-md-4">
                    <input id="point_of_contact_phone" name="point_of_contact_phone" type="text" placeholder="Point of contact phone" class="form-control input-md">

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
@extends('layouts.app')

@section('content')
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><span class="semi-bold">Property Manager’s Pre-Survey Information Questionnaire</span></h4>
                        </div>
                    </div>
                    <div class="panel-body text-center">
                        <div class="alert alert-info text-left">
                            <p>
                                The following questionnaire is prepared to assist our team in preparing for our upcoming
                                security and environmental risk assessment at your property. The purpose of this
                                questionnaire is to effectively familiarize our team with your property and any unique
                                concerns that may warrant special attention during our visit.
                            </p>
                            <p>
                                Please answer each question completely. If you cannot complete this questionnaire in
                                one session, please save before exiting your browser window. When you return and login
                                again, your previously input information will be saved and can be edited if necessary.
                            </p>
                            <p>
                                We also ask that you upload any additional information and documents as requested.
                            </p>
                            <p>
                                Please submit any questions regarding this questionnaire to: era@cisworldservices.org
                            </p>
                            <p>
                                <i>Thank you in advance for your cooperation.</i>
                            </p>

                        </div>
                        <a href="/kkpdata/survey/begin" class="btn btn-success btn-flat btn-outline">BEGIN SURVEY</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-title">
                        <h4> <span class="semi-bold">Accounts</span></h4>
                        <div class="tools">
                            <a href="javascript:;" class="reload"></a>
                        </div>
                    </div>

                    <div class="grid-body ">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <table class="table" id="example3" >
                            <thead>
                            <tr>
                                <th>Property</th>
                                <th>Main Telephone</th>
                                <th>Point of Contact</th>
                                <th>POC Phone</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($properties) < 1)
                                <div class="alert alert-danger">No Properties Found</div>

                            @else

                                @foreach ($properties as $data)
                                    <tr>
                                        <td>{{ $data->property_name }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->manager_name }}</td>
                                        <td>{{ $data->manager_phone }}</td>
                                        <td>
                                            <a href="{{ url('/kkpdata/survey/background/' . $data->id) }}" class="btn btn-xs btn-default">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="#delete-survey" class="btn btn-xs btn-danger" id="{{ $data->id }}" data-toggle="modal">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                        </table>

                    </div>
                    <div class="modal modal-danger fade" tabindex="-1" id="delete-survey" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Survey</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Are you sure you want to delete this survey.</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger">DELETE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
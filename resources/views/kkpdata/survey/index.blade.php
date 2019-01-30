@extends('layouts.app')


@section('content')
<div class="container theme-showcase" role="main">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-default text-center">
                <h5 style="color: #ff0000">CONFIDENTIALITY NOTICE</h5>
                <p style="color: #ff0000">
                    This questionnaire is completed for use by legal counsel in preparation for
                    potential future litigation. The information contained in this completed
                    questionnaire is confidential and protected by the work-product rule.
                </p>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ url('/kkpdata/survey/background/' . (!isset($property) ? '' : $property->id)) }}">Background Information</a></li>
                        <li class="list-group-item"><a href="{{ url('/kkpdata/survey/property/' . (!isset($property) ? '' : $property->id)) }}">Property Detail</a></li>
                        <li class="list-group-item"><a href="{{ url('/kkpdata/survey/environmental/' . (!isset($property) ? '' : $property->id)) }}">Environmental Risk Concerns</a></li>
                        <li class="list-group-item"><a href="{{ url('/kkpdata/survey/documents/' . (!isset($property) ? '' : $property->id)) }}">Documents</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    @if($section == 'background')
                        @include('kkpdata.forms.background')
                    @elseif($section == 'property')
                        @include('kkpdata.forms.detail')
                    @elseif($section == 'environmental')
                        @include('kkpdata.forms.environmental')
                    @elseif($section == 'documents')
                        @include('kkpdata.forms.documents')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
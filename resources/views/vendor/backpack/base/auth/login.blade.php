@extends('backpack::auth_layout')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 30px;">
            <h1>{!! env('app_name', 'exCore') !!}</h1>
        </div>
        <div class="col-md-4 col-md-offset-4" style="margin-top: 30px;">
            <div class="box box-default" style="
            	border: 5px solid #111; 
            	border-radius: 10px;
            	background: rgba(48,48,48,0.7);
            ">
                <div class="box-header with-border">
                    <div class="box-title text-white">{{ trans('backpack::base.login') }}</div>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url(config('backpack.base.route_prefix').'/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('backpack::base.email_address') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('backpack::base.password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('backpack::base.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('backpack::base.login') }}
                                </button>

                                <a class="btn btn-link" href="{{ url(config('backpack.base.route_prefix', 'admin').'/password/reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

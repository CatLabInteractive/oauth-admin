@extends('oauth-admin::layouts.oauth-admin')

@section('title', 'Edit application')

@section('content')

    <h2>{{ trans('oauth-admin::applications.info') }}</h2>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('oauth-admin::applications.details') }}</h3>
        </div>
        <div class="panel-body">

            <!-- Register new endpoint form -->
            {{ Form::open(array('method' => 'post', 'action' => [ '\CatLab\OAuthAdmin\Controllers\ApplicationController@createApplication' ] )) }}
            {{ Form::label(trans('oauth-admin::applications.name')) }}
            {{ Form::text('name') }}
            {{ Form::submit(trans('oauth-admin::applications.createApplication')) }}
            {{ Form::close() }}
        </div>
    </div>

@endsection
@extends('oauth-admin::layouts.oauth-admin')

@section('title', 'Edit application')

@section('content')

    <h2>{{ $client->name }}</h2>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Credentials</h3>
        </div>
        <div class="panel-body">

            <table class="table endpoints">
                <tr>
                    <th>ID</th>
                    <td>{{$client->id}}</td>
                </tr>

                <tr>
                    <th>Secret</th>
                    <td>{{$client->secret}}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Endpoints</h3>
        </div>
        <div class="panel-body">

            <table class="table endpoints">

                <tr>
                    <th>Endpoint</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>

                @foreach($client->endpoints as $endpoint)
                    <tr>
                        <td>{{$endpoint->redirect_uri}}</td>
                        <td>{{$endpoint->created_at}}</td>
                        <td><a href="{{ action(
                            '\CatLab\OAuthAdmin\Controllers\ApplicationController@removeEndpoint',
                            [
                                'id' => $client->id,
                                'endpointId' => $endpoint->id
                            ]
                            ) }}">{{ trans('oauth-admin::applications.remove') }}</a></td>
                    </tr>
                @endforeach
            </table>

            <!-- Register new endpoint form -->
            {{ Form::open(array('action' => [ '\CatLab\OAuthAdmin\Controllers\ApplicationController@createEndpoint', $client->id ] )) }}
            {{ Form::text('redirect_uri') }}
            {{ Form::submit(trans('oauth-admin::applications.createEndpoint')) }}
            {{ Form::close() }}
        </div>
    </div>

@endsection
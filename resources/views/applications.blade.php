@extends('oauth-admin::layouts.oauth-admin')

@section('title', 'External applications')

@section('content')

    <h2>{{ trans('oauth-admin::applications.title') }}</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('oauth-admin::applications.clients') }}</h3>
        </div>
        <div class="panel-body">
            <table class="table oauth-applications">

                <tr>
                    <th>{{ trans('oauth-admin::applications.id') }}</th>
                    <th>{{ trans('oauth-admin::applications.name') }}</th>
                    <th>{{ trans('oauth-admin::applications.created') }}</th>
                </tr>

                @foreach ($clients as $client)
                    <tr>
                        <td>
                            <a href="{{route('oauthadmin-applications-edit', [ 'id' => $client->id ])}}">
                                {{ $client->id }}
                            </a>
                        </td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->created_at }}</td>
                    </tr>
                @endforeach
            </table>

            <p>
                <a href="{{route('oauthadmin-applications-create')}}">Create new application</a>
            </p>
        </div>
    </div>

@endsection
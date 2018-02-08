<?php

namespace CatLab\OAuthAdmin\Controllers;

use CatLab\OAuthAdmin\Models\OAuthClient;
use CatLab\OAuthAdmin\Models\OAuthClientEndpoint;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

use Request;
use Response;

/**
 * Class ApplicationController
 * @package CatLab\OAuthAdmin\Controllers
 */
class ApplicationController extends Controller
{
    use ValidatesRequests;

    /**
     *
     */
    public function index()
    {
        $data = [];

        $clients = OAuthClient::all();
        $data['clients'] = $clients;

        return Response::view('oauth-admin::applications', $data);
    }

    /**
     * @param string $id
     * @return Response
     */
    public function edit($id)
    {
        $client = OAuthClient::findOrFail($id);
        return Response::view('oauth-admin::edit-application', [ 'client' => $client ]);
    }

    /**
     * @param string $id
     * @return Response
     */
    public function processEdit($id)
    {
        // Doesn't do anything yet.
        $client = OAuthClient::findOrFail($id);

        return redirect(
            route(
                'oauthadmin-applications-edit',
                [ 'id' => $client->id ]
            )
        );
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function createApplication()
    {
        return Response::view('oauth-admin::create-application');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function processCreate(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $name = Request::input('name');

        $client = OAuthClient::createNew($name);
        $client->save();

        return redirect(
            route(
                'oauthadmin-applications-edit',
                [ 'id' => $client->id ]
            )
        );
    }

    /**
     * @param $id
     * @param $endpointId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeEndpoint($id, $endpointId)
    {
        $client = OAuthClient::findOrFail($id);

        // Look for duplicate
        $endpoint = OAuthClientEndpoint::where([
            'client_id' => $client->id,
            'id' => $endpointId
        ])->first();

        if ($endpoint) {
            $endpoint->delete();
        }

        return redirect(
            action(
                '\CatLab\OAuthAdmin\Controllers\ApplicationController@edit',
                [ 'id' => $client->id ]
            )
        );
    }

    /**
     *
     */
    public function createEndpoint($id)
    {
        $client = OAuthClient::findOrFail($id);

        $redirect_uri = Request::input('redirect_uri');

        // Look for duplicate
        $endpoint = OAuthClientEndpoint::where([
            'client_id' => $client->id,
            'redirect_uri' => $redirect_uri
        ])->first();

        if (!$endpoint) {
            $endpoint = new OAuthClientEndpoint();
            $endpoint->redirect_uri = $redirect_uri;
            $endpoint->client()->associate($client);
            $endpoint->save();
        }

        return redirect(
            action(
                '\CatLab\OAuthAdmin\Controllers\ApplicationController@edit',
                [ 'id' => $client->id ]
            )
        );
    }
}
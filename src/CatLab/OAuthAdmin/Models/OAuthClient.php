<?php

namespace CatLab\OAuthAdmin\Models;

/**
 * Class OAuthClient
 * @package CatLab\OAuthAdmin\Models
 */
class OAuthClient extends \Illuminate\Database\Eloquent\Model
{
    /**
     * @param $name
     * @return OAuthClient
     */
    public static function createNew($name)
    {
        $client = new OAuthClient();
        $client->name = $name;
        $client->id = bin2hex(random_bytes(16));
        $client->secret = bin2hex(random_bytes(16));

        return $client;
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'oauth_clients';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function endpoints()
    {
        return $this->hasMany(OAuthClientEndpoint::class, 'client_id');
    }

}
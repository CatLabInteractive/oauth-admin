<?php

namespace CatLab\OAuthAdmin\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OAuthClientEndpoint
 * @package CatLab\OAuthAdmin\Models
 */
class OAuthClientEndpoint extends Model
{
    protected $table = 'oauth_client_endpoints';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(OAuthClient::class, 'client_id');
    }
}
<?php

namespace LaravelEveTools\EveApi\Jobs\Abstracts;



use LaravelEveTools\EveApi\Jobs\Middleware\CheckTokenScope;
use LaravelEveTools\EveApi\Jobs\Middleware\CheckTokenVersion;
use LaravelEveTools\EveApi\Models\RefreshToken;

abstract class AbstractAuthCharacterJob extends AbstractCharacterJob
{

    public function __construct(RefreshToken $token)
    {
        $this->token = $token;
        parent::__construct($token->character_id);
    }

    public function middleware()
    {
        //dd("Hello middleware");
        return array_merge(parent::middleware(), [
            new CheckTokenScope,
            new CheckTokenVersion,
        ]);
    }

}
<?php

namespace LaravelEveTools\EveApi\Jobs\Bookmarks\Characters;

use LaravelEveTools\EveApi\Jobs\Abstracts\AbstractAuthCharacterJob;

abstract class Bookmarks extends AbstractAuthCharacterJob
{
    protected $method = 'get';

    protected $endpoint = '/characters/{character_id}/bookmarks';

    protected $version = 'v2';

    protected $scope = 'esi-bookmarks.read_character_bookmarks.v1';

    protected $tags = ['character', 'bookmarks'];

    protected $page = 1;
}
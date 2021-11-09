<?php

namespace LaravelEveTools\EveApi\Jobs\Market;

use LaravelEveTools\EveApi\Jobs\Abstracts\EsiBase;

abstract class GroupItems extends EsiBase
{
    protected $endpoint = '/markets/groups/{marget_group_id}/';

    public $tags = ['public', 'market'];
    /**
     * @var int
     */
    private $market_group_id;

    public function __construct(int $market_group_id)
    {
        $this->market_group_id = $market_group_id;
    }

    /**
     * @return int
     */
    public function getMarketGroupId(): int
    {
        return $this->market_group_id;
    }

    protected function buildUriValues(): array
    {
        return array_merge(parent::buildUriValues(), [
            'market_group_id' => $this->getMarketGroupId(),
        ]);
    }

}
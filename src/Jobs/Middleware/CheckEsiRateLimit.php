<?php

namespace LaravelEveTools\EveApi\Jobs\Middleware;

use LaravelEveTools\EveApi\Jobs\Abstracts\EsiBase;

class CheckEsiRateLimit
{

    public function handle($job, $next){
        if(is_subclass_of($job, EsiBase::class)){

            if($this->isEsiRateLimitReached($job)){
                logger()->warning(
                    springf('Rate Limit has been reached. Job %s has been delayed by %d seconds',
                    get_class($job), $job::RATE_LIMIT_DURATION)
                );

                $job->release($job::RATE_LIMIT_DURATION);

                return;
            }

        }

        $next($job);
    }

    private function isEsiRateLimitReached(EsiBase $job): bool
    {

        $current = cache()->get($job::RATE_LIMIT_KEY) ?: 0;

        logger()->debug('Rate Limit Status', ['current'=>$current, 'limit'=> $job::RATE_LIMIT]);

        return $current >= $job::RATE_LIMIT;
    }
}
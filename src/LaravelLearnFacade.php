<?php

namespace Exzachlyvv\LaravelLearn;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Exzachlyvv\LaravelLearn\Skeleton\SkeletonClass
 */
class LaravelLearnFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-learn';
    }
}

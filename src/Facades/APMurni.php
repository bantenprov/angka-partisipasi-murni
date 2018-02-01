<?php namespace Bantenprov\APMurni\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The APMurni facade.
 *
 * @package Bantenprov\APMurni
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class APMurni extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ap-murni';
    }
}

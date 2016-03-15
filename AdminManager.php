<?php

namespace NineCells\Admin;

use InvalidArgumentException;

class AdminManager
{
    protected $app;

    protected $stores = [];

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function store($name = null)
    {
        $name = $name ?: $this->getDefaultDriver();

        return $this->stores[$name] = $this->get($name);
    }

    public function driver($driver = null)
    {
        return $this->store($driver);
    }

    protected function get($name)
    {
        return isset($this->stores[$name]) ? $this->stores[$name] : $this->resolve($name);
    }

    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        if (is_null($config)) {
            throw new InvalidArgumentException("Admin store [{$name}] is not defined.");
        }

        $driverMethod = 'create'.ucfirst($config['driver']).'Driver';

        if (method_exists($this, $driverMethod)) {
            return $this->{$driverMethod}($config);
        } else {
            throw new InvalidArgumentException("Driver [{$config['driver']}] is not supported.");
        }
    }

    protected function createDotenvDriver(array $config)
    {
        return new DotenvStore();
    }

    protected function getConfig($name)
    {
        return $this->app['config']["ninecells.admin.stores.{$name}"];
    }

    public function getDefaultDriver()
    {
        return $this->app['config']['ninecells.admin.default'];
    }

    public function setDefaultDriver($name)
    {
        $this->app['config']['ninecells.admin.default'] = $name;
    }

    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->store(), $method], $parameters);
    }
}
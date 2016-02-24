<?php

namespace NineCells\Admin;

class PackageList
{
    private $packages = [];

    public function addPackageInfo($key, $name, $urlGenerator)
    {
        $item = new PackageInfo(['key' => $key, 'name' => $name, 'url-gen' => $urlGenerator]);
        array_push($this->packages, $item);
    }

    public function getPackageList()
    {
        return $this->packages;
    }
}

class PackageInfo
{
    private $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getKey()
    {
        return $this->data['key'];
    }

    public function getName()
    {
        return $this->data['name'];
    }

    public function getUrl()
    {
        $func = $this->data['url-gen'];
        return $func();
    }
}

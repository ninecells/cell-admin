<?php

namespace NineCells\Admin;

class PackageList
{
    private $packages = [];

    private $currentKey = null;
    private $currentMenu = [];

    public function addPackageInfo($key, $name, $urlGenerator)
    {
        $item = new PackageInfo(['key' => $key, 'name' => $name, 'url-gen' => $urlGenerator]);
        $this->packages[$key] = $item;
    }

    public function getPackageList()
    {
        return $this->packages;
    }

    public function setCurrentMenu($key, array $menu)
    {
        $this->currentKey = $key;
        $this->currentMenu = $menu;
    }

    public function getCurrentKey()
    {
        return $this->currentKey;
    }

    public function getCurrentName()
    {
        $key = $this->getCurrentKey();
        if (!$key) {
            return '';
        }
        $menu = $this->packages[$key];

        return $menu->getName();
    }

    public function getCurrentMenu()
    {
        return $this->currentMenu;
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

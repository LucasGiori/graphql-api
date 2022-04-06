<?php

namespace App\Application\Settings;

class Settings implements SettingsInterface
{
    public function __construct(
        private array $settings
    ) {}

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key = ''): mixed
    {
        return (empty($key)) ? $this->settings : $this->settings[$key];
    }
}
<?php
namespace Concrete\Package\PushupSocial\Src\PushupSocial\Configuration;

use Package;

class Configuration
{

    /**
     * @var \Concrete\Core\Config\Repository\Liaison
     */
    protected $config;

    /**
     * @param \Concrete\Core\Config\Repository\Liaison $config
     */
    public function __construct(\Concrete\Core\Config\Repository\Liaison $config)
    {
        $this->config = $config;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->config->get('settings.enabled');
    }

    /**
     * @param bool $val
     */
    public function updateEnabled($val)
    {
        $this->config->save('settings.enabled', $val);
    }

    /**
     * @return string
     */
    public function getCommunityId()
    {
        return $this->config->get('settings.community_id');
    }

    /**
     * @param string $id
     */
    public function updateCommunityId($id)
    {
        $this->config->save('settings.community_id', $id);
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function save($key, $value)
    {
        $this->config->save($key, $value);
    }

    /**
     * @param string $key
     */
    public function get($key)
    {
        return $this->config->get($key);
    }

}

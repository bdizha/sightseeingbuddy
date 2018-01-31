<?php
namespace Craft;

/**
 * Class FieldProxyPlugin
 *
 * @package Craft
 */
class FieldProxyPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    function getName()
    {
        return 'FieldProxy';
    }

    /**
     * @return string
     */
    function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    function getDeveloper()
    {
        return 'Flow Communications';
    }

    /**
     * @return string
     */
    function getDeveloperUrl()
    {
        return 'http://www.flowsa.com';
    }

    /**
     * @return array
     */
    protected function defineSettings()
    {
        return array(
        );
    }

    /**
     * @return mixed
     */
    public function getSettingsHtml()
    {
    }
}

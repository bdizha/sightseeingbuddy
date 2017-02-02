<?php

/*
*
* reCaptcha for Craft Main Plugin File
* Author: Charl Kruger
* https://github.com/cjkruger
*
*/

namespace Craft;

class RecaptchaPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Google Recaptcha');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Flow Communications';
    }

    function getDeveloperUrl()
    {
        return 'https://www.flowsa.com';
    }

    public function addHook()
    {
        craft()->templates->hook('afterFrontendFormHook', function () {
            $settings = craft()->plugins->getPlugin('recaptcha')->getSettings();

            $oldTemplatesPath = craft()->path->getTemplatesPath();
            $newTemplatesPath = craft()->path->getPluginsPath() . 'recaptcha/templates/';
            craft()->path->setTemplatesPath($newTemplatesPath);

            $vars = array(
                'id'      => 'gRecaptchaContainer',
                'siteKey' => $settings->attributes['siteKey']
            );

            $html = craft()->templates->render('frontend/recaptcha.html', $vars);

            craft()->path->setTemplatesPath($oldTemplatesPath);

            craft()->templates->includeJsFile('https://www.google.com/recaptcha/api.js?onload=initCaptcha&render=explicit');

            echo $html;
        });
    }


    protected function defineSettings()
    {
        return array(
            'siteKey'   => array(AttributeType::Mixed, 'default' => ''),
            'secretKey' => array(AttributeType::Mixed, 'default' => '')
        );
    }

    public function getSettingsHtml()
    {
        return craft()->templates->render('/recaptcha/settings', array(
            'settings' => $this->getSettings()
        ));
    }

}

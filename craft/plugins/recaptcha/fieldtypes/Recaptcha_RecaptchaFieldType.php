<?php
namespace Craft;

use Craft\AttributeType;
use Craft\BaseFieldType;

class Recaptcha_RecaptchaFieldType extends BaseFieldType
{
    public function getName()
    {
        return Craft::t('Recaptcha');
    }

    public function defineContentAttribute()
    {
        return false;
    }

    public function getInputHtml($name, $value)
    {
        $settings = craft()->plugins->getPlugin('recaptcha')->getSettings();

        craft()->templates->includeJsResource('recaptcha/js/scripts.js');
        craft()->templates->includeJsFile('https://www.google.com/recaptcha/api.js?onload=initCaptcha&render=explicit');

        return craft()->templates->render('recaptcha/input', array(
            'name' => $name,
            'value' => $value,
            'siteKey' => $settings->attributes['siteKey']
        ));
    }

    public function validate($value)
    {
        $captcha = craft()->request->getPost('g-recaptcha-response');

        $verified = $this->verify($captcha);

        if (!$verified) {
            return [
                "Security verification failed"
            ];
        }

        return true;
    }

    public function verify($data)
    {
        $base = "https://www.google.com/recaptcha/api/siteverify";

        $plugin = craft()->plugins->getPlugin('recaptcha');
        $settings = $plugin->getSettings();

        $params = array(
            'secret'   => $settings->attributes['secretKey'],
            'response' => $data
        );

        $client = new \Guzzle\Http\Client();

        $request = $client->post($base);
        $request->addPostFields($params);
        $result = $client->send($request);

        if ($result->getStatusCode() == 200) {
            $json = $result->json();
            if ($json['success']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
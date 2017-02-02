<?php
namespace Craft;

/**
 * Events plugin class
 */
class EmbedderPlugin extends BasePlugin
{
    public function getName()
    {
        return 'Embedder';
    }

    public function getVersion()
    {
        return '0.9.4';
    }

    public function getDeveloper()
    {
        return 'Pinkston Digital';
    }

    public function getDeveloperUrl()
    {
        return 'http://pinkstondigital.com';
    }

    public function hasCpSection()
    {
        return false;
    }

    function init() {

        // check we have a cp request as we don't want to this js to run anywhere but the cp
        // and while we're at it check for a logged in user as well
        if ( craft()->request->isCpRequest() && craft()->userSession->isLoggedIn() )
        {

            craft()->templates->includeJsResource('embedder/embedder.js');


        }

    }
}

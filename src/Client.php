<?php

namespace MichaelJ2324\GitHub;

use SugarAPI\SDK\Client\Abstracts\AbstractClient;

class Client extends AbstractClient
{
    protected $server = 'https://api.github.com/';

    protected $_endPoints = array(
        'repo' => "MichaelJ2324\\GitHub\\Endpoints\\Repository",
        'repository' => "MichaelJ2324\\GitHub\\Endpoints\\Repository",
        'getRelease' => "MichaelJ2324\\GitHub\\Endpoints\\GET\\Release",
        "repoReleases" => "MichaelJ2324\\GitHub\\Endpoints\\GET\\Releases",
        'downloadArchive' => "MichaelJ2324\\GitHub\\Endpoints\\GET\\DownloadArchive",
        'downloadAsset' => "MichaelJ2324\\GitHub\\Endpoints\\GET\\DownloadAsset"
    );

    public function __construct() {
        $this->setAPIUrl();
        foreach ($this->_endPoints as $func => $className) {
            $this->registerEndpoint($func, $className);
        }
    }

    public function __call($name, $params)
    {
        $Endpoint = parent::__call($name, $params);

        if ($Endpoint->authRequired()) {
            $Endpoint->setAuth($this->token);
        }
        return $Endpoint;
    }

    public function login()
    {
        return TRUE;
    }

    public function refreshToken()
    {
        return TRUE;
    }

}
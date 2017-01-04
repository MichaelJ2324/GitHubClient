<?php

namespace MichaelJ2324\GitHub\Endpoints\GET;

use MichaelJ2324\GitHub\Endpoints\BaseEndpoint;
use SugarAPI\SDK\Request\GET;
use SugarAPI\SDK\Response\JSON;

class Releases extends BaseEndpoint
{

    protected $_URL = 'repos/$owner/$repo/releases';

    public function __construct($url, array $options = array())
    {
        $this->setRequest(new GET());
        $this->setResponse(new JSON($this->Request->getCurlObject()));
        parent::__construct($url, $options);
    }

    public function latest()
    {
        $options = $this->Options;
        $options[] = 'latest';
        $Release = new Release($this->baseUrl, $options);
        $Release->setAuth($this->accessToken);
        return $Release;
    }

}
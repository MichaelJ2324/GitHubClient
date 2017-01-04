<?php

namespace MichaelJ2324\GitHub\Endpoints\GET;

use MichaelJ2324\GitHub\Endpoints\BaseEndpoint;
use SugarAPI\SDK\Request\GET;
use SugarAPI\SDK\Response\JSON;

class Release extends BaseEndpoint
{

    protected $_URL = 'repos/$owner/$repo/releases/$id';

    public function __construct($url, array $options = array())
    {
        $this->setRequest(new GET());
        $this->setResponse(new JSON($this->Request->getCurlObject()));
        parent::__construct($url, $options);
    }

}
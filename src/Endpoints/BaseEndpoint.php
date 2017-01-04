<?php

namespace MichaelJ2324\GitHub\Endpoints;

use SugarAPI\SDK\Endpoint\Abstracts\AbstractEndpoint;

class BaseEndpoint extends AbstractEndpoint
{

    protected function configureAuth()
    {
        if ($this->authRequired()) {
            $this->Request->addHeader('Authorization', 'token ' . $this->accessToken);
        }
    }

}
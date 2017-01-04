<?php

namespace MichaelJ2324\GitHub\Endpoints\GET;

use MichaelJ2324\GitHub\Endpoints\BaseEndpoint;
use SugarAPI\SDK\Request\GETFile;
use SugarAPI\SDK\Response\File as FileResponse;

class DownloadAsset extends BaseEndpoint
{

    protected $_URL = 'repos/$owner/$repo/releases/assets/$asset_id';

    protected $_AUTH_REQUIRED = FALSE;

    protected $downloadDir = null;

    public function __construct($url, array $options = array())
    {
        $this->setRequest(new GETFile());
        $this->setResponse(new FileResponse($this->Request->getCurlObject()));
        parent::__construct($url, $options);
    }

    public function execute($data = NULL)
    {
        if (!empty($data)) {
            if (file_exists($data)) {
                $this->downloadDir = $data;
            }
        }
        return parent::execute(NULL);
    }

    protected function configureRequest()
    {
        parent::configureRequest();
        $this->Request->addHeader('Accept', 'application/octet-stream');
        $this->Request->setOption(CURLOPT_FOLLOWLOCATION, TRUE);
    }

    protected function configureResponse()
    {
        $this->Response->setDestinationPath($this->downloadDir);
        parent::configureResponse();
    }

}
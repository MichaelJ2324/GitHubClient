<?php

namespace MichaelJ2324\GitHub\Endpoints;

use MichaelJ2324\GitHub\Endpoints\GET\DownloadArchive;
use MichaelJ2324\GitHub\Endpoints\GET\Releases;

class Repository extends BaseEndpoint
{

    protected $_URL = 'repos/$owner/$repo';

    public function download($reference, $archiveType = 'zipball')
    {
        $options = $this->Options;
        $options[] = $archiveType;
        $options[] = $reference;
        $Download = new DownloadArchive($this->baseUrl, $options);
        $Download->setAuth($this->accessToken);
        return $Download;
    }

    public function releases()
    {
        $options = $this->Options;
        $Releases = new Releases($this->baseUrl, $options);
        $Releases->setAuth($this->accessToken);
        return $Releases;
    }

}
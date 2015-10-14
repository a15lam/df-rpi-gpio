<?php

namespace DreamFactory\Core\RpiGPIO\Resources;

use DreamFactory\Core\Resources\BaseRestResource;
use DreamFactory\Core\RpiGPIO\Components\GPIO;
use DreamFactory\Core\Exceptions\BadRequestException;
use DreamFactory\Core\Utility\ResourcesWrapper;

class GpioWrite extends BaseRestResource
{
    const RESOURCE_NAME = 'write';

    protected function handleGET()
    {
        return false;
    }

    protected function handlePOST()
    {
        $pin = $this->request->getPayloadData('pin');
        $state = $this->request->getPayloadData('state');

        if((empty($pin) && $pin !== 0) || (empty($state) && $state !== 0)){
            throw new BadRequestException('No pin or state information provided.');
        }

        $gpio = new GPIO();
        return ResourcesWrapper::cleanResources($gpio->write($pin, $state));
    }
}
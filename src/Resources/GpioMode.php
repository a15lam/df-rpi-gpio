<?php
namespace DreamFactory\Core\RpiGPIO\Resources;

use DreamFactory\Core\Exceptions\BadRequestException;
use DreamFactory\Core\Resources\BaseRestResource;
use DreamFactory\Core\RpiGPIO\Components\GPIO;
use DreamFactory\Core\Utility\ResourcesWrapper;

class GpioMode extends BaseRestResource
{
    const RESOURCE_NAME = 'mode';

    protected function handleGET()
    {
        return false;
    }

    protected function handlePOST()
    {
        $pin = $this->request->getPayloadData('pin');
        $state = $this->request->getPayloadData('state');

        if((empty($pin) && $pin !== 0) || empty($state)){
            throw new BadRequestException('No pin or state information provided.');
        }

        $gpio = new GPIO();
        return ResourcesWrapper::cleanResources($gpio->mode($pin, $state));
    }
}
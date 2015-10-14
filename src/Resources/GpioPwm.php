<?php

namespace DreamFactory\Core\RpiGPIO\Resources;

use DreamFactory\Core\Resources\BaseRestResource;
use DreamFactory\Core\RpiGPIO\Components\GPIO;
use DreamFactory\Core\Exceptions\BadRequestException;
use DreamFactory\Core\Utility\ResourcesWrapper;

class GpioPwm extends BaseRestResource
{
    const RESOURCE_NAME = 'pwm';

    protected function handleGET()
    {
        return false;
    }

    protected function handlePOST()
    {
        $pulse = $this->request->getPayloadData('pulse');

        if(empty($pulse)){
            throw new BadRequestException('No pulse provided.');
        }

        if($pulse < 27) $pulse = 27;
        if($pulse > 107) $pulse = 107;

        $gpio = new GPIO();
        $gpio->setupPWM();
        return ResourcesWrapper::cleanResources($gpio->pwm($pulse));
    }

}
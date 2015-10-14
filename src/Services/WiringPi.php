<?php
namespace DreamFactory\Core\RpiGPIO\Services;

use DreamFactory\Core\RpiGPIO\Resources\GpioMode;
use DreamFactory\Core\RpiGPIO\Resources\GpioPwm;
use DreamFactory\Core\RpiGPIO\Resources\GpioWrite;
use DreamFactory\Core\Services\BaseRestService;

class WiringPi extends BaseRestService
{
    const SERVICE_TYPE_GROUP = 'gpio';

    protected $resources = [
        GpioMode::RESOURCE_NAME  => [
            'name'       => GpioMode::RESOURCE_NAME,
            'class_name' => GpioMode::class,
            'label'      => 'Mode'
        ],
        GpioWrite::RESOURCE_NAME => [
            'name'       => GpioWrite::RESOURCE_NAME,
            'class_name' => GpioWrite::class,
            'label'      => 'Write'
        ],
        GpioPwm::RESOURCE_NAME   => [
            'name'       => GpioPwm::RESOURCE_NAME,
            'class_name' => GpioPwm::class,
            'label'      => 'PWM'
        ]
    ];

    public function getResources($only_handlers = false)
    {
        return ($only_handlers) ? $this->resources : array_values($this->resources);
    }
}
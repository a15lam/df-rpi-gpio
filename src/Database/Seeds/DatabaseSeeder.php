<?php
namespace DreamFactory\Core\RpiGPIO\Database\Seeds;

use DreamFactory\Core\Database\Seeds\BaseModelSeeder;
use DreamFactory\Core\Models\ServiceType;
use DreamFactory\Core\RpiGPIO\Models\RpiGpioConfig;
use DreamFactory\Core\RpiGPIO\Services\WiringPi;

class DatabaseSeeder extends BaseModelSeeder
{
    protected $modelClass = ServiceType::class;

    protected $records = [
        [
            'name'           => 'rpi_wiringpi',
            'class_name'     => WiringPi::class,
            'config_handler' => RpiGpioConfig::class,
            'label'          => 'Raspberry Pi GPIO service',
            'description'    => 'Raspberry Pi GPIO service using wiringPi program.',
            'group'          => WiringPi::SERVICE_TYPE_GROUP,
            'singleton'      => false
        ]
    ];
}
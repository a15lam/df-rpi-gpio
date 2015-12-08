<?php
namespace DreamFactory\Core\RpiGPIO\Models;

use DreamFactory\Core\Models\BaseServiceConfigModel;

class RpiGpioConfig extends BaseServiceConfigModel
{
    protected $table = 'rpi_gpio_config';

    protected $fillable = ['config'];
    
    protected $timestamp = false;
}

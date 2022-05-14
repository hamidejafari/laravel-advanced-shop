<?php

namespace Classes;

use Larabookir\Gateway\Asanpardakht\Asanpardakht;
use Larabookir\Gateway\Enum;
use Larabookir\Gateway\Exceptions\PortNotFoundException;
use Larabookir\Gateway\GatewayResolver;
use Larabookir\Gateway\Mellat\Mellat;
use Larabookir\Gateway\Parsian\Parsian;
use Larabookir\Gateway\Payir\Payir;
use Larabookir\Gateway\Paypal\Paypal;
use Larabookir\Gateway\Sadad\Sadad;
use Larabookir\Gateway\Saman\Saman;
use Larabookir\Gateway\Zarinpal\Zarinpal;

class Gateway extends GatewayResolver
{
    /**
     * Create new object from port class
     *
     * @param mixed $port
     * @return $this
     * @throws PortNotFoundException
     */
    function make($port)
    {
        if ($port InstanceOf Mellat) {
            $name = Enum::MELLAT;
        } elseif ($port InstanceOf Parsian) {
            $name = Enum::PARSIAN;
        } elseif ($port InstanceOf PASARGAD ) {// در این قسمت کلاسی که بالاتر ایجاد کردید رو بزارید
            $name = Enum::PASARGAD;
        } elseif ($port InstanceOf Saman) {
            $name = Enum::SAMAN;
        } elseif ($port InstanceOf Zarinpal) {
            $name = Enum::ZARINPAL;
        } elseif ($port InstanceOf Sadad) {
            $name = Enum::SADAD;
        } elseif ($port InstanceOf Asanpardakht) {
            $name = Enum::ASANPARDAKHT;
        } elseif ($port InstanceOf Paypal) {
            $name = Enum::PAYPAL;
        } elseif ($port InstanceOf Payir) {
            $name = Enum::PAYIR;
        }  elseif(in_array(strtoupper($port),$this->getSupportedPorts())){
            $port=ucfirst(strtolower($port));
            $name=strtoupper($port);
            $class=__NAMESPACE__.'\\'.$port.'\\'.$port;
            $port=new $class;
        } else
            throw new PortNotFoundException;

        $this->port = $port;
        $this->port->setConfig($this->config); // injects config
        $this->port->setPortName($name); // injects config
        $this->port->boot();

        return $this;
    }
}


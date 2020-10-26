<?php

require_once "vendor/autoload.php";

use FlyingLuscas\ViaCEP\ViaCEP;

$viacep = new ViaCEP;

$address = $viacep->findByZipCode('19400-000');

echo($address->toJson());

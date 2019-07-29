<?php

use App\Entity\AdPets;

$adpet = new AdPets();
$idadd = $adpet->getId();
echo 'El id es '.$idadd;

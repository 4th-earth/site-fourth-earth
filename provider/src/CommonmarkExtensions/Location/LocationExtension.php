<?php

namespace FourthEarth\Site\CommonmarkExtras\Location;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use FourthEarth\Site\CommonmarkExtras\Location\Location;
use FourthEarth\Site\CommonmarkExtras\Location\LocationParser;
use FourthEarth\Site\CommonmarkExtras\Location\LocationRenderer;

class LocationExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new LocationParser(), 1);
        $environment->addBlockRenderer(Location::class, new LocationRenderer());
    }
}

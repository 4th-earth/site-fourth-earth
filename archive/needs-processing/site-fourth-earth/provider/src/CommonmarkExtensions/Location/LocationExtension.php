<?php

namespace FourthEarth\Site\CommonmarkExtensions\Location;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use FourthEarth\Site\CommonmarkExtensions\Location\Location;
use FourthEarth\Site\CommonmarkExtensions\Location\LocationParser;
use FourthEarth\Site\CommonmarkExtensions\Location\LocationRenderer;

class LocationExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new LocationParser(), 1);
        $environment->addBlockRenderer(Location::class, new LocationRenderer());
    }
}

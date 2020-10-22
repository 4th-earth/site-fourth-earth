<?php

namespace FourthEarth\Site\CommonmarkExtensions\Narration;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use FourthEarth\Site\CommonmarkExtensions\Narration\Narration;
use FourthEarth\Site\CommonmarkExtensions\Narration\NarrationParser;
use FourthEarth\Site\CommonmarkExtensions\Narration\NarrationRenderer;

class NarrationExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new NarrationParser(), 1);
        $environment->addBlockRenderer(Narration::class, new NarrationRenderer());
    }
}

<?php

namespace FourthEarth\Site\CommonmarkExtras\Narration;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use FourthEarth\Site\CommonmarkExtras\Narration\Narration;
use FourthEarth\Site\CommonmarkExtras\Narration\NarrationParser;
use FourthEarth\Site\CommonmarkExtras\Narration\NarrationRenderer;

class NarrationExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new NarrationParser(), 1);
        $environment->addBlockRenderer(Narration::class, new NarrationRenderer());
    }
}

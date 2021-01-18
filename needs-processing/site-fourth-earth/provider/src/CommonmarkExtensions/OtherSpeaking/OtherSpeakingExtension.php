<?php

namespace FourthEarth\Site\CommonmarkExtensions\OtherSpeaking;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use FourthEarth\Site\CommonmarkExtensions\OtherSpeaking\OtherSpeaking;
use FourthEarth\Site\CommonmarkExtensions\OtherSpeaking\OtherSpeakingParser;
use FourthEarth\Site\CommonmarkExtensions\OtherSpeaking\OtherSpeakingRenderer;

class OtherSpeakingExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new OtherSpeakingParser(), 1);
        $environment->addBlockRenderer(OtherSpeaking::class, new OtherSpeakingRenderer());
    }
}

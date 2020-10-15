<?php

namespace FourthEarth\Site\CommonmarkExtras\OtherSpeaking;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use FourthEarth\Site\CommonmarkExtras\OtherSpeaking\OtherSpeaking;
use FourthEarth\Site\CommonmarkExtras\OtherSpeaking\OtherSpeakingParser;
use FourthEarth\Site\CommonmarkExtras\OtherSpeaking\OtherSpeakingRenderer;

class OtherSpeakingExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new OtherSpeakingParser(), 1);
        $environment->addBlockRenderer(OtherSpeaking::class, new OtherSpeakingRenderer());
    }
}

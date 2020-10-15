<?php

namespace FourthEarth\Site\CommonmarkExtras\SelfSpeaking;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use FourthEarth\Site\CommonmarkExtras\SelfSpeaking\SelfSpeaking;
use FourthEarth\Site\CommonmarkExtras\SelfSpeaking\SelfSpeakingParser;
use FourthEarth\Site\CommonmarkExtras\SelfSpeaking\SelfSpeakingRenderer;

class SelfSpeakingExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new SelfSpeakingParser(), 100);
        $environment->addBlockRenderer(SelfSpeaking::class, new SelfSpeakingRenderer());
    }
}

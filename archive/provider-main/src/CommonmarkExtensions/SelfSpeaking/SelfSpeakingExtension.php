<?php

namespace FourthEarth\Site\CommonmarkExtensions\SelfSpeaking;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use FourthEarth\Site\CommonmarkExtensions\SelfSpeaking\SelfSpeaking;
use FourthEarth\Site\CommonmarkExtensions\SelfSpeaking\SelfSpeakingParser;
use FourthEarth\Site\CommonmarkExtensions\SelfSpeaking\SelfSpeakingRenderer;

class SelfSpeakingExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new SelfSpeakingParser(), 100);
        $environment->addBlockRenderer(SelfSpeaking::class, new SelfSpeakingRenderer());
    }
}

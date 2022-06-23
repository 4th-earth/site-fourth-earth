<?php

namespace FourthEarth\Site\CommonmarkExtensions\OtherWhispering;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use Eightfold\CommonmarkExtensions\Accordion;
use Eightfold\CommonmarkExtensions\AccordionParser;
use Eightfold\CommonmarkExtensions\AccordionRenderer;

class OtherWhisperingExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new OtherWhisperingParser(), 1);
        $environment->addBlockRenderer(OtherWhispering::class, new OtherWhisperingRenderer());
    }
}

<?php

namespace FourthEarth\Site\CommonmarkExtensions\Command;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use Eightfold\CommonmarkExtensions\Accordion;
use Eightfold\CommonmarkExtensions\AccordionParser;
use Eightfold\CommonmarkExtensions\AccordionRenderer;

class AccordionExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new AccordionParser(), 1);
        $environment->addBlockRenderer(Accordion::class, new AccordionRenderer());
    }
}

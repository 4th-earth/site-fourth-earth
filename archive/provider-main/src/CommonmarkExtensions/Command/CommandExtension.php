<?php

namespace FourthEarth\Site\CommonmarkExtensions\Command;

use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\ConfigurableEnvironmentInterface;

use FourthEarth\Site\CommonmarkExtensions\Accordion;
use FourthEarth\Site\CommonmarkExtensions\AccordionParser;
use FourthEarth\Site\CommonmarkExtensions\AccordionRenderer;

class CommandExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addBlockParser(new CommandParser(), 1);
        $environment->addBlockRenderer(Command::class, new CommandRenderer());
    }
}

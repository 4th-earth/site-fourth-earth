<?php

namespace FourthEarth\Site\CommonmarkExtras\Narration;

use League\CommonMark\Block\Parser\BlockParserInterface;
use League\CommonMark\ContextInterface;
use League\CommonMark\Cursor;

use FourthEarth\Site\CommonmarkExtras\Narration\Narration;

class NarrationParser implements BlockParserInterface
{
    public function parse(ContextInterface $context, Cursor $cursor): bool
    {
        $c = $cursor->getCharacter();
        $cPlus = $cursor->peek();
        if ($c !== "|" and $cPlus !== "|") {
            return false;
        }

        $startRegex = "/^\|\| #{2,6} [[:print:]]+/";
        $start = $cursor->match($startRegex);
        if (empty($start)) {
            return false;
        }

        $block = new Narration($context, $cursor);
        $context->addBlock($block);
        return true;
    }
}

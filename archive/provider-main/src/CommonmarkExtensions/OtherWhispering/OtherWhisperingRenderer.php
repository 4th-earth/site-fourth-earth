<?php

namespace FourthEarth\Site\CommonmarkExtensions\OtherWhispering;

use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Renderer\BlockRendererInterface;

class OtherWhisperingRenderer implements BlockRendererInterface
{
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, bool $inTightList = false)
    {
        if (! ($block instanceof OtherWhispering)) {
            throw new \InvalidArgumentException('Incompatible block type: ' . get_class($block));
        }
        return $block->element($htmlRenderer);
    }
}

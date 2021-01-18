<?php

namespace FourthEarth\Site\CommonmarkExtensions\Location;

use League\CommonMark\ContextInterface;
use League\CommonMark\Cursor;
use League\CommonMark\Environment;

use League\CommonMark\Renderer\Block\BlockRendererInterface;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;
use League\CommonMark\Block\Element\AbstractBlock;

/**
 * [[ ## Location name
 * Location description.
 * ]]
 */
class Location extends AbstractBlock
{
    private $context;

    private $headerElement = 2;
    private $headerContent = "";

    private $accordionId = "";

    public function __construct(
        ContextInterface $context,
        Cursor $cursor
    )
    {
        $this->context = $context;
        $this->setStartLine($this->context->getLineNumber());
        $this->setLastLineBlank(true);

        $preHeader = substr($cursor->getLine(), 3);
        list($element, $content) = explode(" ", $preHeader, 2);

        $this->headerContent = $content;
        $this->headerElement = "h". strlen($element);
    }

    public function element(ElementRendererInterface $htmlRenderer)
    {
        $hElem    = $this->headerElement;
        $hContent = $this->headerContent;
        $h        = '<'. $hElem .'>'. $hContent .'</'. $hElem .'>';

        $pContent = $htmlRenderer->renderBlocks($this->children());
        $div      = '<div>'. $h . $pContent .'</div>';

        return '<section is="location">'. $div .'</section>';
    }

    public function canContain(AbstractBlock $block): bool
    {
        // Can't have child accordion
        return ! $block instanceof Location;
    }

    public function isCode(): bool
    {
        return false;
    }

    public function matchesNextLine(Cursor $cursor): bool
    {
        // block closer
        $endContainerRegex = "/^\[\[/";
        $containerEnd = $cursor->match($endContainerRegex);
        if (empty($containerEnd)) {
            return true;
        }
        return false;
    }
}

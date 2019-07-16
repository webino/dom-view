<?php

namespace Webino;

use DOMAttr;
use DOMDocument;
use DOMElement;
use DOMText;
use const LIBXML_COMPACT;
use const LIBXML_NOERROR;
use const LIBXML_NOWARNING;

/**
 * Class ViewDocument
 * @package dom-view
 */
class ViewDocument extends DOMDocument implements ViewDocumentInterface
{
    /**
     * @var ViewQuery
     */
    protected $xpath;

    /**
     * @param string $html
     */
    public function __construct(string $html)
    {
        parent::__construct();

        $this->registerNodeClass(DOMElement::class, ViewElement::class);
        $this->registerNodeClass(DOMText::class, ViewText::class);
        $this->registerNodeClass(DOMAttr::class, ViewAttribute::class);

        $markup = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $this->loadHTML($markup, LIBXML_NOERROR | LIBXML_NOWARNING | LIBXML_COMPACT);
        $this->xpath = new ViewQuery($this);
    }

    /**
     * @param string $xpath
     * @param ViewNode|null $node
     * @return iterable
     */
    public function query(string $xpath, ViewNode $node = null): iterable
    {
        return $this->xpath->query($xpath, $node);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->saveHTML();
    }
}

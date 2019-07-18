<?php
/**
 * Webino™ (http://webino.sk)
 *
 * @link        https://github.com/webino/dom-view
 * @copyright   Copyright (c) 2019 Webino, s.r.o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     BSD-3-Clause
 */

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
     * @param ViewElement|null $node
     * @return iterable
     */
    public function query(string $xpath, ViewElement $node = null): iterable
    {
        return $this->xpath->query($xpath, $node);
    }

    /**
     * @param string $xpath
     * @param ViewElement|null $node
     * @return ViewElement
     */
    public function queryNode(string $xpath, ViewElement $node = null): ViewElement
    {
        // TODO
        return $this->xpath->query($xpath, $node)->item(0);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->saveHTML();
    }
}

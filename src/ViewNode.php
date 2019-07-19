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

use DOMElement;
use DOMDocument;
use DOMNode;

/**
 * Class ViewNode
 *
 * @noinspection PhpSuperClassIncompatibleWithInterfaceInspection
 * @package dom-view
 */
class ViewNode extends DOMElement implements ViewNodeInterface
{
    /**
     * Creates new view node.
     *
     * @param string $name Node name.
     * @param string|null $value Node value.
     * @return ViewNodeInterface New node.
     */
    public function createNode(string $name, string $value = null): ViewNodeInterface
    {
        /** @var ViewNodeInterface $node */
        $node = $this->ownerDocument->createElement($name, (string)$value);
        return $node;
    }

    /**
     * Append html.
     *
     * @param string $html
     * @return void
     */
    public function appendHtml(string $html): void
    {
        $errors = libxml_use_internal_errors();
        libxml_use_internal_errors(true);

        // from fragment
        $frag = $this->ownerDocument->createDocumentFragment();
        $frag->appendXml($html);
        if ($frag->hasChildNodes()) {
            $this->appendChild($frag);
            libxml_use_internal_errors($errors);
            return;
        }

        // from document fallback
        $dom = new DOMDocument;
        $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $node = $dom->documentElement;

        if ($node instanceof DOMNode) {
            $elm = $this->ownerDocument->importNode($node, true);
            $this->appendChild($elm);
        }

        libxml_use_internal_errors($errors);
    }

    /**
     * Replaces node with self.
     *
     * @param ViewNodeInterface $node Node to replace.
     * @return void
     */
    public function replace(ViewNodeInterface $node): void
    {
        $node->parentNode->replaceChild($this, $node);
    }
}

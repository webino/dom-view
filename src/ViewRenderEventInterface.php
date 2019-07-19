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

/**
 * Interface ViewRenderEventInterface
 * @package dom-view
 */
interface ViewRenderEventInterface extends
    EventInterface,
    AppAwareInterface,
    RequestAwareInterface,
    HttpRequestAwareInterface
{
    /**
     * Returns layout HTML.
     *
     * @return string
     */
    public function getLayout(): string;

    /**
     * Set layout HTML.
     *
     * @param string $html
     */
    public function setLayout(string $html): void;

    /**
     * Returns view node to render.
     *
     * @return ViewElement
     */
    public function getNode(): ViewElement;

    /**
     * Set node to render.
     *
     * @param ViewElement $node
     */
    public function setNode(ViewElement $node): void;
}

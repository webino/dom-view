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
    HttpRequestAwareInterface,
    ViewRouteAwareInterface
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
     * Returns content HTML.
     *
     * @return string
     */
    public function getContent(): string;

    /**
     * Set content HTML.
     *
     * @param string $html
     */
    public function setContent(string $html): void;

    /**
     * Returns view node to render.
     *
     * @return ViewNode
     */
    public function getNode(): ViewNode;

    /**
     * Set node to render.
     *
     * @param ViewNode $node
     */
    public function setNode(ViewNode $node): void;
}

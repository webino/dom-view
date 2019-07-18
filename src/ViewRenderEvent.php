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
 * Class ViewRenderEvent
 * @package dom-view
 */
class ViewRenderEvent extends Event implements ViewRenderEventInterface
{
    /**
     * Returns view node to render.
     *
     * @return ViewElement
     */
    public function getNode(): ViewElement
    {
        return $this['node'] ?? null;
    }

    /**
     * @param ViewElement $node
     */
    public function setNode(ViewElement $node): void
    {
        $this['node']  = $node;
    }
}

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
interface ViewRenderEventInterface
{
    /**
     * Returns view node to render.
     *
     * @return ViewNodeInterface
     */
    public function getNode(): ViewNodeInterface;
}

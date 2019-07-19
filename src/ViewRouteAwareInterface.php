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
 * Interface ViewRouteAwareInterface
 * @package dom-view
 */
interface ViewRouteAwareInterface
{
    /**
     * Returns route.
     *
     * @return ViewRouteInterface
     */
    public function getRoute(): ViewRouteInterface;

    /**
     * Set route.
     *
     * @param ViewRouteInterface $route
     */
    public function setRoute(ViewRouteInterface $route): void;
}

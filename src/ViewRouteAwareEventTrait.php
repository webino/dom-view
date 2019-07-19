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
 * Trait ViewRouteAwareEventTrait
 * @package dom-view
 */
trait ViewRouteAwareEventTrait
{
    /**
     * Returns route.
     *
     * @return ViewRouteInterface
     */
    public function getRoute(): ViewRouteInterface
    {
        if (empty($this['route'])) {
            throw new NoViewRouteException;
        }
        return $this['route'];
    }

    /**
     * @param ViewRouteInterface $route
     */
    public function setRoute(ViewRouteInterface $route): void
    {
        $this['route'] = $route;
    }
}

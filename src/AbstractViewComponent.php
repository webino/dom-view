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
 * Interface ViewComponentInterface
 * @package dom-view
 */
abstract class AbstractViewComponent implements
    InstanceFactoryMethodInterface,
    ViewComponentInterface,
    EventEmitterInterface
{
    use EventEmitterTrait;

    /**
     * @param CreateInstanceEventInterface $event
     * @return AbstractViewComponent
     */
    public static function create(CreateInstanceEventInterface $event)
    {
        $component = new static;
        $component->on(ViewRenderEvent::class, [$component, 'onRender']);
        return $component;
    }

    abstract public function onRender(ViewRenderEventInterface $event);
}

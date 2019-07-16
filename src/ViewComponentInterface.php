<?php

namespace Webino;

/**
 * Interface ViewComponentInterface
 * @package dom-view
 */
interface ViewComponentInterface
{
    public function onRender(\DOMNode $node);
}

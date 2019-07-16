<?php

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

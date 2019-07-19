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
    use AppAwareEventTrait;
    use RequestAwareEventTrait;
    use HttpRequestAwareEventTrait;
    use ViewRouteAwareEventTrait;

    /**
     * Returns layout HTML.
     *
     * @return string
     */
    public function getLayout(): string
    {
        return $this['layout'] ?? '';
    }

    /**
     * Set layout HTML.
     *
     * @param string $html
     * @return void
     */
    public function setLayout(string $html): void
    {
        $this['layout'] = $html;
    }

    /**
     * Returns content HTML.
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this['content'] ?? '';
    }

    /**
     * Set content HTML.
     *
     * @param string $html
     * @return void
     */
    public function setContent(string $html): void
    {
        $this['content'] = $html;
    }

    /**
     * Returns view node to render.
     *
     * @return ViewNode
     */
    public function getNode(): ViewNode
    {
        if (empty($this['node'])) {
            throw new NoViewNodeException;
        }
        return $this['node'];
    }

    /**
     * @param ViewNode $node
     * @return void
     */
    public function setNode(ViewNode $node): void
    {
        $this['node']  = $node;
    }
}

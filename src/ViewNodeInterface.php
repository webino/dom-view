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
 * Interface ViewNodeInterface
 * @package dom-view
 *
 * @property string $nodeValue
 * @property ViewNodeInterface $parentNode
 * @method ViewNodeInterface replaceChild(ViewNodeInterface $newNode, ViewNodeInterface $oldNode)
 */
interface ViewNodeInterface
{
    /**
     * Creates new view node.
     *
     * @param string $name Node name.
     * @param string|null $value Node value.
     * @return ViewNodeInterface New node.
     */
    public function createNode(string $name, string $value = null): ViewNodeInterface;

    /**
     * Append html.
     *
     * @param string $html
     * @return void
     */
    public function appendHtml(string $html): void;

    /**
     * Replaces node with self.
     *
     * @param ViewNodeInterface $node Node to replace.
     * @return void
     */
    public function replace(ViewNodeInterface $node): void;
}

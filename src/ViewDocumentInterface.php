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
 * Class ViewDocumentInterface
 * @package dom-view
 */
interface ViewDocumentInterface
{
    /**
     * @param string $xpath
     * @param ViewElement|null $node
     * @return iterable
     */
    public function query(string $xpath, ViewElement $node = null): iterable;

    /**
     * @return string
     */
    public function __toString();
}

<?php

namespace Webino;

/**
 * Class ViewDocumentInterface
 * @package dom-view
 */
interface ViewDocumentInterface
{
    /**
     * @param string $xpath
     * @param ViewNode|null $node
     * @return iterable
     */
    public function query(string $xpath, ViewNode $node = null): iterable;

    /**
     * @return string
     */
    public function __toString();
}

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
     * @param ViewElement|null $node
     * @return iterable
     */
    public function query(string $xpath, ViewElement $node = null): iterable;

    /**
     * @return string
     */
    public function __toString();
}

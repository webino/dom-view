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

use ArrayObject;

/**
 * Class ViewComponents
 * @package dom-view
 */
class ViewComponents extends ArrayObject implements ViewComponentMapInterface
{
    /**
     * @param iterable $options
     */
    public function __construct(iterable $options)
    {
        parent::__construct();

        foreach ($options as $key => $value) {

            if (is_string($value) && class_exists($value)
                && !empty(class_implements($value)[ViewComponentInterface::class])
            ) {
                $xpath = '//' . constant("$value::NAME");
                $this[$xpath] = $value;
            }
        }
    }
}

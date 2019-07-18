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
 * Class DomView
 * @package dom-view
 */
class DomView implements InstanceFactoryMethodInterface
{
    /**
     * @var InstanceContainerInterface
     */
    private $container;

    /**
     * @var string
     */
    private $title = '';

    /**
     * @param CreateInstanceEventInterface $event
     * @return DomView
     */
    public static function create(CreateInstanceEventInterface $event): DomView
    {
        $container = $event->getContainer();
        return new static($container);
    }

    /**
     * @param InstanceContainerInterface $container
     */
    public function __construct(InstanceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $html
     * @return string
     */
    public function render(string $html): string
    {
        // TODO
        $xpaths = [
            TestSubComponent::XPATH => TestSubComponent::class,
            TestComponent::XPATH => TestComponent::class,
        ];

        $dom = new ViewDocument($html);

        if ($titleNode = $dom->queryNode('/html/head/title')) {
            $titleNode->nodeValue = $this->title;
        }

        $render = true;
        while ($render) {
            foreach ($xpaths as $xpathExpr => $componentClass) {

                /** @var ViewComponentInterface $component */
                $component = $this->container->get($componentClass);

                $nodes = $dom->query($xpathExpr);
                $render = !empty($nodes->length);

                foreach ($nodes as $node) {
                    // TODO event
                    $component->onRender($node);
                }
            }
        }

        return (string)$dom;
    }
}

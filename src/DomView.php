<?php

namespace Webino;

use DOMDocument;
use DOMXPath;

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

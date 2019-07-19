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
     * @var ViewComponentMapInterface
     */
    private $components;

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
        $params = $event->getParameters();
        return new static($container, ...$params);
    }

    /**
     * @param InstanceContainerInterface $container
     * @param ViewComponents $components
     */
    public function __construct(InstanceContainerInterface $container, ViewComponents $components)
    {
        $this->container = $container;
        $this->components = $components;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param ViewDocumentInterface $dom
     * @return void
     */
    protected function renderTitle(ViewDocumentInterface $dom): void
    {
        /** @var ViewElement $titleNode */
        if ($titleNode = $dom->queryNode('/html/head/title')) {
            $titleNode->nodeValue = $this->title;
        }
    }

    /**
     * @param ViewRenderEventInterface $event
     * @return string
     */
    public function render(ViewRenderEventInterface $event): string
    {
        $html = $event->getLayout();
        $dom = $this->container->make(ViewDocumentInterface::class, $html);

        $this->renderTitle($dom);
        $eventPrototype = $event;

        /** @var EventEmitterInterface $target */
        $target = $this->container;

        $render = true;
        while ($render) {
            foreach ($this->components as $xpathExpr => $componentClass) {
                /** @var EventEmitterInterface $component */
                $component = $this->container->make($componentClass);

                $nodes = $dom->query($xpathExpr);
                $render = !empty($nodes->length);

                foreach ($nodes as $node) {
                    $event = clone $eventPrototype;
                    $event->setNode($node);
                    $component->emit($event, null, $target);
                }
            }
        }

        return (string)$dom;
    }
}

<?php
/**
 * Webino™ (http://webino.sk)
 *
 * @noinspection PhpUnhandledExceptionInspection
 * @interpreder php
 * @outputmatchfile DomView.expected.html
 *
 * @link        https://github.com/webino/dom-view
 * @copyright   Copyright (c) 2019 Webino, s.r.o. (http://webino.sk)
 * @author      Peter Bačinský <peter@bacinsky.sk>
 * @license     BSD-3-Clause
 */

namespace Webino;

use Tester\Environment;

class TestComponent extends AbstractViewComponent
{
    public const NAME = 'component';

    public function onRender(ViewRenderEventInterface $event)
    {
        $node = $event->getNode();
        $newNode = $node->ownerDocument->createElement('div');
        //$newNode->nodeValue = 'Hello';

        $newSubNode = $node->ownerDocument->createElement(TestSubComponent::NAME);
        $newNode->appendChild($newSubNode);

        $node->parentNode->replaceChild($newNode, $node);
    }
}

class TestSubComponent extends AbstractViewComponent
{
    public const NAME = 'sub-component';

    public function onRender(ViewRenderEventInterface $event)
    {
        $node = $event->getNode();
        $newNode = $node->ownerDocument->createElement('button');
        $newNode->nodeValue = 'Click Me!';
        $node->parentNode->replaceChild($newNode, $node);
    }
}

Environment::setup();

$html = file_get_contents(__DIR__ . '/DomView.html');

$container = new InstanceContainer;

$components = new ViewComponents([
    TestSubComponent::class,
    TestComponent::class,
]);

/** @var DomView $view */
$view = $container->make(DomView::class, $components);

$view->setTitle('Hello Webino');

echo $view->render($html);

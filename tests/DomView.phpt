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

class TestComponent
{
    public const XPATH = '//component';

    public function onRender(ViewElement $node)
    {
        $newNode = $node->ownerDocument->createElement('div');
        //$newNode->nodeValue = 'Hello';

        $newSubNode = $node->ownerDocument->createElement(TestSubComponent::NAME);
        $newNode->appendChild($newSubNode);

        $node->parentNode->replaceChild($newNode, $node);
    }
}

class TestSubComponent
{
    public const NAME = 'sub-component';

    public const XPATH = '//sub-component';

    public function onRender(ViewElement $node)
    {
        $newNode = $node->ownerDocument->createElement('button');
        $newNode->nodeValue = 'Click Me!';
        $node->parentNode->replaceChild($newNode, $node);
    }
}

Environment::setup();

$html = file_get_contents(__DIR__ . '/DomView.html');

$container = new InstanceContainer;

/** @var DomView $view */
$view = $container->get(DomView::class);

$view->setTitle('Hello Webino');

echo $view->render($html);

<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Ordinary9843\Traits\XmlTrait;
use SimpleXMLElement;

class XmlTraitTest extends TestCase
{
    use XmlTrait;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return void
     */
    public function testCreateXml(): void
    {
        $this->assertInstanceOf(SimpleXMLElement::class, $this->createXml('1.0', 'UTF-8'));
    }

    /**
     * @return void
     */
    public function testCreateElement(): void
    {
        $this->assertEquals('<root/>', $this->createElement('root'));
        $this->assertEquals('<root/>', $this->createElement('<root/>'));
        $this->assertEquals('<root/>', $this->createElement('<root/>/>'));
        $this->assertEquals('<root/>', $this->createElement('root/>'));
        $this->assertEquals('<root_test/>', $this->createElement('root test'));
        $this->assertEquals('<root_test/>', $this->createElement('root_test'));
        $this->assertEquals('<root_test/>', $this->createElement('<root_test>'));
        $this->assertEquals('<root_test/>', $this->createElement('<root_test/>'));
    }

    /**
     * @return void
     */
    public function testNormalizeItemName(): void
    {
        $this->assertEquals('item', $this->normalizeItemName('0', 'item'));
        $this->assertEquals('test', $this->normalizeItemName('1', 'test'));
        $this->assertEquals('test_item', $this->normalizeItemName('test item', 'item'));
        $this->assertEquals('test_item', $this->normalizeItemName('test_item', 'item'));
    }
}

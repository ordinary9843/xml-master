<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Ordinary9843\Constants\XmlMasterConstant;
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
    public function testShouldEqualsWhenGetVersion(): void
    {
        $this->setVersion(XmlMasterConstant::XML_VERSION);
        $this->assertEquals(XmlMasterConstant::XML_VERSION, $this->getVersion());
    }

    /**
     * @return void
     */
    public function testShouldEqualsWhenGetEncoding(): void
    {
        $this->setEncoding(XmlMasterConstant::XML_ENCODING);
        $this->assertEquals(XmlMasterConstant::XML_ENCODING, $this->getEncoding());
    }

    /**
     * @return void
     */
    public function testShouldInstanceOfWhenCreateXml(): void
    {
        $this->assertInstanceOf(SimpleXMLElement::class, $this->createXml(XmlMasterConstant::XML_VERSION, XmlMasterConstant::XML_ENCODING));
    }

    /**
     * @return void
     */
    public function testShouldEqualsWhenCreateElement(): void
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
    public function testShouldEqualsWhenNormalizeItemName(): void
    {
        $this->assertEquals('item', $this->normalizeItemName('0'));
        $this->assertEquals('item', $this->normalizeItemName('1'));
        $this->assertEquals('test_item', $this->normalizeItemName('test item'));
        $this->assertEquals('test_item', $this->normalizeItemName('test_item'));
    }
}

<?php

namespace Ordinary9843\Traits;

use Ordinary9843\Constants\XmlMasterConstant;
use SimpleXMLElement;

trait XmlTrait
{
    /** @var string */
    private $version = XmlMasterConstant::XML_VERSION;

    /** @var string */
    private $encoding = XmlMasterConstant::XML_ENCODING;

    /**
     * @param string $version
     * 
     * @return void
     */
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $encoding
     * 
     * @return void
     */
    public function setEncoding(string $encoding): void
    {
        $this->encoding = $encoding;
    }

    /**
     * @return string
     */
    public function getEncoding(): string
    {
        return $this->encoding;
    }

    /**
     * @param string $version
     * @param string $encoding
     * @param string $element
     * 
     * @return SimpleXMLElement
     */
    public function createXml(string $version, string $encoding, string $element = null): SimpleXMLElement
    {
        ($element === null) && $element = 'root';

        return new SimpleXMLElement('<?xml version="' . $version . '" encoding="' . $encoding . '"?>' . $this->createElement($element));
    }

    /**
     * @param string $element
     * 
     * @return string
     */
    public function createElement(string $element): string
    {
        return '<' . preg_replace(['/\s+/', "/[^A-Za-z0-9_]/"], ['_', ''], $element) . '/>';
    }

    /**
     * @param string $itemName
     * 
     * @return string
     */
    public function normalizeItemName(string $itemName): string
    {
        (is_numeric($itemName)) && $itemName = 'item';

        return preg_replace('/\s+/', '_', $itemName);
    }
}

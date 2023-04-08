<?php

namespace Ordinary9843\Traits;

use SimpleXMLElement;

trait XmlTrait
{
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
        return '<' . preg_replace(['/\s+/', "/[^A-Za-z0-9-]/"], ['-', ''], $element) . '/>';
    }

    /**
     * @param string $itemName
     * @param string $default
     * 
     * @return string
     */
    public function normalizeItemName(string $itemName, string $default): string
    {
        (is_numeric($itemName)) && $itemName = $default;

        return preg_replace('/\s+/', '-', $itemName);
    }
}

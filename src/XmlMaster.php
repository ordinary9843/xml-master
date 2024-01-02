<?php

namespace Ordinary9843;

use Ordinary9843\Constants\MasterConstant;
use Ordinary9843\Traits\XmlTrait;
use DOMDocument;
use Exception;
use SimpleXMLElement;

class XmlMaster extends Master
{
    use XmlTrait;

    /**
     * @param array $array
     * @param SimpleXMLElement $xml
     * 
     * @return SimpleXMLElement
     */
    private function processArray(array $array, SimpleXMLElement $xml): SimpleXMLElement
    {
        foreach ($array as $key => $value) {
            $key = $this->normalizeItemName($key);
            if (is_array($value)) {
                $this->processArray($value, $xml->addChild($key));
            } else {
                $xml->addChild($key, htmlspecialchars($value));
            }
        }

        return $xml;
    }

    /**
     * @param string $xml
     * 
     * @return string
     */
    private function processXml(string $xml): string
    {
        $dom = new DOMDocument($this->getVersion(), $this->getEncoding());
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml);

        return $dom->saveXML();
    }

    /**
     * @param array $array
     * @param string $element
     * 
     * @return string
     */
    public function convert(array $array, string $element = null): string
    {
        try {
            if (empty($array)) {
                throw new Exception('Array content cannot be empty');
            }

            $xml = $this->processArray($array, $this->createXml($this->getVersion(), $this->getEncoding(), $element));
        } catch (Exception $e) {
            $this->addMessage(MasterConstant::MESSAGE_TYPE_ERROR, $e->getMessage());

            $xml = $this->processArray([], $this->createXml($this->getVersion(), $this->getEncoding(), $element));
        }

        return $this->processXml($xml->asXML());
    }

    /**
     * @param string $filePath
     * @param array $array
     * @param string $element
     * 
     * @return void
     */
    public function save(string $filePath, array $array, string $element = null): void
    {
        try {
            file_put_contents($filePath, $this->processXml($this->convert($array, $element)));
        } catch (Exception $e) {
            $this->addMessage(MasterConstant::MESSAGE_TYPE_ERROR, $e->getMessage());
        }
    }
}

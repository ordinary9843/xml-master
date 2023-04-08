<?php

namespace Ordinary9843;

class Master
{
    /** @var string */
    private $version = '1.0';

    /** @var string */
    private $encoding = 'UTF-8';

    /** @var string */
    private $itemName = 'item';

    /** @var array */
    private $error = [];

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
     * @param string $itemName
     * 
     * @return void
     */
    public function setItemName(string $itemName): void
    {
        $this->itemName = $itemName;
    }

    /**
     * @return string
     */
    public function getItemName(): string
    {
        return $this->itemName;
    }

    /**
     * @param string $error
     * 
     * @return void
     */
    public function setError(string $error): void
    {
        (!in_array($error, $this->error)) && $this->error[] = $error;
    }

    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }
}

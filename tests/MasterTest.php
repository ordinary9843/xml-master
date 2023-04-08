<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Ordinary9843\Master;

class MasterTest extends TestCase
{
    /** @var Master */
    private $master = null;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @var Master */
        $this->master = new Master();
    }

    /**
     * @return void
     */
    public function testVersion(): void
    {
        $version = '1.0';
        $this->master->setVersion($version);
        $this->assertEquals($version, $this->master->getVersion());
    }

    /**
     * @return void
     */
    public function testEncoding(): void
    {
        $encoding = 'UTF-8';
        $this->master->setEncoding($encoding);
        $this->assertEquals($encoding, $this->master->getEncoding());
    }

    /**
     * @return void
     */
    public function testItemName(): void
    {
        $itemName = 'test_item';
        $this->master->setItemName($itemName);
        $this->assertEquals($itemName, $this->master->getItemName());
    }

    /**
     * @return void
     */
    public function testError(): void
    {
        $this->assertEmpty($this->master->getError());

        $error = 'test-error';
        $this->master->setError($error);
        $this->assertEquals([
            $error
        ], $this->master->getError());
    }
}

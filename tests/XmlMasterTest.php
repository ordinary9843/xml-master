<?php

namespace Tests;

use Exception;
use Ordinary9843\XmlMaster;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class XmlMasterTest extends TestCase
{
    /** @var string */
    const TEST_FILE = 'test.xml';

    /** @var array */
    const SAMPLE_ARRAY = [
        'user' => [
            'name' => 'Software Engineer',
            'email' => 'ordinary9843@gmail.com',
            'title' => 'Sortware Engineer',
            'website' => 'https://github.com/ordinary9843',
            'skills' => ['PHP', 'NodeJS']
        ],
        'side projects' => [
            'https://github.com/ordinary9843/ghostscript',
            'https://github.com/ordinary9843/meta-master',
            'https://github.com/ordinary9843/html-master',
            'https://github.com/ordinary9843/xml-master'
        ],
    ];

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return XmlMaster|MockObject
     */
    private function getMock(array $methods): MockObject
    {
        return $this->getMockBuilder(XmlMaster::class)
            ->setMethods($methods)
            ->getMock();
    }

    /**
     * @return void
     */
    public function testShouldEqualsWhenConvert(): void
    {
        $xmlMaster = new XmlMaster();
        $xml = $xmlMaster->convert(self::SAMPLE_ARRAY);
        $data = simplexml_load_string($xml);
        $this->assertTrue(isset($data->user));
        $this->assertTrue(isset($data->side_projects));
        $this->assertEquals('<?xmlversion="1.0"encoding="UTF-8"?><root><user><name>SoftwareEngineer</name><email>ordinary9843@gmail.com</email><title>SortwareEngineer</title><website>https://github.com/ordinary9843</website><skills><item>PHP</item><item>NodeJS</item></skills></user><side_projects><item>https://github.com/ordinary9843/ghostscript</item><item>https://github.com/ordinary9843/meta-master</item><item>https://github.com/ordinary9843/html-master</item><item>https://github.com/ordinary9843/xml-master</item></side_projects></root>', str_replace([' ', "\n"], '', $xml));
        $this->assertEquals('<?xmlversion="1.0"encoding="UTF-8"?><root/>', str_replace([' ', "\n"], '', $xmlMaster->convert([])));
    }

    /**
     * @return void
     */
    public function testShouldFileExistsWhenSave(): void
    {
        $xmlMaster = new XmlMaster();
        $this->assertNull($xmlMaster->save(self::TEST_FILE, self::SAMPLE_ARRAY));
        $this->assertFileExists(self::TEST_FILE);
        $this->assertNull($xmlMaster->save(self::TEST_FILE, []));
        $this->assertFileExists(self::TEST_FILE);

        unlink(self::TEST_FILE);
        $this->assertFileNotExists(self::TEST_FILE);
    }

    /**
     * @return void
     */
    public function testShouldThrowExceptionWhenSave(): void
    {
        $mock = $this->getMock(['convert']);
        $mock->method('convert')
            ->will($this->throwException(new Exception('Convert failure.')));
        $this->assertNull($mock->save(self::TEST_FILE, self::SAMPLE_ARRAY));
        $this->assertNull($mock->save(self::TEST_FILE, []));
    }
}

<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Ordinary9843\XmlMaster;

class XmlMasterTest extends TestCase
{
    /** @var XmlMaster */
    private $xmlMaster = null;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @var XmlMaster */
        $this->xmlMaster = new XmlMaster();
    }

    /**
     * @return void
     */
    public function testConvert(): void
    {
        $array = [
            'user' => [
                'name' => 'Jerry Chen',
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
        $xml = $this->xmlMaster->convert($array);
        $data = simplexml_load_string($xml);
        $this->assertTrue(isset($data->user));
        $this->assertTrue(isset($data->side_projects));
        $this->assertEquals('<?xmlversion="1.0"encoding="UTF-8"?><root><user><name>JerryChen</name><email>ordinary9843@gmail.com</email><title>SortwareEngineer</title><website>https://github.com/ordinary9843</website><skills><item>PHP</item><item>NodeJS</item></skills></user><side_projects><item>https://github.com/ordinary9843/ghostscript</item><item>https://github.com/ordinary9843/meta-master</item><item>https://github.com/ordinary9843/html-master</item><item>https://github.com/ordinary9843/xml-master</item></side_projects></root>', str_replace([' ', "\n"], '', $xml));
        $this->assertEquals('<?xmlversion="1.0"encoding="UTF-8"?><root><item>[ERROR]Arraycontentcannotbeempty</item></root>', str_replace([' ', "\n"], '', $this->xmlMaster->convert([])));
    }

    /**
     * @return void
     */
    public function testSave(): void
    {
        $filePath = 'test.xml';
        $array = [
            'user' => [
                'name' => 'Jerry Chen',
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
        $this->assertNull($this->xmlMaster->save($filePath, $array));
        $this->assertFileExists($filePath);
        $this->assertNull($this->xmlMaster->save($filePath, []));
        $this->assertFileExists($filePath);

        unlink($filePath);
        $this->assertFileNotExists($filePath);
    }
}

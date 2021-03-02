<?php

use PHPUnit\Framework\TestCase;
use App\Config;
class ConfigTest extends TestCase
{
    public function testYaml()
    {
      $this->assertFileExists('../config.yaml');
    }
}
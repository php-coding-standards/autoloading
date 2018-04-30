<?php
declare(strict_types=1);
/**
 * Shake Autoloading.
 * Better php code equals better web applications.
 *
 * @license <https://github.com/shake-php/autoloading/blob/master/LICENSE>.
 * @link    <https://github.com/shake-php/autoloading>.
 */

class Psr4Test extends PHPUnit\Framework\TestCase
{

    public function testRegistry(): void
    {

        // Test using an empty option configuration.
        // This will cover the set options function in the ClassmapAutoloading
        // class.
        (new ClassmapAutoloading)->register(/* No options are going to be passed. */);
        
        // Return test result.
        $this->assertTrue(true);
        
        // Classmap to run.
        $map = array(
            __DIR__ . '/../bin/classmap/extra',
            __DIR__ . '/../bin/classmap'
        );
        
        // Try to register it with the new options configuration.
        (new ClassmapAutoloading)->register($map);
        
        // Try to use a class.
        $result = new Inisik\ClassmapTest\Test;
        $result = new Inisik\ClassmapTest\Test2;
        $result = new Inisik\ClassmapTest\Test3;
        $result = new Inisik\ClassmapTest\Test4;
 
        // Return test result.
        $this->assertTrue(true);
        
        // Test getInfo.
        (new ClassmapAutoloading)->getInfo();

        // Return test result.
        $this->assertTrue(true);
    }
}

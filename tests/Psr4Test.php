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
        // This will cover the set options function in the Psr4Autoloading
        // class.
        (new Psr4Autoloading)->register(/* No options are going to be passed. */);
        
        // Return test result.
        $this->assertTrue(true);
        
        // Psr4 Test Namespaces With Base Directories.
        $namespaces = array(
            'Inisik\\Psr4Test\\' => __DIR__ . '/../bin/psr4/1',
            'Inisik\\Psr4TestTwo\\' => __DIR__ . '/../bin/psr4/2'
        );
        
        // Try to register it with the new options configuration.
        (new Psr4Autoloading)->register($namespaces);
        
        // Try to use a class.
        $result = new Inisik\Psr4Test\Test;
        $result = new Inisik\Psr4TestTwo\Test;

        // Return test result.
        $this->assertTrue(true);
        
        // Test getInfo.
        (new Psr4Autoloading)->getInfo();

        // Return test result.
        $this->assertTrue(true);
    }
}

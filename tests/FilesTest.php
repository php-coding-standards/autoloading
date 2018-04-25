<?php
declare(strict_types=1);
/**
 * Shake Autoloading.
 * Better php code equals better web applications.
 *
 * @license <https://github.com/shake-php/autoloading/blob/master/LICENSE>.
 * @link    <https://github.com/shake-php/autoloading>.
 */

/**
 * @class FilesTest
 */
class FilesTest extends PHPUnit\Framework\TestCase
{

    public function testRegistry(): void
    {
        // Test using an empty option configuration.
        // This will cover the set options function in the Psr4Autoloading
        // class.
        (new FilesAutoloading)->register(/* No options are going to be passed. */);
        
        // Return test result.
        $this->assertTrue(true);
        
        $files = array(
           __DIR__ . '/../bin/files/test1.php',
           __DIR__ . '/../bin/files/test2.php'
        );
        
        // Try to register it with the new options configuration.
        (new FilesAutoloading)->register($files);
        
        if (!function_exists('Shake208781103084765443278950'))
        {
            $this->assertTrue(false);
        }
        
        if (!function_exists('Shake566648390099377666647733'))
        {
            $this->assertTrue(false);
        }

        // Return test result.
        $this->assertTrue(true);
    }
}

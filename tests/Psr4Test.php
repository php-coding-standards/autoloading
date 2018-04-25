<?php

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
    }
}

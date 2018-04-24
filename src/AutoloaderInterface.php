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
 * @interface AutoloaderInterface.
 *
 * The interface that defines each autoloader.
 */
interface AutoloaderInterface
{

    /**
     * Get the autoloader information.
     *
     * @return array An array of information from the autoloader.
     */
    public function getInfo(): array;
}

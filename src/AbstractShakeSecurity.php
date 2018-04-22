<?php
declare(strict_types=1);
/**
 * Shake Autoloading.
 * A better internet.
 *
 * @license <https://github.com/shake-php/autoloading/blob/master/LICENSE>.
 * @link    <https://github.com/shake-php/autoloading>.
 */

/**
 * @class AbstractShakeSecurity.
 */
abstract class AbstractShakeSecurity
{

    /**
     * Validate the file path.
     *
     * @param string $file The file path.
     *
     * @return bool Returns the validated file path.
     */
    public function validate(string $file): string
    {
        return absolute_path($file);
    }

}

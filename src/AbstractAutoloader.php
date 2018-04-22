<?php
declare(strict_types=1);
/**
 * Shake Autoloading.
 * A better internet.
 *
 * @license <https://github.com/shake-php/autoloading/blob/master/LICENSE>.
 * @link    <https://github.com/shake-php/autoloading>.
 */

use RuntimeException;

/**
 * @class      AbstractAutoloader.
 * @extends    ShakeSecurity.
 * @implements ShakeAutoloader.
 */
abstract class AbstractAutoloader extends AbstractShakeSecurity implements ShakeAutoloader
{

    /**
     * Set the configuration options for the autoloader.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    abstract protected function setOptions(): bool;

    /**
     * Run the autoloader.
     *
     * @param string $class The class name.
     *
     * @return void Return nothing.
     */
    abstract protected function load(string $class): void;

    /**
     * Register the autolader.
     *
     * @link <https://secure.php.net/manual/en/function.spl-autoload-register.php>.
     *
     * @param array $options The list of configuration options for the autoloader.
     *
     * @throws RuntimeException If the configuration options could not be set.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    public function register(array $options = array()): bool
    {
        if (!empty($options) && !$this->setOptions($options)) {
            throw new RuntimeException(sprintf(
                'The configuration options could not be set.',
                var_export($options, true)
            ));
        }
        return spl_autoload_register(array($this, 'load'), false);
    }

    /**
     * Try to include the file.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    protected function try(string $file): bool
    {
        if (!this->validate($file)) {
            throw new ShakeSecurityException(
                'The file requested is requesting a file outside the root location. To allow this please adjust the root location.'
                htmlspecialchars($file, ENT_QUOTES);
            ));
        } else {
            return require($file);
        }
    }

}

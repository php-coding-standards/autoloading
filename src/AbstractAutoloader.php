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
 * @class AbstractAutoloader.
 *
 * This autoloading extension is active in thought but is never
 * initialized unless needed.
 */
abstract class AbstractAutoloader implements AutoloaderInterface
{

    /**
     * Set the configuration options for the autoloader.
     *
     * @link <https://secure.php.net/manual/en/language.oop5.abstract.php>.
     *
     * @param array $array An array of options.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    abstract protected function setOptions(array $array = array()): bool;

    /**
     * Run the autoloader.
     *
     * @link <https://secure.php.net/manual/en/language.oop5.abstract.php>.
     *
     * @param string $k The class name.
     *
     * @return void Return nothing.
     */
    abstract protected function load(string $k): void;

    /**
     * Register the autolader.
     *
     * @link <https://secure.php.net/manual/en/language.oop5.autoload.php>.
     * @link <https://secure.php.net/manual/en/function.spl-autoload-register.php>.
     *
     * @param array $options The list of configuration options for the autoloader.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    public function register(array $options = array()): bool
    {
        if ($this->setOptions($options))
            return spl_autoload_register(array($this, 'load'), false);
        // @codeCoverageIgnoreStart
        return false;
        // @codeCoverageIgnoreEnd
    }

    /**
     * Try to include the file.
     *
     * @link <https://secure.php.net/manual/en/function.include.php>.
     * @link <https://secure.php.net/manual/en/function.require.php>.
     *
     * @param string $file The file to require.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    protected function try(string $file): bool
    {
        /** @psalm-suppress UnresolvableInclude **/
        if (file_exists($file))
            include_once $file;
        return true;
    }
}

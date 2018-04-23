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
    abstract protected function setOptions(array $array): bool;

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
        return false;
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
        $file = $this->parseFile($file));
        return (bool) require $file;
    }

    /**
     * Parse the file.
     *
     * @link <https://secure.php.net/manual/en/security.filesystem.php>.
     * @link <https://secure.php.net/manual/en/function.realpath.php>.
     * @link <https://secure.php.net/manual/en/function.basename.php>.
     *
     * @param string $file The file to parse.
     *
     * @return string Returns the parse file.
     */
    private function parseFile($file): string
    {
        $file = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $file);
        $parts = array_filter(explode(DIRECTORY_SEPARATOR, $file), 'strlen');
        $absolutes = array();
        foreach ($parts as $part) {
            if ('.' == $part)
                continue;
            if ('..' == $part)
                array_pop($absolutes);
            else
                $absolutes[] = $part;
        }
        return implode(DIRECTORY_SEPARATOR, $absolutes);
    }
}

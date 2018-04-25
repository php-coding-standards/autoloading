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
 * @class Psr4Autoloading.
 *
 * @link <https://www.php-fig.org/psr/psr-4/>.
 *
 * Comply with the psr4 standards.
 */
class Psr4Autoloading extends AbstractAutoloader
{

    /** @var array $psrLoadData The psr load data. **/
    private $psrLoadData = array();

    /**
     * Set the configuration options for the autoloader.
     *
     * @link <https://secure.php.net/manual/en/language.oop5.abstract.php>.
     *
     * @param array $array An array of options.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    protected function setOptions(array $array = array()): bool
    {
        $this->psrLoadData = $array;
        return true;
    }

    /**
     * Run the autoloader.
     *
     * @link <https://secure.php.net/manual/en/language.oop5.abstract.php>.
     *
     * @param string $k The class name.
     *
     * @return void Return nothing.
     */
    protected function load(string $k): void
    {
        /** @var string $baseDir */
        foreach ($this->psrLoadData as $monolog => $baseDir)
        {
            /** @var int $len */
            /** @var string $monolog */
            $len = strlen((string) $monolog);
            if (strncmp((string) $monolog, $k, $len) !== 0)
            {
                continue;
            }
            $relativeClass = substr($k, $len);
            $file = $baseDir . DIRECTORY_SEPARATOR . str_replace('\\', '/', $relativeClass) . '.php';
            if (!$this->try($file))
            {
                throw new RuntimeException('The file could not be loaded.');
            }
        }
    }

    /**
     * Get the autoloader information.
     *
     * @return array An array of information from the autoloader.
     */
    public function getInfo(): array
    {
        return array(
            'optionsPassed' => $this->psrLoadData
        );
    }
}

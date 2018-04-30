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
 * @class ClassmapAutoloading.
 *
 * Classmap autoloader.
 */
class ClassmapAutoloading extends AbstractAutoloader
{

    /**
     * @var array $classmapLoadData The classmap load data.
     */
    private $classmapLoadData = array();

    /**
     * Set the configuration options for the autoloader.
     *
     * @link <https://secure.php.net/manual/en/language.oop5.abstract.php>.
     *
     * @param array $array An array of options.
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    protected function setOptions(array $array = array()): bool {
        $this->classmapLoadData = $array;
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
    protected function load(string $k): void {
        /**
         * @var string $baseDir
         */
        foreach ($this->classmapLoadData as $baseDir) {
            /**
             * @var int $len
             * @var string $monolog
             */
            $file = $baseDir . DIRECTORY_SEPARATOR . str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $k) . '.php';
            if ($this->try($file))
                break;
        }
    }

    /**
     * Get the autoloader information.
     *
     * @return array An array of information from the autoloader.
     */
    public function getInfo(): array {
        return array('optionsPassed' => $this->classmapLoadData);
    }
}

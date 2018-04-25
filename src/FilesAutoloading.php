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
 * @class FilesAutoloading.
 *
 * Be able to load single files into your web application with ease.
 */
class FilesAutoloading extends AbstractAutoloader
{

    /**
     * @var array $filesLoadData The files load data.
     */
    private $filesLoadData = array();

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
        $this->filesLoadData = $array;
        $this->load('no-data');
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
         * @var string $file
         */
        foreach ($this->filesLoadData as $file)
            $this->try($file);
    }

    /**
     * Get the autoloader information.
     *
     * @return array An array of information from the autoloader.
     */
    public function getInfo(): array {
        return array('optionsPassed' => $this->filesLoadData);
    }
}

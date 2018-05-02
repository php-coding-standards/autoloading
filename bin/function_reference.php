<?php
declare(strict_types=1);
/**
 * Shake Autoloading.
 * Better php code equals better web applications.
 *
 * @license <https://github.com/shake-php/autoloading/blob/master/LICENSE>.
 * @link    <https://github.com/shake-php/autoloading>.
 */

function register_psr4_autoloader(array $options = array()): void {
    (new Psr4Autoloading)->register($options);
}

function register_files_autoloader(array $options = array()): viod {
    (new FilesAutoloading)->register($options);
}

function register_classmap_autoloader(array $options = array()): void {
    (new ClassmapAutoloading)->register($options);
}

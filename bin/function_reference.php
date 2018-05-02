<?php
declare(strict_types=1);
/**
 * Shake Autoloading.
 * Better php code equals better web applications.
 *
 * @license <https://github.com/shake-php/autoloading/blob/master/LICENSE>.
 * @link    <https://github.com/shake-php/autoloading>.
 */

function psr4(array $options = array()): void {
    (new \Psr4Autoloading)->register($options);
}

function files(array $options = array()): viod {
    (new \FilesAutoloading)->register($options);
}

function classmap(array $options = array()): void {
    (new \ClassmapAutoloading)->register($options);
}

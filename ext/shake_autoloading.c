#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include "php.h"
#include "php_ini.h"
#include "php_shake_autoloading.h"

#define PHP_SHAKE_AUTOLOADING_VERSION "1.1.2"
#define PHP_SHAKE_AUTOLOADING_EXTENSION_NAME "shake_autoloading"

static function_entry hello_functions[] = {
    PHP_FE(register_psr4_autoloader, NULL)
    PHP_FE(register_files_autoloader, NULL)
    PHP_FE(register_classmap_autoloader, NULL)
    {NULL, NULL, NULL}
};

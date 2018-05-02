#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include "php.h"
#include "php_ini.h"
#include "php_shake_autoloading.h"

#define PHP_SHAKE_AUTOLOADING_VERSION "1.1.2"
#define PHP_SHAKE_AUTOLOADING_EXTENSION_NAME "shake_autoloading"

extern zend_module_entry my_extension_module_entry;
#define phpext_my_extension_ptr &my_extension_module_entry

PHP_FUNCTION(register_psr4_autoloader);
PHP_FUNCTION(register_files_autoloader);
PHP_FUNCTION(register_classmap_autoloader);

static function_entry shake_autoloading_functions[] = {
    PHP_FE(register_psr4_autoloader, NULL)
    PHP_FE(register_files_autoloader, NULL)
    PHP_FE(register_classmap_autoloader, NULL)
    {NULL, NULL, NULL}
};

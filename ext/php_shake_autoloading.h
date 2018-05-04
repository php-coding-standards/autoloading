#ifndef PHP_SHAKE_AUTOLOADING_H
#define PHP_SHAKE_AUTOLOADING_H 1

extern zend_module_entry shake_autoloading_module_entry;
#define phpext_shake_autoloading_ptr &shake_autoloading_module_entry

#ifdef ZTS
#include "TSRM.h"
#endif

#endif

if test "$PHP_SHAKE_AUTOLOADING" = "yes"; then
    AC_DEFINE(HAVE_SHAKE_AUTOLOADING, 1, [Whether you have Slobel])
    PHP_NEW_EXTENSION(shake_autoloading, shake_autoloading.c, $ext_shared)
fi

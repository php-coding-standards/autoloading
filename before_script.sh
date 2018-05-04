if [ "$SHAKE_AUTOLOADING_EXT" == "yes" ]; then
  git clone https://github.com/phalcon/zephir
  phpize -v
  cd zephir
  ./install -c
  zephir help
  zephir init utils
; fi

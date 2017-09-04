#!/usr/bin/env php
# autogenerated file; do not edit
sudo: false
language: c

addons:
 apt:
  packages:
   - php5-cli
   - php-pear
   - valgrind

env:
 matrix:
<?php

$gen = include "./travis/pecl/gen-matrix.php";
$env = $gen([
	"PHP" => ["5.4", "5.5", "5.6", "7.0", "7.1", "7.2", "master"],
	"enable_debug",
	"enable_maintainer_zts",
]);
foreach ($env as $e) {
	printf("  - %s\n", $e);
}

?>

before_script:
 - make -f travis/pecl/Makefile php
 - make -f travis/pecl/Makefile ext PECL=apfd

script:
 - make -f travis/pecl/Makefile test


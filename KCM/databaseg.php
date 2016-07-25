<?php
$parse = yaml_parse(file_get_contents('config.yml'));

var_dump($parse);
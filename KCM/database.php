<?php defined('_ENGINE') or die('Access Denied'); return array (
  'adapter' => 'mysqli',
  'params' =>
  array (
    'host' => '10.255.255.255',
    'username' => 'testuser',
    'password' => 'test',
    'dbname' => 'test_db',
    'charset' => 'UTF8',
    'adapterNamespace' => 'Zend_Db_Adapter',
  ),
  'isDefaultTableAdapter' => true,
  'tablePrefix' => 'engine4_',
  'tableAdapterClass' => 'Engine_Db_Table',
); ?>
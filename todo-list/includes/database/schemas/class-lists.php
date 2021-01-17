<?php
namespace BerlindDB_Examples\TodoList\Database\Schemas;

defined( 'ABSPATH' ) || exit;

use BerlinDB\Database\Schema;

class Lists extends Schema {
  public $columns = [
    [
      'name'     => 'id',
      'type'     => 'bigint',
      'length'   => '20',
      'unsigned' => true,
      'extra'    => 'auto_increment',
      'primary'  => true,
      'sortable' => true,
    ],

    [
      'name'     => 'name',
      'type'     => 'varchar',
      'length'   => '128',
      'default'  => \__( 'New List', 'berlindb-examples' ),
      'sortable' => true,
    ]
  ];
}
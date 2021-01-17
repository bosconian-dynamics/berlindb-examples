<?php
<?php
namespace BerlindDB_Examples\TodoList\Database\Schemas;

defined( 'ABSPATH' ) || exit;

use BerlinDB\Database\Schema;

class ListItems extends Schema {
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
      'name'      => 'list_id',
      'type'      => 'bigint',
      'length'    => '20',
      'unsigned'  => true,
      'cache_key' => true,
    ],

    [
      'name'     => 'name',
      'type'     => 'varchar',
      'length'   => '128',
      'default'  => \__( 'New List', 'berlindb-examples' ),
      'sortable' => true,
    ],

    [
      'name'     => 'complete',
      'type'     => 'tinyint',
      'length'   => '1',
      'unsigned' => true
    ]
  ];
}
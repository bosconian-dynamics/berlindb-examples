<?php
namespace BerlinDB_Examples\TodoList\Database\Schemas;

defined( 'ABSPATH' ) || exit;

use BerlinDB\Database\Schema;

/**
 * Undocumented class
 */
class TodoListItems extends Schema {
	/**
	 * Undocumented variable
	 *
	 * @var array
	 */
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
			'length'   => '127',
			'default'  => 'New List Item',
			'sortable' => true,
		],

		[
			'name'     => 'complete',
			'type'     => 'tinyint',
			'length'   => '1',
			'unsigned' => true,
			'default'  => '0',
			'sortable' => true,
		],
	];
}

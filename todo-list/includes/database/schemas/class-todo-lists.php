<?php
namespace BerlinDB_Examples\TodoList\Database\Schemas;

defined( 'ABSPATH' ) || exit;

use BerlinDB\Database\Schema;

/**
 * Undocumented class
 */
class TodoLists extends Schema {
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
			'name'     => 'name',
			'type'     => 'varchar',
			'length'   => '127',
			'default'  => 'New List',
			'sortable' => true,
		],
	];
}

<?php
namespace BerlinDB_Examples\TodoList\Database\Tables;

defined( 'ABSPATH' ) || exit;

use BerlinDB\Database\Table;

final class TodoListItems extends Table {
	protected $name = 'todo_list_items';

	protected $version = 202101171;

	protected $upgrades = [];

	protected function set_schema() {
		$this->schema = "id bigint(20) unsigned NOT NULL auto_increment,
		list_id bigint(20) unsigned NOT NULL default '0',
		name varchar(127) NOT NULL default 'New List Item',
		complete tinyint(1) unsigned NOT NULL default '0',
		PRIMARY KEY (id),
		KEY list_id (list_id)";
	}
}

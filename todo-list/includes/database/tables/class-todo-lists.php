<?php
namespace BerlinDB_Examples\TodoList\Database\Tables;

defined( 'ABSPATH' ) || exit;

use BerlinDB\Database\Table;

final class TodoLists extends Table {
	protected $name = 'todo_lists';

	protected $version = 202101171;

	protected $upgrades = [];

	protected function set_schema() {
		$this->schema = "id bigint(20) unsigned NOT NULL auto_increment,
		name varchar(127) NOT NULL default 'New List',
		PRIMARY KEY (id)";
	}
}

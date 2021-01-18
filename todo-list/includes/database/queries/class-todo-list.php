<?php
namespace BerlinDB_Examples\TodoList\Database\Queries;

use BerlinDB\Database\Query;

class TodoList extends Query {
	protected $table_name = 'todo_lists';

	protected $table_alias = 'l';

	protected $table_schema = '\\BerlinDB_Examples\\TodoList\\Schemas\\TodoList';

	protected $item_name = 'todo_list';

	protected $item_name_plural = 'todo_lists';

	protected $item_shape = '\\BerlinDB_Examples\\TodoList\\TodoList';

	protected $cache_group = 'todo_list';
}

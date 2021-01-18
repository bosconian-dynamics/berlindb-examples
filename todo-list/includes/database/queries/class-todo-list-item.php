<?php
namespace BerlinDB_Examples\TodoList\Database\Queries;

use BerlinDB\Database\Query;

class TodoListItem extends Query {
	protected $table_name = 'todo_list_items';

	protected $table_alias = 'i';

	protected $table_schema = '\\BerlinDB_Examples\\TodoList\\Schemas\\TodoListItem';

	protected $item_name = 'todo_list_item';

	protected $item_name_plural = 'todo_list_items';

	protected $item_shape = '\\BerlinDB_Examples\\TodoList\\TodoListItem';

	protected $cache_group = 'todo_list_items';
}

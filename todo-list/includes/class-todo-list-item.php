<?php
namespace BerlinDB_Examples\TodoList;

use BerlinDB_Examples\TodoList\Database\Rows as Rows;
use BerlinDB_Examples\TodoList\Database\Queries as Queries;

class TodoListItem extends Rows\TodoListItem {
	protected $id;

	protected $list_id;

	protected $name;

	protected $complete;

	protected $list = null;

	public function __get( $key = '' ) {
		if( 'list' === $key && null === $this->list ) {
			$this->get_list();
		}

		return parent::__get( $key );
	}

	public function get_list() {
		if( null === $this->list ) {
			$lists = new Queries\TodoList();

			$this->list = $lists->query(
				[
					'number' => 1,
					'id'     => $this->id,
				]
			);
		}

		return $this->list;
	}

	public function is_complete() {
		return $this->complete === 1;
	}
}

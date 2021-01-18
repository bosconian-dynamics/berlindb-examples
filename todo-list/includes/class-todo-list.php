<?php
namespace BerlinDB_Examples\TodoList;

use BerlinDB_Examples\TodoList\Database\Rows as Rows;
use BerlinDB_Examples\TodoList\Database\Queries as Queries;

class TodoList extends Rows\TodoList {
	protected $id;

	protected $name;

	protected $items = null;

	public function __get( $key = '' ) {
		if( 'items' === $key && null === $this->items ) {
			$this->get_items();
		}

		return parent::__get( $key );
	}

	public function get_items() {
		if( null === $this->items ) {
			$items = new Queries\TodoListItem();

			$this->items = $items->query(
				[
					'list_id' => $this->id,
				]
			);
		}

		return $this->items;
	}

	public function is_complete() {
		$items = $this->get_items();

		foreach( $items as $item ) {
			if( ! $item->is_complete() )
				return false;
		}

		return true;
	}
}

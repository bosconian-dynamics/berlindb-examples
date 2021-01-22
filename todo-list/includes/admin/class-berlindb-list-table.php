<?php
namespace BerlinDB_Examples\TodoList\Admin;

defined( 'ABSPATH' ) || exit;

if( !class_exists( '\\WP_List_Table' ) )
  require_once ABSPATH . ' /wp-admin/includes/class-wp-list-table.php';

class BerlinDBListTable extends \WP_List_Table {
//  protected $compat_fields = [ '_args', '_pagination_args', 'screen', '_actions', '_pagination' ];
  protected $query;

  public function __construct( $query, $args = [] ) {
    if( !isset( $args['singular'] ) ) {
      $args['singular'] = preg_replace_callback(
        '(?:^|_)(\w)',
        function( $m ) { 
          return ' ' . strtoupper( $m[1] );
        },
        $query->item_name
      );
    }

    if( !isset( $args['plural'] ) ) {
      $args['plural'] = preg_replace_callback(
        '(?:^|_)(\w)',
        function( $m ) { 
          return ' ' . strtoupper( $m[1] );
        },
        $query->item_name_plural
      );
    }

    parent::__construct( $args );

    $this->query = $query;
  }

  public function prepare_items() {
    $this->_column_headers = $this->get_column_info();

    //$this->process_bulk_action();

    $per_page = $this->get_items_per_page( 'edit_' . $this->query->item_name . '_rows_per_page' );

    $rows = $this->query->query(
      [
        'number' => $per_page,
        'offset' => $per_page * $this->get_pagenum(),
      ]
    );
    
    $this->set_pagination_args(
      [
        'total_items' => $this->query->found_items,
        'per_page'    => $per_page,
      ]
    );

    $this->items = count( $rows ) === 1 && ! $rows[0]->exists()
      ? []
      : $rows;
  }

  public function get_columns() {
    $columns = [
      'cb' => '<input type="checkbox" />',
    ];

    foreach( $this->query->get_columns() as $column ) {
      $columns[ $column->name ] = empty( $column->comment )
        ? preg_replace_callback(
          '(?:^|_)(\w)',
          function( $m ) { 
            return ' ' . strtoupper( $m[1] );
          },
          $column->name
        )
        : $column->comment;
    }

    return $columns;
  }

  protected function get_sortable_columns() {
    $columns = [];

    foreach( $this->query->get_columns( [ 'sortable' => true ] ) as $column ) {
      $columns[ $column->name ] = [ $column->name, $column->primary ];
    }

    return $columns;
  }

  protected function get_default_primary_column_name() {
    $column = $this->query->get_column_by( [ 'primary' => true ] );

    if( $column )
      return $column->name;
    
    return parent::get_default_primary_column_name();
  }
}

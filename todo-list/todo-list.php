<?php
/**
 * Plugin Name: BerlinDB Example: Todo List
 */

namespace BerlinDB_Examples\TodoList;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/vendor/autoload.php';

final class TodoListPlugin {
  const VERSION = '0.1.0';

  private static $instance;

  public static function instance() {
    if( !self::$instance )
      self::$instance = new TodoListPlugin();
    
    return self::$instance;
  }

  private function __construct() {
    
  }
}
<?php
/**
 * class SimpleFileIterator
 *
 * Returns a SimpleIterator containing a file list of the given directory
 * Not much error checking to keep the class light
 *
 * @copyright Loughborough University
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL version 3
 *
 * @link https://github.com/webpa/webpa
 */

require_once('class_simple_iterator.php');

class SimpleFileIterator extends SimpleIterator /* implements abstract_SimpleIterator */ {
  public $array = null;
  public $count = 0;

  /* Private */

  private $_key = null;
  private $_value = null;

  /**
   *  CONSTRUCTOR for the simple file iterator
   * @param string $dir
  */
  function __construct($dir) {
    $dir_list = array();
    if ($handle = opendir($dir)) {
      while ($filename = readdir($handle)) { if (preg_match('#^\.#',$filename)==0) $dir_list[] = $filename; }
      closedir($handle);
    }
    asort($dir_list);

    $this->_initialize($dir_list);
  }// /->SimplefileIterator()

}// /class: SimpleFileIterator

?>

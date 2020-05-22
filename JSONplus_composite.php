<?php
namespace JSONplus;
define('COMPOSER', TRUE);
require_once('vendor/autoload.php');

class Composite extends \JSONplus {
	###
}

$j = new \JSONplus\Composite();
print_r($j);
?>

<?php
namespace JSONplus;
define('COMPOSER', TRUE);
require_once('vendor/autoload.php');

class Composite extends \JSONplus {
	###
  public function add($json){
    $this->_[] = $json;
  }
  public function process($setting=array()){
    $res = array();
    foreach($this->__toArray() as $i=>$j){
      $res = $this->merge($res, $j);
    }
    if(isset($setting['output']) && $setting['output'] == 'array'){
      return $res;
    }
    else{
      $json = new \JSONplus($res);
      $str = $json->export();
      return $str;
    }
  }
  public function merge($a=array(), $b=array()){
    if(self::is_JSONplus($a)){ $a = $a->get(); }
    if(self::is_JSONplus($b)){ $b = $b->get(); }
    return array_merge_recursive($a, $b);
  }
  //public function analyse($str=NULL, $setting=array()){}
}
/*
$j = new \JSONplus\Composite();
$j->add( new \JSONplus(__DIR__.'/composer.json') );
$j->add( new \JSONplus('{"foo":"bar"}') );
$j->add( new \JSONplus('{"autoload":{"files":["other.hh"]}}') );
print_r($j);
//print_r( $j->process(array('output'=>'array')) );
print $j->process();
*/
?>

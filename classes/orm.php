<?php
// Handles Object-Database record mapping
class ORM extends Stateful
{
static$db,$t,$f,$r,$b,$k='id';
function __construct($d=0){if($d){$t=$this;if(is_numeric($d))$t->d[$t::$k]=$d;else{$t->d=(array)$d;$t->l=1;}}}
function __get($k){$t=$this;$t->load();return($m=v($t::$r[$k]))?current($t->$k(array(),1)):(($m=v($t::$b[$k]))?new$m($t->d[$m::$f]):parent::__get($k));}
function __call($m,$a){$t=$this;$m=new$t::$r[$m];$a=$a+array(1=>0,0,0);$a[0][$t::$f]=$t->{$t::$k};return$m->get($a[0],$a[1],$a[2],$a[3]);}
function save(){$t=$this;if($d=$t->changes()){$k=$t::$k;return$t->l=empty($t->d[$k])?($t->$k=$t::$db->insert($t::$t,$d)):$t::$db->update($t::$t,$d,array($k=>$t->$k));}}
function load(){$t=$this;if($t->l)return 1;$k=$t::$k;if(empty($t->d[$k]))return;if($r=$t->get(array($k=>$t->d[$k]))){$t->l=1;$t->c=0;return$t->d=$r[0]->values();}}
function get($w=0,$l=0,$o=0,$s=0,$c=0,$f='fetch'){$t=$this;list($q,$p)=$t::$db->select($c,$t::$t,$w,$l,$o,$s);$r=$t::$db->$f($q,$p);if($f{0}=='f'){foreach($r as&$v)$v=new$t($v);}return$r;}
function count($w=0){return$this::$db->count($this::$t,$w);}
}
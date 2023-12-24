<?php

namespace Src\Services;

use Rain\Tpl;

class Page {

	private $tpl;
	private $options = [];
	private $defaults = [
		"header"=>true,
		"footer"=>true,
		"data"=>[]
	];

	public function __construct($opts = array(),$tmp_dir = "/resources/views/pages/"){

       //echo   $_SERVER['DOCUMENT_ROOT']."/resources/views/".$tmp_dir;

		$this->options = array_merge($this->defaults, $opts);

		$config = array(
		    "base_url"      => null,
		    "tpl_dir"       =>  $_SERVER['DOCUMENT_ROOT'].$tmp_dir,
		    "cache_dir"     =>  $_SERVER['DOCUMENT_ROOT']."/resources/views-cache/",
		    "debug"         => false
		);

		Tpl::configure($config);

		$this->tpl = new Tpl();

		if($this->options['data']){
            $this->setData($this->options['data']);
        }

		if($this->options['header']){ 
            $this->tpl->draw("header", false);
        }

	}

    private function setData($data = array()){

		foreach($data as $key => $val){

			$this->tpl->assign($key, $val);

		}

	}

	public function setTpl($tplname, $data = array(), $returnHTML = false){

		$this->setData($data);

		return $this->tpl->draw($tplname, $returnHTML);

	}

	public function __destruct(){

		if($this->options['footer']){
            $this->tpl->draw("footer", false);
        }

	}		

}
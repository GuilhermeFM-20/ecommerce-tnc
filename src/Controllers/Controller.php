<?php

namespace Src\Controllers;

class Controller{

	const MSG = "Msg";
    
	public static function setMessage($msg,$type){

		$_SESSION[Controller::MSG] = array('msg'=>$msg,'type'=>$type);

	}

	public static function getMessage(){

		$msg = (isset($_SESSION[Controller::MSG]) && $_SESSION[Controller::MSG] != array()) ? $_SESSION[Controller::MSG] : array();

		Controller::clearMessage();

		return $msg;

	}

	public static function clearMessage(){

		$_SESSION[Controller::MSG] = array('msg'=>'','type'=>'');

	}

    public function verifyPages($items){

        $pages = [];

        for ($i=1; $i < $items['pages'] ; $i++) { 
            array_push($pages, [
                "link"=>'page='.$i,
                "page"=>$i

            ]);

        }

        return $pages;

    }

    
	public static function redirect(string $route){

		header("Location: $route");
		exit;

	}

}


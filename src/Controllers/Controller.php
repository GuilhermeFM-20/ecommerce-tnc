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

    public function verifyPages($items,$current_page){

        $pages = [];

        for ($i=1; $i < $items['pages'] ; $i++) { 
            array_push($pages, [
                "link"=>'page='.$i,
                "page"=>$i

            ]);
        }

		$pages = array_chunk($pages, 10);

		foreach($pages as $key => $page){

			$turn = array_search($current_page, array_column($page, 'page'));

			if($turn > -1){
				$section = $key;
			}

		}

		$first_page = $pages[$section][0]['page']-1 == 0 ? $current_page : $pages[$section][0]['page']-1 ;
		$last_page = $pages[$section][9]['page']+1;

		$more = [
			1 => [ "link" => 'page='.$first_page, "page"=>$first_page],
			2 => [ "link" => 'page='.$last_page, "page"=>$last_page],
		];

        return [
		 'pages' => $pages[$section],
		 'more' => $more
		];

    }

    
	public static function redirect(string $route){

		header("Location: $route");
		exit;

	}

}


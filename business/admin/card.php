<?php

	function card(){

		if (!isset($_GET['page'])) {
			$page = 1;
		} else {
			$page = $_GET['page'];
		}
		$data = 10;
		$sql = "SELECT * FROM loadcard ";
		$result = executeQuery($sql);
		$number = count($result);
		$pagea = ceil($number / $data);
		$pages = ($page - 1) * $data;
		$sql = "SELECT * FROM loadcard ORDER BY created_at DESC LIMIT $pages,$data";
		$card = executeQuery($sql);
		
		admin_render('card/card.php',[
			'card' => $card,
			'pagea' => $pagea,
		]);
		$sql = "SELECT * FROM loadcard ";
        $card = executeQuery($sql);

		admin_render('card/card.php',[
    
            'card' => $card,

        ]);
	}
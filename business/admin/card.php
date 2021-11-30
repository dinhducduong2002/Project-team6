<?php

	function card(){

		$sql = "SELECT * FROM loadcard ";
        $card = executeQuery($sql);

		admin_render('card/card.php',[
    
            'card' => $card,

        ]);
	}
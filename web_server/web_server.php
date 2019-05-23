<?php

// DB bağlantısı PHP ile kurulacak


    $host = 'sql223.main-hosting.eu.';
    $user = 'u352810911_user';
    $pass = 'eco*1234';
    $data = 'u352810911_eco';

    try {
        $pdo = new PDO('mysql:host='.$host.';dbname='.$data.';charset=utf8', $user, $pass);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
    }


// SQL cümlesi yazılacak


		$ruya=$_GET['ruya'];


    	$stmt = $pdo->prepare("SELECT * from ruyalar where ruya=:gelenruya");
		$stmt->bindParam(':gelenruya', $ruya, PDO::PARAM_STR);
		$sonuc = $stmt->execute();

/// update et


//Gelen sonuç JSON dönüştürülecek

 		$gelenruyalar = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$json_data=json_encode($gelenruyalar);
		print $json_data;




    	$stmt = $pdo->prepare("UPDATE ruyalar set goruldu=goruldu+1 where ruya=:gelenruya");
		$stmt->bindParam(':gelenruya', $ruya, PDO::PARAM_STR);
		$sonuc = $stmt->execute();

?>
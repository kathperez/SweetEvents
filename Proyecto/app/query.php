<?php
		
	if(isset($_POST['send'])){
		//incluimos el .php en donde esta la conexion a la base de datos
		include "../app/config.php";
		$conMySql = new Connect();

		$name = $_POST['name'];
		$info = $_POST['info'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$img1 = $_FILES['img1']["name"];
		$img2 = $_FILES['img2']["name"];
		$img3 = $_FILES['img3']["name"];
		$fbSite = $_POST['fbSite'];
		$instaSite = $_POST['instaSite'];
		$category = $_POST['comboCategory'];

		//genera un codigo aletorio
		function newCode($long) {
		 $key = '';
		 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		 $max = strlen($pattern)-1;
		 for($i=0;$i < $long;$i++) $key .= $pattern{mt_rand(0,$max)};
		 return $key;
		}

		//obtener archivos temporales y establecer ruta
		$dir = $_FILES["img1"]["tmp_name"];
		$ruta1 = "../upload";
		$ruta1 = $ruta1."/".newCode(8).$img1;
		$dir2 = $_FILES["img2"]["tmp_name"];
		$ruta2 = "../upload";
		$ruta2 = $ruta2."/".newCode(8).$img2;
		$dir3 = $_FILES["img3"]["tmp_name"];
		$ruta3 = "../upload";
		$ruta3 = $ruta3."/".newCode(8).$img3;


		try {
        $conMySql->openConnection();

        $sql = "INSERT INTO `company` (`idCompany`, `CompanyName`,`CompanyInfo`,`Email`,`Phone`,`img1`,`img2`,`img3`,`FacebookSite`,`InstagramSite`) VALUES ('', '$name', '$info','$email','$phone','$ruta1','$ruta2','$ruta3','$fbSite','$instaSite')";
       $sql2 = "INSERT INTO `company_category` (`idCompany`, `idCategory`) VALUES ((SELECT MAX(idCompany) AS id FROM company),'$category')";

		$execute = mysqli_query($conMySql->getConnection(),$sql);
		$execute2 = mysqli_query($conMySql->getConnection(),$sql2);

		move_uploaded_file($dir,$ruta1);
		move_uploaded_file($dir2,$ruta2);
		move_uploaded_file($dir3,$ruta3);


		$conMySql->closeConnection();
		echo "Datos enviados  ";

		} catch (Exception $e) {
			echo "Error".$e;
		}

	}

	//hacer un relocate para ir a otra página y no quedar en el php
	//editor.datatables.net/generator


?>	
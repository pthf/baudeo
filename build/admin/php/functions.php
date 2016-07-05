<?php

	if(isset($_POST['namefunction'])){
		include("connect_bd.php");
		connect_base_de_datos();
		$namefunction = $_POST['namefunction'];
		switch ($namefunction) {
			case 'logOut':
				logOut();
				break;
			case 'addProjectName':
				addProjectName($_POST['nameCategory']);
				break;
			case 'addProject':
				addProject();
				break;
			case 'modifyProject':
				modifyProject();
				break;
			case 'deleteProject':
				deleteProject($_POST['idProject'], $_POST['idGallery']);
				break;
			case 'deleteImage':
				deleteImage($_POST['idImage']);
				break;
			case 'addImageGalleryProyect':
				addImageGalleryProyect();
				break;
			case 'addImageSlider':
				addImageSlider();
				break;
			case 'deleteImageSlider':
				deleteImageSlider($_POST['idImage']);
				break;
			case 'addService':
				addService();
				break;
			case 'editService':
				editService();
				break;
			case 'addImageGalleryService':
				addImageGalleryService();
				break;
			case 'deleteImageServices':
				deleteImageServices($_POST['idImage']);
				break;
			case 'deleteService':
				deleteService($_POST['idService'], $_POST['idGalleryRelation']);
				break;
			case 'deleteCategory':
				deleteCategory($_POST['idCategory']);
				break;
		}
	}

	function logOut(){
		session_start();
		session_destroy();
	}

	function addProjectName($nameCategory){
		$query = "SELECT idCategory FROM category WHERE nameCategory = '$nameCategory'";
		$result = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result)>0){
			echo 0;
		}else{
			$query = "INSERT INTO category (nameCategory) VALUES('".$nameCategory."')";
			$result = mysql_query($query) or die(mysql_error());
			$query = "SELECT * FROM category ORDER BY nameCategory ASC";
			$result = mysql_query($query) or die(mysql_error());
			while ($line = mysql_fetch_array($result)) {
				echo '<input type="checkbox" name="categoryList[]" value="'.$line["idCategory"].'"></input> '.strtoupper($line["nameCategory"]).'</br>';
			}
		}
	}

	function addProject(){
		parse_str($_POST['data'], $arrayData);
		$query = "INSERT INTO galleryrelationproject (idGalleryRelation) VALUES (NULL)";
		$result = mysql_query($query) or die(mysql_error());
		$idGalleryRelation = mysql_insert_id();
		$query = "INSERT INTO project (titleProject, descriptionProject, idGalleryRelation) VALUES('".$arrayData['project-name']."', '".$arrayData['project-description']."', $idGalleryRelation)";
		$result = mysql_query($query) or die(mysql_error());
		$idProject = mysql_insert_id();
		foreach ($arrayData['categoryList'] as $key => $value) {
			$query = "INSERT INTO project_has_category (idProject, idCategory) VALUES (".$idProject.", ".$value.")";
			$result = mysql_query($query) or die(mysql_error());
		}
	}

	function modifyProject(){
		parse_str($_POST['data'], $arrayData);
		$idProject = $arrayData['project-id'];
		$query = "DELETE FROM project_has_category WHERE idProject = $idProject ";
		$result = mysql_query($query) or die(mysql_error());
		$query = "UPDATE project SET titleProject = '".$arrayData['project-name']."', descriptionProject = '".$arrayData['project-description']."' WHERE idProject =  $idProject";
		$result = mysql_query($query) or die(mysql_error());
		foreach ($arrayData['categoryList'] as $key => $value) {
			$query = "INSERT INTO project_has_category (idProject, idCategory) VALUES (".$idProject.", ".$value.")";
			$result = mysql_query($query) or die(mysql_error());
		}
	}

	function deleteProject($idProject, $idGallery){
		$query = "DELETE FROM imagegalleryproject WHERE idGalleryRelation = $idGallery";
		$result = mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM project_has_category WHERE idProject = $idProject ";
		$result = mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM project WHERE idProject = $idProject ";
		$result = mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM galleryrelationproject WHERE idGalleryRelation = $idGallery ";
		$result = mysql_query($query) or die(mysql_error());
	}

	function deleteImage($idImage){
		$query = "DELETE FROM imagegalleryproject WHERE idImageGallery = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function addImageGalleryProyect(){
		foreach ($_FILES['imageGallery']["name"] as $key => $value) {
			$fileName = $_FILES["imageGallery"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["imageGallery"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["imageGallery"]["type"][$key];
			$fileTemp = $_FILES["imageGallery"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/projects/".$fileName);
			$query = "INSERT INTO  imagegalleryproject (imageGallery, idGalleryRelation) VALUES ('".$fileName."', ".$_POST["idGalleryRelation"].")";
			$result = mysql_query($query) or die(mysql_error());
		}
	}

	function addImageSlider(){
		foreach ($_FILES['imageSlider']["name"] as $key => $value) {
			$fileName = $_FILES["imageSlider"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["imageSlider"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["imageSlider"]["type"][$key];
			$fileTemp = $_FILES["imageSlider"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/slider/".$fileName);
			$query = "INSERT INTO  sliderhome (idSliderHome, imageSliderHome) VALUES (NULL, ".$fileName.")";
			$result = mysql_query($query) or die(mysql_error());
		}
	}

	function deleteImageSlider($idImage){
		$query = "DELETE FROM sliderhome WHERE idSliderHome = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function addService(){
		parse_str($_POST['data'],$arrayData);
		$query = "INSERT INTO galleryrelationservices (idGalleryRelation) VALUES(NULL)";
		$result = mysql_query($query) or die(mysql_error());
		$idGalleryRelation = mysql_insert_id();
		$query = "INSERT INTO services (nameService, titleService, descriptionService, salientService, idGalleryRelation) VALUES ('".$arrayData['service-name']."', '".$arrayData['service-title']."', '".$arrayData['service-description']."', ".$arrayData['service-outstanding'].", ".$idGalleryRelation.")";
		$result = mysql_query($query) or die(mysql_error());
	}

	function addImageGalleryService(){
		foreach ($_FILES['imageGallery']["name"] as $key => $value) {
			$fileName = $_FILES["imageGallery"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["imageGallery"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["imageGallery"]["type"][$key];
			$fileTemp = $_FILES["imageGallery"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/services/".$fileName);
			$query = "INSERT INTO  imagegalleryservices (imageGallery, idGalleryRelation) VALUES ('".$fileName."', ".$_POST["idGalleryRelation"].")";
			$result = mysql_query($query) or die(mysql_error());
		}
	}

	function deleteImageServices($idImage){
		$query = "DELETE FROM imagegalleryservices WHERE idImageGallery = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function editService(){
		parse_str($_POST['data'], $arrayData);
		$idService = $arrayData['service-id'];
		$query = "UPDATE services SET nameService = '".$arrayData['service-name']."', titleService = '".$arrayData['service-title']."', descriptionService = '".$arrayData['service-description']."', salientService = '".$arrayData['service-outstanding']."' WHERE idService =  $idService";
		$result = mysql_query($query) or die(mysql_error());
	}

	function deleteService($idService, $idGalleryRelation){
		$query = "DELETE FROM imagegalleryservices WHERE idGalleryRelation = $idGalleryRelation";
		$result = mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM services WHERE idService = $idService";
		$result = mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM galleryrelationservices WHERE idGalleryRelation = $idGalleryRelation ";
		$result = mysql_query($query) or die(mysql_error());
	}

	function deleteCategory($idCategory){
		$query = "DELETE FROM project_has_category WHERE idCategory = $idCategory";
		$result = mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM category WHERE idCategory = $idCategory";
		$result = mysql_query($query) or die(mysql_error());
	}

<?php
	if(isset($_GET['namefunction'])){
		include("connect_bd.php");
		connect_base_de_datos();
		$namefunction = $_GET['namefunction'];
		switch ($namefunction) {
			case 'getProjectList':
				getProjectList();
				break;
			case 'getProjectById':
				getProjectById($_GET['id']);
				break;
			case 'getCategory':
				getCategory($_GET['id']);
				break;
			case 'getSliderHome':
				getSliderHome();
				break;
			case 'getServicesList':
				getServicesList();
				break;
			case 'getServiceById':
				getServiceById($_GET['id']);
				break;
		}
	}

	function getProjectList(){
		$query = "SELECT * FROM project ORDER BY idProject DESC";
		$result = mysql_query($query) or die(mysql_error());
		$arrayListProjects = array();
		while($line = mysql_fetch_array($result)){
			$idProject = $line['idProject'];
			$query2 = "SELECT * FROM project_has_category
								 INNER JOIN category ON project_has_category.idCategory = category.idCategory
								 WHERE project_has_category.idProject = ".$idProject;
			$result2 = mysql_query($query2) or die(mysql_error());
			$arrayAuxCategories = array();
			while($line2 = mysql_fetch_array($result2)){
				$arrayAux = array(
					'idCategory' => $line2['idCategory'],
					'nameCategory' => $line2['nameCategory']
				);
				array_push($arrayAuxCategories, $arrayAux);
			}
			$idGalleryRelation = $line['idGalleryRelation'];
			$query2 = "SELECT * FROM imagegalleryproject
								 WHERE idGalleryRelation = ".$idGalleryRelation;
			$result2 = mysql_query($query2) or die(mysql_error());
			$arrayAuxGallery = array();
			while($line2 = mysql_fetch_array($result2)){
				$arrayAux = array(
					'idImageGallery' => $line2['idImageGallery'],
					'imageGallery' => $line2['imageGallery']
				);
				array_push($arrayAuxGallery, $arrayAux);
			}
			$arrayAux = array(
					'idProject' => $line['idProject'],
					'titleProject' => $line['titleProject'],
					'descriptionProject' => $line['descriptionProject'],
					'idGalleryRelation' => $line['idGalleryRelation'],
					'elementsGallery' => $arrayAuxGallery,
					'elementsCategory' => $arrayAuxCategories
				);
			array_push($arrayListProjects, $arrayAux);
		}
		echo json_encode($arrayListProjects);
	}

	function getProjectById($id){
		$query = "SELECT * FROM project WHERE idProject = $id ORDER BY idProject DESC";
		$result = mysql_query($query) or die(mysql_error());
		$arrayListProjects = array();
		while($line = mysql_fetch_array($result)){
			$idProject = $line['idProject'];
			$query2 = "SELECT * FROM project_has_category
								 INNER JOIN category ON project_has_category.idCategory = category.idCategory
								 WHERE project_has_category.idProject = ".$idProject;
			$result2 = mysql_query($query2) or die(mysql_error());
			$arrayAuxCategories = array();
			while($line2 = mysql_fetch_array($result2)){
				$arrayAux = array(
					'idCategory' => $line2['idCategory'],
					'nameCategory' => $line2['nameCategory']
				);
				array_push($arrayAuxCategories, $arrayAux);
			}
			$idGalleryRelation = $line['idGalleryRelation'];
			$query2 = "SELECT * FROM imagegalleryproject
								 WHERE idGalleryRelation = ".$idGalleryRelation;
			$result2 = mysql_query($query2) or die(mysql_error());
			$arrayAuxGallery = array();
			while($line2 = mysql_fetch_array($result2)){
				$arrayAux = array(
					'idImageGallery' => $line2['idImageGallery'],
					'imageGallery' => $line2['imageGallery']
				);
				array_push($arrayAuxGallery, $arrayAux);
			}
			$arrayAux = array(
					'idProject' => $line['idProject'],
					'titleProject' => $line['titleProject'],
					'descriptionProject' => $line['descriptionProject'],
					'idGalleryRelation' => $line['idGalleryRelation'],
					'elementsGallery' => $arrayAuxGallery,
					'elementsCategory' => $arrayAuxCategories
				);
			array_push($arrayListProjects, $arrayAux);

		}
		echo json_encode($arrayListProjects);
	}

	function getCategory($id){
		$query = "SELECT * FROM category";
		$result = mysql_query($query) or die(mysql_error());
		$dataCategory = array();
		while($line = mysql_fetch_array($result)){
			$verify = false;
			$query2 = "SELECT * FROM project_has_category WHERE idProject = ".$id." AND idCategory = ".$line['idCategory'];
			$result2 = mysql_query($query2) or die(mysql_error());
			if(mysql_num_rows($result2)>0)
				$verify = true;
			$dataCategory[] = array(
				'idCategory' => $line['idCategory'],
				'nameCategory' => $line['nameCategory'],
				'verify' => $verify
			);
		}
		echo json_encode($dataCategory);
	}

	function getSliderHome(){
		$query = "SELECT * FROM sliderhome ORDER BY idSliderHome DESC";
		$result = mysql_query($query) or die(mysql_error());
		$dataBanners = array();
		while($line = mysql_fetch_array($result)){
			$dataBanners[] = array(
				'idSliderHome' => $line['idSliderHome'],
				'imageSliderHome' => $line['imageSliderHome']
			);
		}
		echo json_encode($dataBanners);
	}

	function getServicesList(){
		$query = "SELECT * FROM services ORDER BY idService DESC";
		$result = mysql_query($query) or die(mysql_error());
		$dataServices = array();
		while($line = mysql_fetch_array($result)){
			$query2 = "SELECT * FROM imagegalleryservices WHERE idGalleryRelation = ".$line['idGalleryRelation'];
			$result2 = mysql_query($query2) or die(mysql_error());
			$auxService = array();
			while($line2 = mysql_fetch_array($result2)){
				$auxService[] = array(
					'idImageGallery' => $line2['idImageGallery'],
					'imageGallery' => $line2['imageGallery']
				);
			}
			$dataServices[] = array(
				'idService' => $line['idService'],
				'nameService' => $line['nameService'],
				'titleService' => $line['titleService'],
				'descriptionService' => $line['descriptionService'],
				'salientService' => $line['salientService'],
				'idGalleryRelation' => $line['idGalleryRelation'],
				'galleryImages' => $auxService
			);
		}
		echo json_encode($dataServices);
	}

	function getServiceById($id){
		$query = "SELECT * FROM services WHERE idService = ".$id;
		$result = mysql_query($query) or die(mysql_error());
		$dataServices = array();
		while($line = mysql_fetch_array($result)){
			$query2 = "SELECT * FROM imagegalleryservices WHERE idGalleryRelation = ".$line['idGalleryRelation'];
			$result2 = mysql_query($query2) or die(mysql_error());
			$auxService = array();
			while($line2 = mysql_fetch_array($result2)){
				$auxService[] = array(
					'idImageGallery' => $line2['idImageGallery'],
					'imageGallery' => $line2['imageGallery']
				);
			}
			$dataServices[] = array(
				'idService' => $line['idService'],
				'nameService' => $line['nameService'],
				'titleService' => $line['titleService'],
				'descriptionService' => $line['descriptionService'],
				'salientService' => $line['salientService'],
				'idGalleryRelation' => $line['idGalleryRelation'],
				'galleryImages' => $auxService
			);
		}
		echo json_encode($dataServices);
	}

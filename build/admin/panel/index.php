<?php
  session_start();
  if(!isset($_SESSION['idAdmin']))
    header("Location: ../index.php");
	else{
	}
?>

<!DOCTYPE html>
<html lang="es" ng-app="baudeoPanel">
<head>
	<title>BAUDEO |  PANEL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="./../src/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./../css/main.css">
</head>
<body>
	<div class="contenedor">
		<div class="menu-nav" style="background: #2E2E2E">
      <menu-nav></menu-nav>
		</div>
		<div class="panel-cont">
			<top-nav></top-nav>
			<div class="viewPanel" ng-view>
			</div>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="./../js/lib/angular.min.js"></script>
	<script src="./../js/lib/angular-route.min.js"></script>
	<script src="./../js/app.js"></script>
	<script src="./../js/controllers.js"></script>
  <script src="./../js/directives.js"></script>
	<script src="./../js/services.js"></script>
</body>
</html>

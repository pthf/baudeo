<?php
  session_start();
  include('../php/connect_bd.php');
  connect_base_de_datos();
  $query = "SELECT * FROM adminuser WHERE idAdminUser = ".$_SESSION['idAdmin'];
  $result = mysql_query($query) or die(mysql_error());
  $line = mysql_fetch_array($result);
?>
<div class="logoNav">
	<img src="./../src/images/logoBaudeo.svg">
</div>
<div class="msgWelcome" style="width: 90%; height: auto; text-align: center; color: #FFF;" >
	<h5 style="display: inline-block; ">Welcome <strong style="color: #FFF;"><?= $line['adminName'] ?></strong>
</div>
<div class="menuNav" ng-controller="menuNavController">
	<div class="row">
		<div class="col-md-12">
      <ul class="nav nav-pills nav-stacked">
  			<li style="background: #61380B; color: #FFF;" role="presentation" ng-class="{active:selected===1}" ng-click="changeNav(1)"><a href="#/projects" style="color: #FFF;"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>Projects</a></li>
  			<li style="background: #61380B; color: #FFF;" role="presentation" ng-class="{active:selected===2}" ng-click="changeNav(2)"><a href="#/services" style="color: #FFF;"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>Services</a></li>
        <li style="background: #61380B; color: #FFF;" role="presentation" ng-class="{active:selected===3}" ng-click="changeNav(3)"><a href="#/slider-home" style="color: #FFF;"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Slider Home</a></li>
  		</ul>
		</div>
	</div>
</div>

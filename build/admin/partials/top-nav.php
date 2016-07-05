<?php
  session_start();
  include('../php/connect_bd.php');
  connect_base_de_datos();
  $query = "SELECT * FROM adminuser WHERE idAdminUser = ".$_SESSION['idAdmin'];
  $result = mysql_query($query) or die(mysql_error());
  $line = mysql_fetch_array($result);
?>
<div class="barTop" style="background: #D8D8D8; border-bottom: 1px solid #848484;">
	<button id="menuha" type="button" class="btn btn-default" aria-label="Left Align" style="margin: 20px; margin-left:10px;">
		<span class="glyphicon glyphicon-menu-hamburger icon-class" aria-hidden="true">
	</button>
  <div class="dropdown" style="margin: 20px; margin-right: 80px;">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><?= $line['adminName'] ?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" class="logout" tabindex="-1" href="#">Log Out <span style="margin-left: 1vw;" class="glyphicon glyphicon-log-out"></span></a></li>
      <!-- <li role="presentation" class="divider"></li> -->
    </ul>
  </div>
</div>

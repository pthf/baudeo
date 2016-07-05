<div class="row" ng-controller="projectNavController">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">BAUDEO PROJECTS</h3>
			</div>
			<div class="panel panel-body" ng-controller="projectDescription">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 1 }"><a ng-click="selectItem(1)">Gallery</a></li>
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 2 }"><a ng-click="selectItem(2)">Edit</a></li>
					<li style="cursor: pointer;" role="presentation" ><a href="#/projects">Back</a></li>
				</ul>
				<div ng-show="item === 1" class="cont-nav">
					<list-project-gallery></list-project-gallery>
				</div>
				<div ng-show="item === 2" class="cont-nav">
					<form-project-edit></form-project-edit>
				</div>
			</div>
		</div>
	</div>
</div>
<div ng-show="!show">
</div>

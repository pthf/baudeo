<div class="row" ng-controller="projectNavController">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">BAUDEO PROJECTS</h3>
			</div>
			<div class="panel panel-body">
				<ul class="nav nav-tabs">
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 1 }"><a ng-click="selectItem(1)">List</a></li>
				  <li style="cursor: pointer;" role="presentation" ng-class="{ active:item === 2 }"><a ng-click="selectItem(2)">Add</a></li>
				</ul>
				<div ng-show="item === 1" class="cont-nav">
          <list-project ng-controller="projectListController"></list-project>
				</div>
				<div ng-show="item === 2" class="cont-nav">
					<form-project></form-project>
				</div>
			</div>
		</div>
	</div>
</div>
<div ng-show="!show">
</div>

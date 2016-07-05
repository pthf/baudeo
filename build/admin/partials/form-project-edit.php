<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();
?>
<div class="row" style="margin-top: 2vw">
	<div class="col-md-10">
		<form class="form-horizontal" id="formProjects" name="" enctype="multipart/form-data">
			<div class="col-md-5">
				<div class="form-group">
					<label for="project-name" class="col-sm-12 control-label">ID Project *</label>
					<input style="display:none;" required type="text" class="form-control" id="project-id" placeholder="Insert a project name" name="project-id" value="{{projectElement[0].idProject}}"></input>
					<div class="col-sm-12">
						<input disabled required type="text" class="form-control" id="project-id" placeholder="Insert a project name" name="project-id" value="{{projectElement[0].idProject}}"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="project-name" class="col-sm-12 control-label">Project Name *</label>
					<div class="col-sm-12">
						<input required type="text" class="form-control" id="project-name" placeholder="Insert a project name" name="project-name" value="{{projectElement[0].titleProject}}"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="project-description" class="col-sm-12 control-label">Project Description *</label>
					<div class="col-sm-12">
						<textarea required type="text" class="form-control" id="project-description" placeholder="Insert a project description" style="height: 220px" name="project-description">{{projectElement[0].descriptionProject}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-12 control-label">Project Category *</label><br>
					<!-- {{projectCategory}} -->
					<div class="col-sm-5" id="projectsCategories">
						<span class="checkbox" ng-repeat="dataCat in projectCategory | filter:dataCat.nameCategory" style="display: block; margin-left: 20%;">
							<input type="checkbox" name="categoryList[]" value="{{dataCat.idCategory}}" ng-checked="dataCat.verify"></input>{{dataCat.nameCategory | uppercase}}</br>
						</span>
						<br>
					</div>
					<div class="col-sm-7">
						<label class="col-sm-12 control-label">Add a new project category *</label><br>
						<div class="col-sm-12">
							<input type="text" class="form-control textNewType" name="" id="project-category-new" placeholder="Insert a new project category"  style="margin-top: 5px; margin-bottom: 5px;" ></input>
							<div class="alert alert-success msg-new" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Done!</strong> A new project category was added.
							</div>
							<div class="alert alert-warning msg-type" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Hey!</strong> Type in a project category.
							</div>
							<div class="alert alert-danger msg-repeat" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Ups!</strong> The project category already exist.
							</div>
							<div class="alert alert-danger msg-error" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
								 <strong>Ups!</strong> A error ocurred.
							</div>
							<input type="button" class="btn btn-primary addTypeDB" value="Add" style="margin-bottom: 10px;"></input>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<button type="button" class="btn btn-danger" onclick="location.reload();">Cancel</button>
					<button type="button" class="btn btn-primary" id="buttonSave">Save</button>
					<div class="alert alert-success msg-newProject" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
						<strong>Done!</strong> A new project was added, look at list tab.
					</div>
				</div>
			</div>
			<input type="submit" style="display: none;" class="submit"></input>
		</form>
	</div>
</div>
<?php
	close_database();
?>

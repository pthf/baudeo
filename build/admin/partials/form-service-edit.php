<div class="row" style="margin-top: 2vw">
	<div class="col-md-10">
		<form class="form-horizontal" id="formServices" name="" enctype="multipart/form-data">
			<div class="col-md-5">
				<div class="form-group">
					<label for="service-name" class="col-sm-12 control-label">Service ID *</label>
					<div class="col-sm-12">
						<input disabled required type="text" class="form-control" placeholder="" value="{{serviceElement[0].idService}}"></input>
						<input required type="text" class="form-control" id="service-id" placeholder="" name="service-id" value="{{serviceElement[0].idService}}" style="display:none"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="service-name" class="col-sm-12 control-label">Service Name *</label>
					<div class="col-sm-12">
						<input required type="text" class="form-control" id="service-name" placeholder="Insert a service name" name="service-name" value="{{serviceElement[0].nameService}}"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="service-title" class="col-sm-12 control-label">Service Title *</label>
					<div class="col-sm-12">
						<input required type="text" class="form-control" id="service-title" placeholder="Insert a service title" name="service-title" value="{{serviceElement[0].titleService}}"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="service-description" class="col-sm-12 control-label">Service Description *</label>
					<div class="col-sm-12">
						<textarea required type="text" class="form-control" id="service-description" placeholder="Insert a service description" style="height: 220px" name="service-description">{{serviceElement[0].descriptionService}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="service-outstanding" class="col-sm-12 control-label">Stand Out Service *</label>
					<div class="col-sm-12">
						<select id="service-outstanding" name="service-outstanding"  class="form-control" required>
							<option value="0" ng-selected="serviceElement[0].salientService == 0">Not outstanding</option>
							<option value="1" ng-selected="serviceElement[0].salientService == 1">Outstanding</option>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<button type="button" class="btn btn-danger" onclick="location.reload();">Cancel</button>
					<button type="button" class="btn btn-primary" id="buttonSave">Save</button>
				</div>
			</div>
			<input type="submit" style="display: none;" class="submit"></input>
		</form>
	</div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
<style type="text/css">
	.widget-body .table thead:first-child>tr  {
    background: repeat-x #F2F2F2;

}
	.widget-body .table tbody>tr>td, thead>tr>th{
		text-align: center;
	}

</style>
<div class="row">
	<div class="col-sm-4 ">
		<div class="shadow">
			<table class="table">
				<thead>
				<tr>
					<th>Type</th><th>Hour</th><th>Cliame</th>
				</tr>
			</thead>
				<tr>
					<th>OT</th><td>30</td><td><span class="btn-success">Activated</span></td>
				</tr>
				<tr>
					<th>Compensatory off</th><td>10</td><td><span class="btn-danger">Deactivated</span></td>
				</tr>
				<tr>
					<th>Extra days</th><td>30</td><td><span class="btn-success">Activated</span></td>
				</tr>
				
			</table>
		</div>
	</div>
	<div class="col-sm-8 ">
		<div class="shadow">
			<div class=" widget-container-col ui-sortable" id="widget-container-col-13">
				<div class="widget-box transparent ui-sortable-handle" id="widget-box-13">
					<div class="widget-header">
						<h4 class="widget-title lighter">Cliame of Dues</h4>

						<div class="widget-toolbar no-border">
							<ul class="nav nav-tabs" id="myTab2">
								<li class="active">
									<a data-toggle="tab" data-tab="ot" href="#ot" aria-expanded="true">OT</a>
								</li>

								<li class="">
									<a data-toggle="tab" data-tab="extra" href="#extra" aria-expanded="false">EXTRA DAYS</a>
								</li>

								<li class="">
									<a data-toggle="tab" data-tab="comp" href="#comp" aria-expanded="false">COMPENSATORY OFF</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main padding-12 no-padding-left no-padding-right">
							<div class="tab-content padding-4">
								<div id="ot" class="tab-pane active">
									<table class="table">
										<thead>
											<tr>
												<th>
													SrNo.
												</th>
												<th>
													Date of OT
												</th>
												<th>
													Total Hour of OT
												</th>
												<th>
													Cliame
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													1
												</td>
												<td>
													1/02/2020
												</td>
												<td>
													2.30
												</td>
												<td >
													<div class="control-group">
														<label>
															<input type="checkbox" class="form-group checkbox" />
														</label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>			
									<div class="form-group center row">
											<div class="col-md-9">
												<button class="btn btn-info" type="button">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn" type="reset">
													<i class="ace-icon fa fa-undo bigger-110"></i>
													Reset
												</button>
											</div>
									</div>
								</div>

								<div id="extra" class="tab-pane">
									<table class="table">
										<thead>
											<tr>
												<th>
													SrNo.
												</th>
												<th>
													Date of OT
												</th>
												<th>
													Total Hour of OT
												</th>
												<th>
													Cliame
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													1
												</td>
												<td>
													1/02/2020
												</td>
												<td>
													2.30
												</td>
												<td >
													<div class="control-group">
														<label>
															<input type="checkbox" class="form-group checkbox" />
														</label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>			
									<div class="form-group center row">
											<div class="col-md-9">
												<button class="btn btn-info" type="button">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn" type="reset">
													<i class="ace-icon fa fa-undo bigger-110"></i>
													Reset
												</button>
											</div>
									</div>
								</div>

								<div id="comp" class="tab-pane">
									<table class="table">
										<thead>
											<tr>
												<th>
													SrNo.
												</th>
												<th>
													Date of OT
												</th>
												<th>
													Total Hour of OT
												</th>
												<th>
													Cliame
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													1
												</td>
												<td>
													1/02/2020
												</td>
												<td>
													2.30
												</td>
												<td >
													<div class="control-group">
														<label>
															<input type="checkbox" class="form-group checkbox" />
														</label>
													</div>
												</td>
											</tr>
										</tbody>
									</table>			
									<div class="form-group center row">
											<div class="col-md-9">
												<button class="btn btn-info" type="button">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn" type="reset">
													<i class="ace-icon fa fa-undo bigger-110"></i>
													Reset
												</button>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript">
			$(document).ready(function () {
    			$('#myTab2 li a').click(function(e) {
    				
       			$('#myTab2 li.active').removeClass('active');
       			$('.tab-content div.active').removeClass('active');

       			 var $parent = $(this).parent();
       			 var tab=$(this).data('tab');
       			 $('#'+tab).addClass('active');
        		$parent.addClass('active');
        
    		}); 
		});

			
</script>
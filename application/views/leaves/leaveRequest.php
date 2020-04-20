
<div class="row">
	<div class="col-sm-4 ">
		<div class="shadow width-100">
			<table class="table">
				<tr>
					<th>Leave Type </th><th>Days</th><th>Balence</th><th>Status</th>
				</tr>
				<tr>
					<th>PL</th><td>30</td><td>30</td><td><span class="btn-success">Activated</span></td>
				</tr>
				<tr>
					<th>SL</th><td>14</td><td>10</td><td><span class="btn-danger">Deactivated</span></td>
				</tr>
				<tr>
					<th>CL</th><td>10</td><td>10</td><td><span class="btn-danger">Deactivated</span></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-sm-8 ">
		<div class="shadow width-100">
			<form class="form-horizontal" action="<?php echo base_url('leave/save');?>" method="POST">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Start date :  </label>

							<div class="col-sm-9 ">
								<input type="date" name="startdate" id="form-field-1" placeholder="date"  />
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> End date : </label>

							<div class="col-sm-9">
								<input type="date" name="enddate" id="form-field-1" placeholder="date"  />
							</div>
						</div>
					</div>
				</div>
				<div class="form-group radio " style="margin-bottom: 5px;">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"  > Leaves Apply For: </label>
					<div class="col-sm-9">
						<label>
							<input name="type" type="radio" class="ace" value="1" />
							<span class="lbl"> PL</span>
						</label>
						<label>
							<input name="type" type="radio" class="ace" value="2" />
							<span class="lbl"> SL</span>
						</label>
						<label>
							<input name="type" type="radio" class="ace" value="3"/>
							<span class="lbl"> CL</span>
						</label>
						<label>
							<input name="type" type="radio" class="ace" value="9"/>
							<span class="lbl"> Other</span>
						</label>
					</div>
				</div>
					
				<div class="form-group center">
					<div class="col-md-9">
						<button class="btn btn-info" type="submit">
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
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="shadow width-100">
			<table class="table" id="leaves">
				<thead>
					<tr>
						<th class="center"> SrNo </th>
						<th class="center"> Leaves Start Date </th>
						<th class="center"> Leaves End Date </th>
						<th class="center"> Day of Leaves </th>
						<th class="center"> Leave Type </th>
						<th class="center"> Leave status </th>
						<th class="center"> Remark </th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if (!empty($result)) {
							$counter=0;
							foreach ($result as $key) {
								$counter++;
								if ($key->leavetype==1) 
									$leaveType="PL";
								elseif ($key->leavetype==2) 
									$leaveType="SL";
								elseif ($key->leavetype==3) 
									$leaveType="CL";
								elseif ($key->leavetype==4) 
									$leaveType="NON-PAID";
								else	
									$leaveType="OTHER";

								if ($key->status==1) 
									$status="Leave Request Send";
								elseif ($key->status==2) 
									$status="Leave Approve By Manager/Superwiser";
								elseif ($key->status==3) 
									$status="Leave Approve By HR";
								elseif ($key->status==4) 
									$status="Leave Reject BY Manager/Superwiser";
								elseif ($key->status==5) 
									$status="Leave Reject By HR";
								else	
									$status="OTHER";

								echo "<tr>
											<td class='center'>".$counter."</td>
											<td class='center'>".$key->leave_start."</td>
											<td class='center'>".$key->leave_end."</td>
											<td class='center'>".$key->total_day_of_leaves."</td>
											<td class='center'>".$leaveType."</td>
											<td class='center'>".$status."</td>
											<td class='center'>".$key->remark."</td>
										</tr>	
									";
							}
						}
					?>
					
				</tbody>
				
			</table>
		</div>
	</div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
<script >
	jQuery(function($) {
	 	$('#leaves').DataTable();
	 });
</script>
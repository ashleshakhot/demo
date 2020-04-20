<div class="row">
	<div class="col-sm-12">
		<div class="shadow width-100">
			<table class="table" id="leaves">
				<thead>
					<tr>
						<th class="center"> SrNo </th>
						<th class="center"> Employee Name </th>
						<th class="center"> Leaves Start Date </th>
						<th class="center"> Leaves End Date </th>
						<th class="center"> Day of Leaves </th>
						<th class="center"> Leave Type </th>
						<th class="center"> Leave status </th>
						
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

								

									echo "<tr>
											<td class='center'>".$counter."</td>
											<td class='center'>".$key->emp_name."</td>
											<td class='center'>".$key->leave_start."</td>
											<td class='center'>".$key->leave_end."</td>
											<td class='center'>".$key->total_day_of_leaves."</td>
											<td class='center'>".$leaveType."</td>
											
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
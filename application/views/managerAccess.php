<div class="row">
	<div class="col-sm-12">
		<div class="shadow width-100">
			<table class="table" id="leaves">
				<thead>
					<tr>
						<th class="center"> SrNo </th>
						<th class="center"> Employee Name </th>
						<th class="center"> Employee Designation </th>
						<th class="center"> Employee Email </th>
						<th class="center"> Employee Phone No. </th>
						<th class="center"> Employee Location </th>
						<th class="center"> Give Access </th>
						
					</tr>
				</thead>
				<tbody>
					
					<?php 
						if (!empty($result)) {
							$counter=0;
							foreach ($result as $key) {
								$counter++;								

									echo "<tr>
											<td class='center'>".$counter."</td>
											<td class='center'>".$key->emp_name."</td>
											<td class='center'>".$key->designation."</td>
											<td class='center'>".$key->email."</td>
											<td class='center'>".$key->phone_no."</td>
											<td class='center'>".$key->location."</td>
											
											<td> <a href='".base_url('manager/giveItToAccess/').$key->empid."'><button class='btn btn-primary'> Set Access</button></a></td>
											

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
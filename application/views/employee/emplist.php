<style type="text/css">
	.block{
		overflow: scroll;
	}
</style>
<div class="row">
	<div class="col-sm-12 ">
		<div class="shadow">
			<div class="block">
				<table class="table">
					<thead>
						<tr>
							<th>Sr No. </th>
							<th>Name</th>
							<th>email</th>
							<th>Phone No</th>
							<th>Joining Date</th>
							<th>Manager Name</th>
							<th>Designation</th>
							<th>Joining Status</th>
							 
							<th>Process</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if (!empty($result)) {
								$counter=0;
								foreach ($result as $key ) {
									$counter++;
									echo "  <tr>
			<td>$counter</td>
			<td>$key->emp_name</td>
			<td>$key->email</td>
			<td>$key->phone_no</td>
			<td>$key->joining_date</td>
			<td>$key->manager_name</td>
			<td>$key->designation</td>
			<td>$key->joining_status</td>
			 
			<td><a href='".base_url('Employee/update/').hash_id($key->empid)."' >
				<span class='btn-success'>edit</span> </a>
				<a href='".base_url('Employee/remove/').hash_id($key->empid)."' >
				<span class='btn-danger'>remove</span></a>
			</td>
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
</div>
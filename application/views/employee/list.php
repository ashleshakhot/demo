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
							<th>Client Name</th>
							<th>Address</th>
							<th>Email</th>
							<th>Phone No.</th>
							<th>Pincode</th>
							<th>PAN Card No.</th>
							<th>HR Name</th>
							<th>HR Email</th>
							<th>HR Phone No.</th>
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
												<td>$key->entity_name</td>
												<td>$key->address</td>
												<td>$key->entity_email</td>
												<td>$key->ph_no</td>
												<td>$key->pin</td>
												<td>$key->entity_pan</td>
												<td>$key->res_person</td>
												<td>$key->res_email</td>
												<td>$key->res_ph</td>
												<td><a href='".base_url('customer/update/').hash_id($key->custid)."' >
													<span class='btn-success'>edit</span> </a>
													<a href='".base_url('customer/remove/').hash_id($key->custid)."' >
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
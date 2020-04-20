<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.min.css" />

<style type="text/css">
	.icon-btn {
  border: none;
  color: white;
  padding: 0px 3px;
  
}
</style>
<div class="row">
	<div class="col-sm-5">
		<!-- <div class="space"></div> -->
		<div class="shadow width-100">
			
			<?php 
				$attributes = array('name' => 'frmRegistration', 'id' => 'form');
				 echo form_open_multipart(base_url('policy/save'),$attributes );?>	
 				<div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-md-6  col-lg-6 ">
                            <label>Policy Name: <span>*</span></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                            <input id="name" type="text" name="policy_name"  placeholder="Policy Name" class="form-control required">
                        </div>
                    </div>                    
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-md-6  col-lg-6 ">
                            <label>Policy Amount: <span>*</span></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                            <input id="amount" type="text" name="policy_amount"  placeholder="Policy Amount" class="form-control required">
                        </div>
                    </div>                    
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-md-6  col-lg-6 ">
                            <label>Policy Description: <span>*</span></label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 ">
                            <input id="desc" type="text" name="policy_desc"  placeholder="Policy Description" class="form-control required">
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>                    
                </div>
                <input type="submit" name="" value="submit" class="btn btn-success">
				</form>
		</div>
	</div>

	<div class="col-sm-7">
		
		<div class="shadow width-100">
			<table id="example" class="table" style="width:100%">
				<thead>
					<th>SrNo</th><th>Policy Name</th><th> Policy Description</th><th>Policy Amount</th><th>Operations</th>
				</thead>
				<tbody>
					<?php 
						if (!empty($result)) {
							$counter=0;
							foreach ($result as $key) {
								$counter++;
								echo "<tr><td>".$counter."</td><td>".$key->policy_name."</td><td>".$key->policy_description."</td><td>".$key->policy_values."</td><td data-id='".$key->sr_no."' data-name='".$key->policy_name."' data-value='".$key->policy_values."' data-desc='".$key->policy_description."'>
															<button  class='edit icon-btn btn-primary'><i class='fa fa-pencil'></i></button>
															<button class=' remove icon-btn btn-danger'><i class='fa fa-close'></i></button></td></tr>";
							}
						}
					?>
				</tbody>
			</table>
		</div>

	</div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>

<script type="text/javascript">
	jQuery(function($) {
	    $('#example').DataTable();
		$('.edit').click(function(){
			var id=$(this).parent('td').data('id'),
				name=$(this).parent('td').data('name'),
				value=$(this).parent('td').data('value'),
				desc=$(this).parent('td').data('desc');
				$('#name').val(name);
				$('#amount').val(value);
				$('#desc').val(desc);
				$('#id').val(id);
				$('#form').attr("action","<?php echo base_url('policy/edit')?>");

		});	
		$('.remove').click(function(){
			 var row = $(this).parents('tr');			
			var id=$(this).parent('td').data('id');
			 $.ajax({
                type: "POST",
                url: "<?php echo base_url('policy/delete');?>",
                data: {id:id},
                success: function(){
                        $(row).remove();
                }
        });
		});		

	});
		</script>
	</body>
</html>

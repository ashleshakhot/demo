<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
<style type="text/css">
	.widget-body .table thead:first-child>tr  {
    background: repeat-x #F2F2F2;

}
	.widget-body .table tbody>tr>td, thead>tr>th{
		text-align: center;
	}
	.mb-10{
		margin-bottom: 10px;
	}

</style>
<div class="row">
	<div class="col-sm-12 ">
		<div class="shadow width-100">
			<div class=" widget-container-col ui-sortable" id="widget-container-col-13">
				<div class="widget-box transparent ui-sortable-handle" id="widget-box-13">
					<div class="widget-header">
						<h4 class="widget-title lighter">Cliame of Reimbursement</h4>

						<div class="widget-toolbar no-border">
							<ul class="nav nav-tabs" id="myTab2">
								
								<li class="active">
									<a data-toggle="tab" data-tab="tab1" href="#tab1" aria-expanded="false">Traveling</a>
								</li>

								<li class="">
									<a data-toggle="tab" data-tab="tab2" href="#tab2" aria-expanded="false">Foods</a>
								</li>
								<li class="">
									<a data-toggle="tab" data-tab="tab3" href="#tab3" aria-expanded="true">Stay</a>
								</li>
								<li class="">
									<a data-toggle="tab" data-tab="tab4" href="#tab4" aria-expanded="true">Other</a>
								</li>


							</ul>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main padding-12 no-padding-left no-padding-right" style=" overflow: auto">
							<div class="tab-content padding-4">
								
								<div id="tab1" class="tab-pane active">
									<div class="well clearfix">
								        <a class="btn btn-primary pull-left add-record1" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
								    </div>
		<form enctype="multipart/form-data" method="POST" action="<?php echo base_url('Reimbursement/saveTravel');?>">
	      <table class="table table-bordered" id="tbl_posts1">
	        <thead>
	          	<tr>
					<th>#</th>
					<th>Travel start place</th>
					<th>Travel end place</th>
					<th>Start date</th>
					<th>End Date</th>
					<th>Travel to Use</th>
					<th>Reason</th>
					<th>Travl Bill Slip</th>
					<th>Travel Bill Amount</th>
					
					<th>Action
					</th>
				</tr>
	        </thead>
	        <tbody id="tbl_posts_body1">
	          <tr id="rec1-1">
	            <td><span class="sn1">1</span>.</td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="start_place[]" placeholder="Start Place Name"  required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="end_place[]" placeholder="End Place Name" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="date" name="start_date[]" placeholder="Start Date" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="date" name="end_date[]" placeholder="End Date" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<select name="type_of_use[]" class="form-group" required="">
								<option value="">None</option>
								<option value="Rikshow">Rikshow</option>
								<option value="Bike">Motar Bike</option>
								<option value="Taxi"> Taxi</option>
								<option value="Car">Car</option>
								<option value="Bus">Bus</option>
								<option value="Railway">Railway</option>
								<option value="Airoplace">Airoplace</option>
								<option value="Other">Other</option>
							</select>
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="reason[]" placeholder=" Reason"  required=""/>
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="file" name="bill_slip[]" placeholder="Bill Slip"  required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="amount[]" placeholder=" Bill amount" class="amount" required="" />
						</div>
					</div>
	            </td>
	            
	            <td><a class="btn btn-xs delete-record1" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
	          </tr>
	           
	          
	        </tbody>
	       
	      </table>
		     <tr>
	           	<td>
	           		<input class="btn btn-primary pull-left add-record3"type="submit" name="Submit">
	           	</td>
	           	</tr>
		 </form>
		<div style="display:none;">
		    <table id="sample_table1">
		      <tr id="">
		       <td><span class="sn1">1</span>.</td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="start_place[]" placeholder="Start Place Name" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="end_place[]" placeholder="End Place Name" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="date" name="start_date[]" placeholder="Start Date"  required=""/>
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="date" name="end_date[]" placeholder="End Date" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<select name="type_of_use[]" class="form-group" required="">
								<option value="">None</option>
								<option value="Rikshow">Rikshow</option>
								<option value="Bike">Motar Bike</option>
								<option value="Taxi"> Taxi</option>
								<option value="Car">Car</option>
								<option value="Bus">Bus</option>
								<option value="Railway">Railway</option>
								<option value="Airoplace">Airoplace</option>
								<option value="Other">Other</option>
							</select>
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="reason[]" placeholder=" Reason" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="file" name="bill_slip[]" placeholder="Bill Slip"  required=""/>
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="amount[]" placeholder=" Bill amount" required="" />
						</div>
					</div>
	            </td>
	            
		       <td><a class="btn btn-xs delete-record1" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
		     </tr>
		       
		   	</table>
		   	 
		</div>
	</div>

								<div id="tab2" class="tab-pane">
									<div class="well clearfix">
								        <a class="btn btn-primary pull-left add-record2" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
								    </div>
	<form enctype="multipart/form-data" method="POST" action="<?php echo base_url('Reimbursement/saveFoodBill');?>">
      <table class="table table-bordered" id="tbl_posts2">
        <thead>
          	<tr>
          		<th>#</th>
				<th>Place</th>			
				<th>Date</th>
				<th>Reason</th>
				<th>Food Bill Slip</th>
				<th>Food Bill Amount</th>						
				<th>Action</th>
			</tr>
        </thead>
        <tbody id="tbl_posts_body2">
          <tr id="rec2-1">
            <td><span class="sn2">1</span>.</td>
            <td>
            	<div class="form-group">		
            		<div class="width-100 ">
						<input type="text" name="place[]" placeholder=" Place Name" required="" />
					</div>
				</div>
            </td>
            <td>
            	<div class="form-group">		
            		<div class="width-100 ">
						<input type="date" name="date[]" placeholder="Start Date" required="" />
					</div>
				</div>
            </td>
            <td>
            	<div class="form-group">		
            		<div class="width-100 ">
						<input type="text" name="reason[]" placeholder=" Reason" required="" />
					</div>
				</div>
            </td>
            <td>
            	<div class="form-group">		
            		<div class="width-100 ">
						<input type="file" name="bill_slip[]" placeholder="Bill Slip" required="" />
					</div>
				</div>
            </td>
            <td>
            	<div class="form-group">		
            		<div class="width-100 ">
						<input type="text" name="amount[]" placeholder=" Bill amount" class="amount" required="" />
					</div>
				</div>
            </td>
            
            <td><a class="btn btn-xs delete-record2" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
          </tr>
          
        </tbody>
       
      </table>
      <tr>
	           	<td>
	           		<input class="btn btn-primary pull-left add-record3"type="submit" name="Submit">
	           	</td>
	           	</tr>
	     
	 </form>
	<div style="display:none;">
	    <table id="sample_table2">
	      <tr id="">
	       <td><span class="sn2">1</span>.</td>
            <td>
            	<div class="form-group">		
            		<div class="width-100 ">
						<input type="text" name="place[]" placeholder=" Place Name"  required=""/>
					</div>
				</div>
            </td>
            <td>
            	<div class="form-group">		
            		<div class="width-100 ">
						<input type="date" name="date[]" placeholder="Start Date"  required=""/>
					</div>
				</div>
            </td>
            <td>
            	<div class="form-group">		
            		<div class="width-100 ">
						<input type="text" name="reason[]" placeholder=" Reason" required="" />
					</div>
				</div>
            </td>
            <td>
            	<div class="form-group">		
            		<div class="width-100 ">
						<input type="file" name="bill_slip[]" placeholder="Bill Slip" required="" />
					</div>
				</div>
            </td>
            <td>
            	<div class="form-group">		
            		<div class="width-100 ">
						<input type="text" name="amount[]" placeholder=" Bill amount" class="amount" required=""  />
					</div>
				</div>
            </td>
            
	       <td>
	       	<a class="btn btn-xs delete-record2" data-id="0"><i class="glyphicon glyphicon-trash"></i>
	       	</a>
	       </td>
	     </tr>
	   	</table>

	</div>
</div>
	<div id="tab3" class="tab-pane ">
		<div class="well clearfix">
	        <a class="btn btn-primary pull-left add-record3" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
	    </div>
		<form enctype="multipart/form-data" method="POST" action="<?php echo base_url('Reimbursement/saveStayBill');?>">
	      <table class="table table-bordered" id="tbl_posts3">
	        <thead>
	          	<tr>
					<th>#</th>
					<th>Place</th>
					<th>Start date</th>
					<th>End Date</th>
					<th>reason</th>
					<th>Lodging Bill slip</th>
					<th>Lodging Amount</th>
					<th>Action</th>
				</tr>
	        </thead>
	        <tbody id="tbl_posts_body3">
	          <tr id="rec3-1">
	            <td><span class="sn3">1</span>.</td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="place[]" placeholder=" Place Name" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="date" name="start_date[]" placeholder="Start Date"  required=""/>
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="date" name="end_date[]" placeholder="End Date" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="reason[]" placeholder=" Reason" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="file" name="bill_slip[]" placeholder="Bill Slip" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		<div class="width-100 ">
							<input type="text" name="amount[]" placeholder=" Bill amount" class="amount" required="" />
						</div>
					</div>
	            </td>
	            
	            <td><a class="btn btn-xs delete-record3" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
	          </tr>
	          
	        </tbody>
	        
	      </table>
		    <tr>
			   	<td>
			   		<input class="btn btn-primary pull-left add-record3"type="submit" name="Submit">
			   	</td>
			</tr>
		 </form>
		<div style="display:none;">
		    <table id="sample_table3">
		      <tr id="">
		       <td><span class="sn3">1</span>.</td>
	            <td>
	            	<div class="form-group">		
	            		<div class="width-100 ">
							<input type="text" name="place[]" placeholder=" Place Name" required=""  />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		
	            		<div class="width-100 ">
							<input type="date" name="start_date[]" placeholder="Start Date" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		
	            		<div class="width-100 ">
							<input type="date" name="end_date[]" placeholder="End Date" required=""  />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		
	            		<div class="width-100 ">
							<input type="text" name="reason[]" placeholder=" Reason" required=""  />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		
	            		<div class="width-100 ">
							<input type="file" name="bill_slip[]" placeholder="Bill Slip" required="" />
						</div>
					</div>
	            </td>
	            <td>
	            	<div class="form-group">		
	            		<div class="width-100 ">
							<input type="text" name="amount[]" placeholder=" Bill amount" class="amount" required="" />
						</div>
					</div>
	            </td>
		       <td><a class="btn btn-xs delete-record3" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
		     </tr>
		   	</table>
		</div>

	</div>
	<div id="tab4" class="tab-pane ">
		<div class="row">
			<div class="col-sm-6">
		<form enctype="multipart/form-data" class="shadow width-100" method="POST" action="<?php echo base_url('Reimbursement/saveOtherReimbursement');?>">
			<h4>Bought a new </h4>
			<hr>
			<div class="form-group row mb-10">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Select Acceseries :  </label>

				<div class="col-sm-9 ">
					<select name="equipment" required="">
						<option value="">None</option>
						<option value="Laptop">Laptop</option>
						<option value="Handset">Handset</option>
						<option value="Other">Other</option>
					</select>
				</div>
			</div>

			<div class="form-group row mb-10">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description :  </label>

				<div class="col-sm-9 ">
					<input type="text" name="desc" id="form-field-1" placeholder="Description" required="" />
				</div>
			</div>
			<div class="form-group row mb-10">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Amount :  </label>

				<div class="col-sm-9 ">
					<input type="text" name="amount" id="form-field-1" placeholder="Description"  required="" />
				</div>
			</div>
			<div class="form-group  center row">
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
	<div class="col-sm-6">
		<form enctype="multipart/form-data" class="shadow width-100" method="POST" action="<?php echo base_url('Reimbursement/saveRecharge');?>">
			<h4>Recharge </h4>
			<hr>
			<div class="form-group row mb-10">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Handeset Number:  </label>

				<div class="col-sm-9 ">
					<input type="text" name="phone_no" id="form-field-1" placeholder="Bill Slip"  required="" />
				</div>
			</div>
			<div class="form-group row mb-10">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bill Slip:  </label>

				<div class="col-sm-9 ">
					<input type="file" name="file" id="form-field-1" placeholder="Bill Slip"  required="" />
				</div>
			</div>
			<div class="form-group row mb-10">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bill Amount  :  </label>

				<div class="col-sm-9 ">
					<input type="text" name="amount" id="form-field-1" placeholder="Bill Amount" required="" />
				</div>
			</div>
			<div class="form-group  center row">
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
		var amount=0;
		$(".amount").keyup(function(){
			 amount =amount + $(this).val();
			 // $('#amount').html(amount);		    
		  });
		$('#myTab2 li a').click(function(e) {
			
			$('#myTab2 li.active').removeClass('active');
			$('.tab-content div.active').removeClass('active');

			 var $parent = $(this).parent();
			 var tab=$(this).data('tab');
			 $('#'+tab).addClass('active');
			$parent.addClass('active');

		}); 
	});
	jQuery(document).delegate('a.add-record1', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#sample_table1 tr'),
     size = jQuery('#tbl_posts1 >tbody >tr').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'rec1-'+size);
     element.find('.delete-record1').attr('data-id', size);
     element.appendTo('#tbl_posts_body1');
     element.find('.sn1').html(size);
   	});

	jQuery(document).delegate('a.delete-record1', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      jQuery('#rec1-' + id).remove();
      
    //regnerate index number on table
    $('#tbl_posts_body1 tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn1').html(index+1);
    });
    return true;
  } else {
    return false;
  }
});
  jQuery(document).delegate('a.add-record2', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#sample_table2 tr'),
     size = jQuery('#tbl_posts2 >tbody >tr').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'rec2-'+size);
     element.find('.delete-record2').attr('data-id', size);
     element.appendTo('#tbl_posts_body2');
     element.find('.sn2').html(size);
   	});

	jQuery(document).delegate('a.delete-record2', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      jQuery('#rec2-' + id).remove();
      
    //regnerate index number on table
    $('#tbl_posts_body2 tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn2').html(index+1);
    });
    return true;
  } else {
    return false;
  }
});
  jQuery(document).delegate('a.add-record3', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#sample_table3 tr'),
     size = jQuery('#tbl_posts3 >tbody >tr').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'rec3-'+size);
     element.find('.delete-record3').attr('data-id', size);
     element.appendTo('#tbl_posts_body3');
     element.find('.sn3').html(size);
   	});

	jQuery(document).delegate('a.delete-record3', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      jQuery('#rec3-' + id).remove();
      
    //regnerate index number on table
    $('#tbl_posts_body3 tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn3').html(index+1);
    });
    return true;
  } else {
    return false;
  }
});

			
</script>
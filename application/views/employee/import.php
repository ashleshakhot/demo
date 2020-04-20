<?php 
$attributes = array('name' => 'frmRegistration', 'id' => 'signup-form');
 echo form_open_multipart(base_url('employee/save'),$attributes );?>	
				
					<div class="form-group">
						<div class="col-xs-12">							
							<?php
							    $arr_image = array(
							        'name'  => 'file',
							        'id'  => 'userfile',
							        'class' =>'id-input-file-3',
							        'value' => ''
							    );
							    echo form_upload($arr_image);
							?>
						</div>
					</div>
				

			
				<input class="btn btn-primary btn-sm " type="submit" name="submit" value="Upload">
					
				<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
				

				<button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Cancel
				</button>
			<?php echo form_close();
			 ?>
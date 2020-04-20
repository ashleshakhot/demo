<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.min.css" />


<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row">
			<div class="col-sm-6">
				<div class="shadow width-100">
					<h5><b>mport Excel File</b></h5>
					<hr>
					<form action="<?php echo base_url('holiday/import');?>" method="POST" enctype="multipart/form-data">
					<input type="file" name="file">
					<input type="submit" class="btn btn-success" value="submit">
						
					</form>

				</div>
			</div>
			<div class="col-sm-6">
				<div class="shadow width-100">
					<h5><b>Weekly Holidays</b></h5>
					<hr>
					<form action="<?php echo base_url('holiday/weekoff');?>" method="POST" >
					<select multiple="" class="chosen-select form-control" id="form-field-select-4" name="days[]" data-placeholder="Choose a State...">
						<option value="0">Monday</option>
						<option value="1">Tuesday</option>
						<option value="2">Wednesday</option>
						<option value="3">Thursday</option>
						<option value="4">Friday</option>
						<option value="5">Saturday</option>
						<option value="6">Sunday</option>
						
					</select>
					<input type="submit" class="btn btn-success" value="submit">
				</form>
				</div>
			</div>
			
			
		</div>
		<div class="row">
			<div class="col-sm-6">
				<!-- <div class="space"></div> -->
				<div class="shadow width-100">
					<div id="calendar"></div>
				</div>
			</div>

			<div class="col-sm-6">
				
				<div class="shadow width-100">
					<table id="example" class="table" style="width:100%">
						<thead>
							<th>SrNo</th><th>Holiday Name</th><th> Date</th>
						</thead>
						<tbody>
							<?php 
								if (!empty($result)) {
									$counter=0;
									foreach ($result as $key) {
										$counter++;
										echo "<tr><td>".$counter."</td><td>".$key['title']."</td><td>".$key['start']."</td></tr>";
									}
								}
							?>
						</tbody>
					</table>
				</div>

			</div>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->




<div class="modal fade" id="successModal" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Modal Header</h4>
		  </div>
		  <div class="modal-body">
			  	<?php echo form_open( base_url( 'holiday' ), array( 'id' => 'login-form', 'class' => 'login' ) );
					?>
				    <div class="form-group">
				      <label for="eventtitle">Event Title:</label>
				      <input type="eventTitle" name="eventTitle" class="form-control" id="eventTitle" required="">
				      <input type="hidden" name="eventDate" class="form-control" id="eventDate">
				    </div>
				    <button type="submit" value="submit" name="submit" class="btn btn-default">Submit</button>
			  	</form>
		  </div>
		</div>
	</div>
</div>



<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootbox.js"></script>
<script type="text/javascript">
			jQuery(function($) {
			    $('#example').DataTable();
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			

/* initialize the external events
	-----------------------------------------------------------------*/

	$('#external-events div.external-event').each(function() {

		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});




	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();


	var calendar = $('#calendar').fullCalendar({
		//isRTL: true,
		//firstDay: 1,// >> change first day of week 
		
		buttonHtml: {
			prev: '<i class="ace-icon fa fa-chevron-left"></i>',
			next: '<i class="ace-icon fa fa-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'm'
		},
		events:<?php echo $events;?>,
		
		
		editable: false,
		droppable: false, // this allows things to be dropped onto the calendar !!!
		
		selectable: true,
		selectHelper: true,
		dayClick: function(date, jsEvent, view) {
	        $("#successModal").modal("show");
	        $("#eventDate").val(date.format());
	      }
		
		
	});
// console.log(calendar);


});
		</script>
	</body>
</html>

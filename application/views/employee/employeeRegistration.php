<script src="<?php echo base_url();?>assets/scripts/angular.min.js"></script>
 <!-- <script src="http://code.jquery.com/jquery-1.10.2.js"></script> -->
 <script src="<?php echo base_url();?>assets/scripts/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/form_wizard/css/style1.css');?>">
<script src="<?php echo base_url();?>assets/plugins/validation.js"></script>
<script>
$(document).ready(function() {
    $("#signup-form").validate({
        rules: {
            emp_id: "required",
            emp_name:"required",
            comp_name:"required",
            comp_landmark:"required",
            comp_state:"required",
            
            date:{date:true},            
            emp_phone:{phone:true},
            emp_mail:{email:true},
            gross:"required",
            ctc:"required",
            net:"required",
            designation:"required",
            dob:"required",
            gender:"required",
            blood:"required",
            emp_adhar:"required",
            voting:"required",
            pan:"required",
            ephone:{phone:true},
            ename:"required",
            father_name:"required",
            married:"required",
             

            hr_ex_name:"required",
            mphone:{phone:true},
            hr_ex_mail:{email:true},

            hr_mg_name:"required",
            hphone:{phone:true},
            hr_mg_mail:{email:true},

            hr_vp_name:"required",
            hr_vp_phone:{phone:true},
            hr_vp_mail:{email:true},

            sp_ex_name:"required",
            sp_ex_phone:{phone:true},
            sp_ex_mail:{email:true},

             sp_mg_name:"required",
            sp_mg_phone:{phone:true},
            sp_mg_mail:{email:true},

            sp_vp_name:"required",
            sp_vp_phone:{phone:true},
            sp_vp_mail:{email:true},

            

        },
        messages: {
            emp_name: "Please Enter Employee Name",
            comp_name : "Please Enter Company Name" 
             

        }
    })

    $('.comp-next').click(function() {
        $("#signup-form").valid();
    });
});
    jQuery.validator.addMethod("pan", function(value, element)
        {
            return this.optional(element) || /^[a-zA-Z]{5}\d{4}[a-zA-Z]{1}$/.test(value);
        }, "Please enter a valid PAN");
    jQuery.validator.addMethod("phone", function(value, element)
        {
            return this.optional(element) || /^\d{10}$/.test(value);
        }, "Please enter a valid phone number");
    jQuery.validator.addMethod("pin", function(value, element)
    {
        return this.optional(element) || /^\d{6}$/.test(value);
    }, "Please enter a valid pincode number");




 $('.numeric').on('input', function (event) { 
    this.value = this.value.replace(/[^0-9]/g, '');
    });           
</script>
<div style=" border-radius: 25px;
   
  padding: 10px; 
   ">
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
         </div>
<div ng-app="" >             
    
    <div class=" form-wizard">                  
                    <!-- Form Wizard -->
        <form id="signup-form" method="POST" name="frmRegistration" action="<?php echo base_url('Employee/saveEmployee');?>"  >
       
            <!-- Form progress -->
            <div class="form-wizard-steps form-wizard-tolal-steps-4">
                <div class="form-wizard-progress">
                    <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                </div>
                <!-- Step 1 -->
                <div class="form-wizard-step active">
                    <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <p>Employee Detatils</p>
                </div>
                <!-- Step 1 -->
                
                <!-- Step 2 -->
                <div class="form-wizard-step">
                    <div class="form-wizard-step-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                    <p>Family Background</p>
                </div>
                <!-- Step 2 -->
                
                <!-- Step 3 -->
                <div class="form-wizard-step">
                    <div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                    <p>Previous Experience</p>
                </div>
                
                <!-- Step 3 -->
                
                <!-- Step 4 -->
                <div class="form-wizard-step">
                    <div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    <p>Confirmation</p>
                </div>
                <!-- Step 4 -->
            </div>
            <!-- Form progress -->
        
        
            <!-- Form Step 1 -->

            <fieldset>

                <h4><span>Step 1 - 4</span></h4>                   
                <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Employee Name: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="emp_name" id="emp_name" ng-model="emp_name" placeholder="Employee Name" class="form-control required">
                                </div>
                            </div>
                            <span class="error" id="emp_name-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label> Employee ID: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="emp_id"  title="Please Fill valid Match like (UNH000470) " id="emp_id" ng-model="emp_id" ng-init="emp_id=''" value=""placeholder="Employee ID" class="form-control required" style="text-transform: uppercase;">
                                </div>
                            </div>
                             <span class="error" id="emp_id-error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Company Name: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="comp_name" id="comp_name" ng-model="comp_name" placeholder="Company Name" class="form-control required" readonly="" value="<?php echo($company[0]['entity_name']);?>" ng-init="comp_name='<?php echo ($company[0]['entity_name']);?>'"
                                    >
                                </div>
                            </div>
                            <span class="error" id="comp_name-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Company Location: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="comp_landmark" id="comp_landmark" ng-model="comp_landmark" placeholder="Company Location" class="form-control required" value="<?php echo($company[0]['address']);?>" ng-init="comp_landmark='<?php echo ($company[0]['address']);?>'" readonly>
                                </div>
                            </div>
                            <span class="error" id="comp_landmark-error"></span>
                        </div>
                     </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>State: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">                                    
                                    <select name="comp_state" id="comp_state" class="form-control required" ng-model="comp_state">          
                                        <option value="Andhra Pradesh" selected>Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manupur">Manupur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="TamilNadu">TamilNadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bangal">West Bangal</option>
                                                                                                             
                                    </select>
                                </div>
                            </div>
                            <span class="error" id="comp_state-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Joining Date: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="date" name="date" ng-model="date" id="date" placeholder="Enter Pincode" class="form-control required">
                                    <span class="date-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Employee Phone Number: <span>*</span></label>
                            </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="emp_phone" id="emp_phone" ng-model="emp_phone" placeholder="Employee Phone Number" class="form-control numeric required" >
                                </div>
                            </div>
                            <span class="error" id="emp_phone-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Email address: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="emp_mail" ng-model="emp_mail" id="emp_mail" placeholder="Employee Email Address" class="form-control required">
                                </div>
                            </div>
                            <span class="error" id="emp_mail-error"></span>

                        </div>
                    </div>
                </div>              
                <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Gross: <span>*</span></label>
                            </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="gross" id="gross" ng-model="gross" placeholder="Enter Gross" class="form-control numeric " >
                                </div>
                            </div>
                            <span class="error" id="gross-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>CTC : <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="ctc" ng-model="ctc" id="ctc" placeholder="Enter CTC" class="form-control ">
                                </div>
                            </div>
                            <span class="error" id="ctc-error"></span>

                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>net:<span>*</span> </label>
                            </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="net" id="net" ng-model="net" placeholder="Enter NET Amount" class="form-control numeric " >
                                </div>
                            </div>
                            <span class="error" id="net-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Designation : <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="designation" ng-model="designation" id="designation" placeholder="Enter Designation" class="form-control ">
                                </div>
                            </div>
                            <span class="error" id="designation-error"></span>

                        </div>
                    </div>
                </div> 
                 <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Gender:<span>*</span> </label>
                            </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                     
                                    <select name="gender" id="gender" class="form-control required" ng-model="gender" required="">  
                                        <option value="Male" selected>Male</option>
                                        <option value="Female" selected>Female</option>
                                        <option value="Other" selected>Other</option>
                                    </select>
                                </div>
                            </div>
                            <span class="error" id="gender-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Employee DOB :<span>*</span> </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="date" name="dob" ng-model="dob" id="dob" placeholder="Enter Designation" class="form-control ">
                                </div>
                            </div>
                            <span class="error" id="dob-error"></span>

                        </div>
                    </div>
                </div> 
                 <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Blood Group: <span>*</span></label>
                            </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                     
                                     <select name="blood" id="blood" class="form-control required" ng-model="blood" required="">  
                                        <option value="A+" selected>A+</option>
                                        <option value="A-" selected>A-</option>
                                        <option value="B+" selected>B+</option>
                                        <option value="B-" selected>B-</option>
                                        <option value="O+" selected>O+</option>
                                        <option value="O-" selected>O-</option>
                                        <option value="AB+" selected>AB+</option>
                                        <option value="AB-" selected>AB-</option>
                                    </select>
                                </div>
                            </div>
                            <span class="error" id="blood-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Adhar No : <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="emp_adhar" ng-model="emp_adhar" id="emp_adhar" placeholder="Enter Employee Adhar No" class="form-control ">
                                </div>
                            </div>
                            <span class="error" id="emp_adhar-error"></span>

                        </div>
                    </div>
                </div> 
                 <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Voting Card No: <span>*</span></label>
                            </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                     <input type="text" name="voting" id="voting" ng-model="voting" placeholder="Enter Voting Card No" class="form-control numeric " > 
                                </div>
                            </div>
                            <span class="error" id="voting-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Pan Card :<span>*</span> </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="pan" ng-model="pan" id="pan" placeholder="Enter Employee PAN No" class="form-control ">
                                </div>
                            </div>
                            <span class="error" id="pan-error"></span>

                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Driving Licence: </label>
                            </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                     <input type="text" name="driving" id="driving" ng-model="driving" placeholder="Enter Driving Licence No" class="form-control numeric " > 
                                </div>
                            </div>
                            <span class="error" id="driving-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Passport No : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="passport" ng-model="passport" id="passport" placeholder="Enter Employee Passport No" class="form-control ">
                                </div>
                            </div>
                            <span class="error" id="passport-error"></span>

                        </div>
                    </div>
                </div>  
                 <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Emergency Contact No:<span>*</span> </label>
                            </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                     <input type="text" name="ephone" id="ephone" ng-model="ephone" placeholder="Enter Emergency Contact No" class="form-control numeric " > 
                                </div>
                            </div>
                            <span class="error" id="ephone-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Emegency Contact Name:<span>*</span> </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="ename" ng-model="ename" id="ename" placeholder="Enter Emegency Contact Name" class="form-control ">
                                </div>
                            </div>
                            <span class="error" id="ename-error"></span>

                        </div>
                    </div>
                </div>     
                <div class="form-wizard-buttons">
                    <button type="button" class="btn btn-next comp-next" style="background-color: #044f7d!important;">Next</button>
                </div>
            </fieldset>
                        <!-- Form Step 1  completed-->

                        <!-- Form Step 2 started-->
            <fieldset>
                <h4><span>Step 2 - 4</span></h4>
                <h3>Father Details</h3> 
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Father Name : <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text"  name="father_name" ng-model="father_name" id="father_name"  placeholder="Enter Father Name" class="form-control required">
                                <span class="error" id="father_name-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Father DOB: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="date" name="fatherDOB" ng-model="fatherDOB" id="fatherDOB"  placeholder="Enter Phone Number" class="form-control required">
                                <span class="error" id="fatherDOB-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Father Adhar No: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="fatheradhar" ng-model="fatheradhar" id="fatheradhar"  placeholder="Enter Father Adhar No" class="form-control required">
                                <span class="error" id="fatheradhar-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>
                <h3>Mother Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Mother Name : <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="mother_name" ng-model="mother_name" id="mother_name" placeholder="Enter Mother Name" class="form-control required">
                                <span class="error" id="mother_name-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Mother DOB: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="date" name="motherDOB" ng-model="motherDOB" id="motherDOB" placeholder="Enter Phone Number" class="form-control required">
                                <span class="error" id="motherDOB-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Mother Adhar No: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="motheradhar" ng-model="motheradhar" id="motheradhar" placeholder="Enter Mother Adhar No" class="form-control required">
                                <span class="error" id="motheradhar-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>
                  <h3>  </h3>  
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Married Status : <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                
                                <select name="married" id="married" class="form-control required" ng-model="married" required="">  
                                        <option value="Yes" selected>Yes</option>
                                        <option value="No" selected>No</option>
                                    </select>
                                <span class="error" id="married-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Spouse Name: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="spousename" ng-model="spousename" id="spousename" placeholder="Enter Spouse Name Number" class="form-control ">
                                <span class="error" id="spousename-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Spouse DOB: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="date" name="spouseDOB" ng-model="spouseDOB" id="spouseDOB" placeholder="Enter Spouse DOB  " class="form-control ">
                                <span class="error" id="spouseDOB-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Spouse Adhar No: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="spouseAdhar" ng-model="spouseAdhar" id="spouseAdhar" placeholder="Enter Spouse Adhar  " class="form-control ">
                                <span class="error" id="spouseAdhar-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>
                      <div class="row">
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>First Daughter Name: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="fdname" ng-model="fdname" id="fdname" placeholder="Enter First Daughter Name " class="form-control">
                                <span class="error" id="fdname-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>First Duaghter DOB: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="date" name="fdDOB" ng-model="fdDOB" id="fdDOB" placeholder="Enter fdDOB DOB  " class="form-control ">
                                <span class="error" id="fdDOB-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>First Duaghter Adhar No: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="fdadhar" ng-model="fdadhar" id="fdadhar" placeholder="Enter First Duaghter Adhar  " class="form-control ">
                                <span class="error" id="fdadhar-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>
                      <div class="row">
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Second Daughter Name: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="sdname" ng-model="sdname" id="sdname" placeholder="Enter Second Daughter Name " class="form-control ">
                                <span class="error" id="sdname-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Second Duaghter DOB: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="date" name="sdDOB" ng-model="sdDOB" id="sdDOB" placeholder="Enter sdDOB DOB  " class="form-control ">
                                <span class="error" id="sdDOB-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Second Duaghter Adhar No: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="sdadhar" ng-model="sdadhar" id="sdadhar" placeholder="Enter Second Duaghter Adhar  " class="form-control ">
                                <span class="error" id="sdadhar-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>
                      <div class="row">
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>First Son Name:  </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="fsname" ng-model="fsname" id="fsname" placeholder="Enter First Son Name " class="form-control ">
                                <span class="error" id="fsname-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>First Son DOB:  </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="date" name="fsDOB" ng-model="fsDOB" id="fsDOB" placeholder="Enter fsDOB DOB  " class="form-control ">
                                <span class="error" id="fsDOB-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>First Son Adhar No:  </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="fsadhar" ng-model="fsadhar" id="fsadhar" placeholder="Enter First Son Adhar  " class="form-control ">
                                <span class="error" id="fsadhar-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>
                      <div class="row">
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Second Son Name:  </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="ssname" ng-model="ssname" id="ssname" placeholder="Enter Second Son Name " class="form-control ">
                                <span class="error" id="ssname-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Second Son DOB:  </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="date" name="ssDOB" ng-model="ssDOB" id="ssDOB" placeholder="Enter ssDOB DOB  " class="form-control ">
                                <span class="error" id="ssDOB-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Second Son Adhar No:  </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="ssadhar" ng-model="ssadhar" id="ssadhar" placeholder="Enter Second Son Adhar  " class="form-control    ">
                                <span class="error" id="ssadhar-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>





                
                <div class="form-wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next" style="background-color: #044f7d!important;">Next</button>
                </div>
            </fieldset>
            <!-- Form Step 2 completed-->

            <!-- Form Step 3 started-->
            <fieldset>

                <h4><span>Step 3 - 4</span></h4>

                 <h3>Qualification</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Highest Education : <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text"  name="qualification" ng-model="qualification" id="qualification"  placeholder="Enter Highest Qualification" class="form-control required">
                                 <span class="error" id="qualification-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>University:</label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="university" ng-model="university" id="university"placeholder="Enter University Name" class="form-control ">
                                 <span class="error" id="university-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                           <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <!-- <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Email: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="email" name="sp_ex_mail" ng-model="sp_ex_mail" id="sp_ex_mail" placeholder="Enter Email address" class="form-control required">
                                 <span class="error" id="sp_ex_mail-error"></span>
                                 </div>
                                </div>
                            </div> -->
                         </div>  
                     </div>
                <h3>Previous Experience</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Company Name : </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text"name="precomp" ng-model="precomp" id="precomp"  placeholder="Enter Previous Company Name" class="form-control ">
                                 <span class="error" id="precomp-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Previous Exeperience: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="preexp" ng-model="preexp" id="preexp" placeholder="Enter Previous Exeperience" class="form-control ">
                                 <span class="error" id="preexp-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Total Experience: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="totalexp" ng-model="totalexp" id="totalexp" placeholder="Enter Total Experience" class="form-control ">
                                 <span class="error" id="totalexp-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                     </div>
                <h3>Referance Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Referance Name : </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="rname" ng-model="rname" id="rname" placeholder="Enter Referance  Name" class="form-control ">
                                 <span class="error" id="rname-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Referance Address: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="raddress" ng-model="raddress" id="raddress" placeholder="Enter Referance Address" class="form-control ">
                                 <span class="error" id="raddress-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Referance Phone:  </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="rphone" ng-model="rphone" id="rphone" placeholder="Enter Referance Phone" class="form-control ">
                                 <span class="error" id="rphone-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                </div>
                <h3>Bank Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Bank Name :<span>*</span> </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="bname" ng-model="bname" id="bname" placeholder="Enter Bank Name" class="form-control required">
                                 <span class="error" id="bname-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Account Number:<span>*</span> </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="accountno" ng-model="accountno" id="accountno" placeholder="Enter Account Number" class="form-control required">
                                 <span class="error" id="accountno-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>IFSC:<span>*</span> </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="ifsc" ng-model="ifsc" id="ifsc" placeholder="Enter IFSC Code" class="form-control required">
                                 <span class="error" id="ifsc-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                </div>
                <h3>PF Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>UAN No : </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="uno" ng-model="uno" id="uno" placeholder="Enter UAN Number" class="form-control ">
                                 <span class="error" id="uno-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>PF Number: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="pfno" ng-model="pfno" id="pfno" placeholder="Enter PF Number" class="form-control ">
                                 <span class="error" id="pfno-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>ESIC:  </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="esic" ng-model="esic" id="esic" placeholder="Enter ESIC Code" class="form-control ">
                                 <span class="error" id="esic-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                </div>
                <h3> </h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Last Working Date: </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="date" name="ldate" ng-model="ldate" id="ldate"  class="form-control ">
                                 <span class="error" id="ldate-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Joining Status:<span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="joiningstatus" ng-model="joiningstatus" id="joiningstatus" placeholder="Enter Joining Status" class="form-control required">
                                 <span class="error" id="joiningstatus-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                             
                         </div>
                </div>
                <h3>Manager Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Manager Name :<span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="mname" ng-model="mname" id="mname" placeholder="Enter Manager Name" class="form-control required">
                                 <span class="error" id="mname-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Manager Phone:<span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="mphone" ng-model="mphone" id="mphone" placeholder="Enter Manager Phone Number" class="form-control required ">
                                 <span class="error" id="mphone-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Manager Email:<span>*</span> </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="email" name="memail" ng-model="memail" id="memail" placeholder="Enter Manager Email" class="form-control required">
                                 <span class="error" id="memail-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                </div>
                <h3>HR Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>HR Name :<span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="hname" ng-model="hname" id="hname" placeholder="Enter HR Name" class="form-control required">
                                 <span class="error" id="hname-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>HR Phone:<span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="hphone" ng-model="hphone" id="hphone" placeholder="Enter HR Phone Number" class="form-control required ">
                                 <span class="error" id="hphone-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>HR Email:<span>*</span> </label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="email" name="hemail" ng-model="hemail" id="hemail" placeholder="Enter HR Email" class="form-control required">
                                 <span class="error" id="hemail-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                </div>
                 <h3>Address</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Current Address :<span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="caddress" ng-model="caddress" id="caddress" placeholder="Enter Current Address" class="form-control required">
                                 <span class="error" id="caddress-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Permanant Address:<span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="paddress" ng-model="paddress" id="paddress" placeholder="Enter Permanant Address" class="form-control required ">
                                 <span class="error" id="paddress-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Nominee Name:<span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="nname" ng-model="nname" id="nname" placeholder="Enter Nominee Name" class="form-control required">
                                 <span class="error" id="nname-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                </div>



                    
            
                <div class="form-wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="button" class="btn btn-next" style="background-color: #044f7d!important;">Next</button>
                </div>
            </fieldset>
            <!-- Form Step 3 -->
            
            <!-- Form Step 4 -->
            <fieldset>

                <h4> <span>Step 4 - 4</span></h4>

                <div style="clear:both;"></div>
                    <h3>*** Employee  Information ***</h3>
                

                 <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Employee Name : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{emp_name}}</strong></span>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Employee Id : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{emp_id}}</strong></span>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Company Name : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{comp_name}}</strong></span>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Company Location : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{comp_landmark}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Company State : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{comp_state}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label> Joining Date: </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{date}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Employee Phone No : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{emp_phone}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Employee Mail Address : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{emp_mail}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>GROSS : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{gross}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>CTC : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{ctc}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>NET : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{net}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Designation : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{designation}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Gender : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{gender}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Employee DOB : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{dob}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Blood Group : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{blood}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Adhar No : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{emp_adhar}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Voting Card No : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{voting}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Pan Card : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{pan}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Driving Licence : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{driving}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Passport No: </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{passport}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Emergency Contact No: </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{ephone}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Emegency Contact Name: </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{ename}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                </div>

               <h3>*** Family Background ***</h3>

                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Father Name: </label><span class="form-control"><strong>{{father_name}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Father DOB : </label><span class="form-control"><strong>{{fatherDOB}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Father Adhar No: </label><span class="form-control"><strong>{{fatheradhar}}</strong></span>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label> Mother Name: </label><span class="form-control"><strong>{{mother_name}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Mother DOB: </label><span class="form-control"><strong>{{motherDOB}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Mother Adhar No: </label><span class="form-control"><strong>{{motheradhar}}</strong></span>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Married Status: </label><span class="form-control"><strong>{{married}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Spouse Name : </label><span class="form-control"><strong>{{spousename}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Spouse DOB: </label><span class="form-control"><strong>{{spouseDOB}}</strong></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Married Status: </label><span class="form-control"><strong>{{married}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Spouse Adhar No: </label><span class="form-control"><strong>{{spouseAdhar}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>First Daughter Name: </label><span class="form-control"><strong>{{fdname}}</strong></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>First Duaghter DOB: </label><span class="form-control"><strong>{{fdDOB}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>First Duaghter Adhar No: </label><span class="form-control"><strong>{{fdadhar}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Second Daughter Name: </label><span class="form-control"><strong>{{sdname}}</strong></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Second Duaghter DOB: </label><span class="form-control"><strong>{{sdDOB}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>First Duaghter Adhar No: </label><span class="form-control"><strong>{{fdadhar}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Second Duaghter Adhar No: </label><span class="form-control"><strong>{{sdadhar}}</strong></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Second Duaghter DOB: </label><span class="form-control"><strong>{{sdDOB}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>First Son Name: </label><span class="form-control"><strong>{{fsname}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>First Son DOB: </label><span class="form-control"><strong>{{fsDOB}}</strong></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>First Son Adhar No: </label><span class="form-control"><strong>{{fsadhar}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Second Son Name: </label><span class="form-control"><strong>{{ssname}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Second Son DOB: </label><span class="form-control"><strong>{{ssDOB}}</strong></span>
                        </div>
                    </div>
                      <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Second Son Adhar No: </label><span class="form-control"><strong>{{ssadhar}}</strong></span>
                        </div>
                    </div>
                </div>


                <h3>*** Previous Experience ***</h3>
                 <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Highest Education: </label><span class="form-control"><strong>{{qualification}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>University: </label><span class="form-control"><strong>{{university}}</strong></span>
                        </div>
                    </div>
                </div>
                    
                 <h3>Previous Experience</h3>
                 <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Company Name: </label><span class="form-control"><strong>{{precomp}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Previous Exeperience: </label><span class="form-control"><strong>{{preexp}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Total Experience : </label><span class="form-control"><strong>{{totalexp}}</strong></span>
                        </div>
                    </div>
                </div>
                <h3>Referance Details</h3>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Referance Name: </label><span class="form-control"><strong>{{rname}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Referance Address : </label><span class="form-control"><strong>{{raddress}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Referance Phone: </label><span class="form-control"><strong>{{rphone}}</strong></span>
                        </div>
                    </div>
                </div>
                 <h3>Bank Details</h3>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Bank Name: </label><span class="form-control"><strong>{{bname}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Account Number: </label><span class="form-control"><strong>{{accountno}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>IFSC: </label><span class="form-control"><strong>{{ifsc}}</strong></span>
                        </div>
                    </div>
                </div>
                <h3>PF Details</h3>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>UAN No: </label><span class="form-control"><strong>{{uno}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>PF Number: </label><span class="form-control"><strong>{{pfno}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>ESIC: </label><span class="form-control"><strong>{{esic}}</strong></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Last Working Date: </label><span class="form-control"><strong>{{ldate}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Joining Status: </label><span class="form-control"><strong>{{joiningstatus}}</strong></span>
                        </div>
                    </div>
                     
                </div>
                <h3>Manager Details</h3>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Manager Name: </label><span class="form-control"><strong>{{mname}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Manager Phone: </label><span class="form-control"><strong>{{mphone}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Manager Email: </label><span class="form-control"><strong>{{memail}}</strong></span>
                        </div>
                    </div>
                </div>
                <h3>HR Details</h3>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>HR Name: </label><span class="form-control"><strong>{{hname}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>HR Phone: </label><span class="form-control"><strong>{{hphone}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>HR Email: </label><span class="form-control"><strong>{{hemail}}</strong></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Current Address: </label><span class="form-control"><strong>{{caddress}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Permanant Address: </label><span class="form-control"><strong>{{paddress}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Nominee Name: </label><span class="form-control"><strong>{{nname}}</strong></span>
                        </div>
                    </div>
                </div>

                
               
                <div class="form-wizard-buttons">
                    <button type="button" class="btn btn-previous">Previous</button>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </fieldset>
            <!-- Form Step 4 -->
                    
        </form>
                    <!-- Form Wizard -->
    </div>
</div>

                    
  <script  src="<?php echo base_url('assets/form_wizard/js/index1.js');?>"></script>

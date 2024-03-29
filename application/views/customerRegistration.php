<script src="<?php echo base_url();?>assets/scripts/angular.min.js"></script>
 <!-- <script src="http://code.jquery.com/jquery-1.10.2.js"></script> -->
 <script src="<?php echo base_url();?>assets/scripts/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/form_wizard/css/style1.css');?>">
<script src="<?php echo base_url();?>assets/plugins/validation.js"></script>
<script>
$(document).ready(function() {
    $("#signup-form").validate({
        rules: {
            comp_pan: {pan: true},
            comp_name:"required",
            comp_addr:"required",
            comp_landmark:"required",
            comp_state:"required",
            comp_pin:{pin:true},            
            comp_phone:{phone:true},
            comp_mail:{email:true},

            hr_ex_name:"required",
            hr_ex_phone:{phone:true},
            hr_ex_mail:{email:true},

             hr_mg_name:"required",
            hr_mg_phone:{phone:true},
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
            comp_name: "Please Enter Company Name"

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


<div ng-app="" >             
    
    <div class=" form-wizard">                  
                    <!-- Form Wizard -->
        <form id="signup-form" method="POST" name="frmRegistration" action="<?php echo base_url('customer/save');?>"  >
       
            <!-- Form progress -->
            <div class="form-wizard-steps form-wizard-tolal-steps-4">
                <div class="form-wizard-progress">
                    <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                </div>
                <!-- Step 1 -->
                <div class="form-wizard-step active">
                    <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <p>Company Detatils</p>
                </div>
                <!-- Step 1 -->
                
                <!-- Step 2 -->
                <div class="form-wizard-step">
                    <div class="form-wizard-step-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                    <p>HR Details</p>
                </div>
                <!-- Step 2 -->
                
                <!-- Step 3 -->
                <div class="form-wizard-step">
                    <div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                    <p>Service Provider Details</p>
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
                                    <label>Company Name: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="comp_name" id="comp_name" ng-model="comp_name" placeholder="Company Name" class="form-control required">
                                </div>
                            </div>
                            <span class="error" id="comp_name-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label> Pancard Number: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="comp_pan"  title="Please Fill valid Match like (AAAAA0000A) " id="comp_pan" ng-model="comp_pan" ng-init="comp_pan=''" value=""placeholder="Company PAN Number" class="form-control required" style="text-transform: uppercase;">
                                </div>
                            </div>
                             <span class="error" id="comp_pan-error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Address: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="comp_addr" id="comp_addr" ng-model="comp_addr" placeholder="Company Address" class="form-control required">
                                </div>
                            </div>
                            <span class="error" id="comp_addr-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Landmark: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="comp_landmark" id="comp_landmark" ng-model="comp_landmark" placeholder="Company Landmark" class="form-control required">
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
                                    <label>Pincode: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="comp_pin" ng-model="comp_pin" id="comp_pin" placeholder="Enter Pincode" class="form-control required">
                                    <span class="comp_pin-error"></span>
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
                                    <label>Corporate Phone Number: <span>*</span></label>
                            </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="comp_phone" id="comp_phone" ng-model="comp_phone" placeholder="Company Phone Number" class="form-control numeric required" >
                                </div>
                            </div>
                            <span class="error" id="comp_phone-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Email address: <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="comp_mail" ng-model="comp_mail" id="comp_mail" placeholder="Email Address" class="form-control required">
                                </div>
                            </div>
                            <span class="error" id="comp_mail-error"></span>

                        </div>
                    </div>
                </div>              
                 <div class="row">
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>GST NO.: </label>
                            </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="gst" id="gst" ng-model="gst" placeholder="Company GST Number" class="form-control numeric " >
                                </div>
                            </div>
                            <span class="error" id="gst-error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6  col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>CIN : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <input type="text" name="cin" ng-model="cin" id="cin" placeholder="company CIN number" class="form-control ">
                                </div>
                            </div>
                            <span class="error" id="cin-error"></span>

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
                <h3>HR EXCUTIVE DETAILS</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Name : <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text"  name="hr_ex_name" ng-model="hr_ex_name" id="hr_ex_name"  placeholder="Enter Person Name" class="form-control required">
                                <span class="error" id="hr_ex_name-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Phone No: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="hr_ex_phone" ng-model="hr_ex_phone" id="hr_ex_phone"  placeholder="Enter Phone Number" class="form-control required">
                                <span class="error" id="hr_ex_phone-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Email: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="email" name="hr_ex_mail" ng-model="hr_ex_mail" id="hr_ex_mail"  placeholder="Enter Email" class="form-control required">
                                <span class="error" id="hr_ex_mail-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>
                <h3>HR Manager Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Name : <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="hr_mg_name" ng-model="hr_mg_name" id="hr_mg_name" placeholder="Enter Person Name" class="form-control required">
                                <span class="error" id="hr_mg_name-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Phone No: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="hr_mg_phone" ng-model="hr_mg_phone" id="hr_mg_phone" placeholder="Enter Phone Number" class="form-control required">
                                <span class="error" id="hr_mg_phone-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Email: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="email" name="hr_mg_mail" ng-model="hr_mg_mail" id="hr_mg_mail" placeholder="Enter Email Address" class="form-control required">
                                <span class="error" id="hr_mg_mail-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                     </div>
                <h3>HR Sr. Manager/VP Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Name : <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="hr_vp_name" ng-model="hr_vp_name" id="hr_vp_name" placeholder="Enter Person Name" class="form-control required">
                                <span class="error" id="hr_vp_name-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Phone No: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="hr_vp_phone" ng-model="hr_vp_phone" id="hr_vp_phone" placeholder="Enter Phone Number" class="form-control required">
                                <span class="error" id="hr_vp_phone-error"></span>
                                </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Email: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="email" name="hr_vp_mail" ng-model="hr_vp_mail" id="hr_vp_mail" placeholder="Enter Email Address" class="form-control required">
                                <span class="error" id="hr_vp_mail-error"></span>
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

                 <h3>Service Provider Executive Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Name : <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text"  name="sp_ex_name" ng-model="sp_ex_name" id="sp_ex_name"  placeholder="Enter Person Name" class="form-control required">
                                 <span class="error" id="sp_ex_name-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Phone No: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="sp_ex_phone" ng-model="sp_ex_phone" id="sp_ex_phone"placeholder="Enter Phone Number" class="form-control required">
                                 <span class="error" id="sp_ex_phone-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Email: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="email" name="sp_ex_mail" ng-model="sp_ex_mail" id="sp_ex_mail" placeholder="Enter Email address" class="form-control required">
                                 <span class="error" id="sp_ex_mail-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                     </div>
                <h3>Service Provider Manager Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Name : <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text"name="sp_mg_name" ng-model="sp_mg_name" id="sp_mg_name"  placeholder="Enter Person Name" class="form-control required">
                                 <span class="error" id="sp_mg_name-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Phone No: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="sp_mg_phone" ng-model="sp_mg_phone" id="sp_mg_phone" placeholder="Enter Phone Number" class="form-control required">
                                 <span class="error" id="sp_mg_phone-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Email: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="email" name="sp_mg_mail" ng-model="sp_mg_mail" id="sp_mg_mail" placeholder="Enter Email Address" class="form-control required">
                                 <span class="error" id="sp_mg_mail-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                     </div>
                <h3>Service Provider Sr. Manager/VP Details</h3>
                <div class="row">
                        <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Name : <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="sp_vp_name" ng-model="sp_vp_name" id="sp_vp_name" placeholder="Enter Person Name" class="form-control required">
                                 <span class="error" id="sp_vp_name-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Phone No: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="text" name="sp_vp_phone" ng-model="sp_vp_phone" id="sp_vp_phone" placeholder="Enter Phone Number" class="form-control required">
                                 <span class="error" id="sp_vp_phone-error"></span>
                                 </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm-4 col-md-4  col-lg-4 ">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3  col-lg-3 ">
                                <label>Email: <span>*</span></label>
                                 </div>
                                    <div class="col-sm-9 col-md-9 col-lg-9 ">
                                <input type="email" name="sp_vp_mail" ng-model="sp_vp_mail" id="sp_vp_mail" placeholder="Enter Email Addres" class="form-control required">
                                 <span class="error" id="sp_vp_mail-error"></span>
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
                    <h3>*** Company  Information ***</h3>
                

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
                                    <label>Company PAN No : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{comp_pan}}</strong></span>
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
                                    <label>Company Address : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{comp_addr}}</strong></span>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Landmark : </label>
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
                                    <label> Pincode: </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{comp_pin}}</strong></span>
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
                                    <label>Company Phone No : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{comp_phone}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                             <div class="row">
                                <div class="col-sm-3 col-md-3  col-lg-3 ">
                                    <label>Company Mail Address : </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-9 ">
                                    <span class="form-control"><strong>{{comp_mail}}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <h3>*** HR Details ***</h3>

                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Admin Or HR Executive Name: </label><span class="form-control"><strong>{{hr_ex_name}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Admin Or HR Executive Phone No : </label><span class="form-control"><strong>{{hr_ex_phone}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Admin Or HR Executive Mail : </label><span class="form-control"><strong>{{hr_ex_mail}}</strong></span>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label> Admin Or HR Manager Name: </label><span class="form-control"><strong>{{hr_mg_name}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Admin Or HR Manager Phone No : </label><span class="form-control"><strong>{{hr_mg_phone}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Admin Or HR Manager Mail : </label><span class="form-control"><strong>{{hr_mg_mail}}</strong></span>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>HR Sr. Manager/VP Name : </label><span class="form-control"><strong>{{hr_vp_name}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>HR Sr. Manager/VP Phone No : </label><span class="form-control"><strong>{{hr_mg_phone}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>HR Sr. Manager/VP Mail : </label><span class="form-control"><strong>{{hr_mg_mail}}</strong></span>
                        </div>
                    </div>
                </div>
                <h3>*** Service Provider Details ***</h3>
                 <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Service Provider Executive Name: </label><span class="form-control"><strong>{{sp_ex_name}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Service Provider Executive Phone No: </label><span class="form-control"><strong>{{sp_ex_phone}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Service Provider Executive Mail: </label><span class="form-control"><strong>{{sp_ex_mail}}</strong></span>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Service Provider Manager Name: </label><span class="form-control"><strong>{{sp_mg_name}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Service Provider Manager Phone No : </label><span class="form-control"><strong>{{sp_mg_phone}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Service Provider Manager Mail : </label><span class="form-control"><strong>{{sp_mg_mail}}</strong></span>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Service Provider Sr. Manager/VP Name: </label><span class="form-control"><strong>{{sp_vp_name}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Service Provider Sr. Manager/VP Phone No : </label><span class="form-control"><strong>{{sp_vp_phone}}</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 ">
                        <div class="form-group">
                             <label>Service Provider Sr. Manager/VP Mail : </label><span class="form-control"><strong>{{sp_vp_mail}}</strong></span>
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
    
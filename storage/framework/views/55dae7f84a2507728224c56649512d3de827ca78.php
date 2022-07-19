

<?php $__env->startSection('content'); ?>
<section class="det">
    <div class="title">
        <h1>Sent us your details, we will getting back to you within 48 hours.</h1>
    </div>
    <div class="dets">
        <div class="dets-form">
            <form action="<?php echo e(route('userdetails.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="input50">
                        <label for="" class="required">First Name</label>
                        <input type="text" placeholder="" id="f-name" name="fname" oninput="getFullName()" required/>
                    </div>
                    <div class="input50">
                        <label for="" class="required">Last Name</label>
                        <input type="text" placeholder="" id="l-name" name="lname" oninput="getFullName()" required/>
                    </div>                    
                </div>
                <div class="row">
                    <div class="input50">
                        <label for="fullname" class="required">Full Name:</label>
                        <input type="text" placeholder="" name="fullname" id="result" disabled readonly />                        
                    </div>
                    <div class="input50">
                        <label for="requestFor" class="required">Request For:</label>
                        <input type="text" placeholder="Individual Part or 2 Parts../Full Project" name="request_for"  required />                        
                    </div>
                </div>
                <div class="row">
                    <div class="input50">
                        <label for="contactNo" class="required">Contact Number</label>
                        <input type="text" placeholder="07xxxxxxxx" name="contactNo" maxlength="10" required />
                    </div>

                    <div class="input50">
                        <label for="email" class="required">Email</label>
                        <input type="email" placeholder="youremail@gmail.com" name="email" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="input50">
                        <label for="module" class="required">Module Name</label>
                        <input type="text" placeholder="ITPM,PAF,etc" name="module" required />
                    </div>

                    <div class="input50">
                        <label for="" class="required">Institute/Campus</label>
                        <input type="text" placeholder="" name="institute" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="input50">
                        <label class="required"><i class="fa fa-cloud-upload"></i> Group Assignment (pdf)</label>
                        <input type="file" name="projectDoc" class="custom-file-upload"/>
                    </div>

                    <div class="input50">
                        <label><i class="fa fa-cloud-upload"></i> ER Diagram (optional)</label>
                        <input type="file" name="er_diagram" class="custom-file-upload" />
                    </div>
                </div>                
                <div class="row">
                    <div class="input50">
                        <label for="noOfMembers" class="required">No of Members(Maximum 5)</label>
                        <input type="number" placeholder="No of Members" name="noOfMembers" min="1" max="8" required />
                    </div>

                    <div class="input50">
                        <label for="" class="required">Deadline</label>
                        <input type="text" placeholder="" name="deadline" id="datepicker" class="" required />
                    </div>
                    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
                    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
                    <script>
                        $( function() {
                          $( "#datepicker" ).datepicker({
                                dateFormat:"yy-mm-dd",
                                changeYear: true,
                                changeMonth: true,
                                yearRange: "-100:+20",
                                minDate: '0'
                            });
                        } );
                    </script>
                </div>
                <div class="row">
                    <div class="input100">
                        <label for="" class="required">Brief Description about your  <strong>Project</strong></label>
                        <textarea placeholder="Description. Start with module name" name="description" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="chk">
                        <label class="cont" class="required">
                            Do You Agree with <a href="/readterms">Terms and Conditions</a> 
                            <input type="checkbox" name="terms_and_conditions" id="terms_and_conditions" value="1" onclick="terms_changed(this)"/>
                            <span class="checkmark"></span>
                        </label>                        
                    </div>

                </div>
                <div class="row">
                    <div class="input50">
                        <button type="submit" value="" class="btn" id="submit_button" onclick="return confirm('Are you sure you want to submit your details?')" disabled>Submit</button>
                    </div>
                    <div class="input50">
                        <button type="reset" value="" class="btn" >RESET</button>
                    </div> 
                    <?php echo e('CUST'.now()->format('ymd')); ?>                   
                </div>
            </form>
        </div>
        <script>
            function getFullName() {
              var x = document.getElementById('f-name').value;
              var y = document.getElementById('l-name').value;
              document.getElementById('result').value = x + " " +y;
            }
        </script>
        <script>
            function terms_changed(termsCheckBox){
                //If the checkbox has been checked
                if(termsCheckBox.checked){
                    //Set the disabled property to FALSE and enable the button.
                    document.getElementById("submit_button").disabled = false;
                } else{
                    //Otherwise, disable the submit button.
                    document.getElementById("submit_button").disabled = true;
                }
            }
        </script>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appFront', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/fe/userDetails.blade.php ENDPATH**/ ?>
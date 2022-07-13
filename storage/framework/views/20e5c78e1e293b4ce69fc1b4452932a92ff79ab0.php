<?php $__env->startSection('content'); ?>
    <section>
        <div class="title">
            <h1>Contact us</h1>
            <p>
                Do you have web project for us..!! Contact US..
            </p>
        </div>
        <div class="contact">
            <div class="contact-form">
                <form action="https://formsubmit.co/ksrprojecthub@gmail.com" method="POST">
                    <div class="row">
                        <div class="input100">
                            <input type="text" placeholder="Full Name" id="name" name="name" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input50">
                            <input type="email" placeholder="Email" name="email" required />
                        </div>
                        <div class="input50">
                            <input type="text" placeholder="Subject" name="subject" id="subject" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="input100">
                            <textarea placeholder="Message" name="message" id="message" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input100">
                            <div id="captcha">
                                <div data-callback="submit" data-theme="dark" data-sitekey="6LdyeCUfAAAAAFPnlxfQR2AYAIfrsxOZexj6mnAV" class="g-recaptcha"></div>
                                <script src="https://www.google.com/recaptcha/api.js?" async defer></script>
    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input100">
                            <input type="hidden" value="https://mail.google.com/" name="url">
                            
                            <input type="submit" value="Send" />
                            <input type="reset" value="RESET" />
                        </div>
                    </div>
                </form>
            </div>

            <div class="contact-info">
                <div class="info-box">
                    <img src="fronte/images/address.png" class="contact-icon" alt="" />
                    <div class="details">
                        <h4>Address</h4>
                        <p>15 Dharmapala Patumaga, Asgiriya, Kandy 20000</p>
                    </div>
                </div>
                <div class="info-box">
                    <img src="fronte/images/email.png" class="contact-icon" alt="" />
                    <div class="details">
                        <h4>Email</h4>
                        <a href="mailto:ksrprojecthub@gmail.com">ksrprojecthub@gmail.com</a>
                        <!--<a href="mailto:anyone@example.com">anyone@example.com</a>-->
                    </div>
                </div>
                <div class="info-box">
                    <img src="fronte/images/call.png" class="contact-icon" alt="" />
                    <div class="details">
                        <h4>Call</h4>
                        <a href="tel:+94715178352">+94 71 517 8352</a>
                        <!--<a href="tel:+19784444444">+1 978 555 4444</a>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appFront', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\supun\Documents\ksr-project-hub-dashboard\resources\views/fe/contact.blade.php ENDPATH**/ ?>
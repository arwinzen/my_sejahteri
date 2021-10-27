<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mysejahteri</title>
    <meta name="robots" content="follow, index" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="format-detection" content="telephone=no" />

    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/style.css?v=1.0.2" />



</head>

<body>

    <div class="app__container">
        <div class="app__wrapper">
            <div class="app__headline">Welcome to <span class="app__name_newln">Mysejahteri</span></div>
            <div class="app__desc app__desc_name">
                <p class="app__desc_1">We will collect just two details about you. Let's start with your name!</p>
            </div>
            <form action="tacno.php" method="POST">
                <input type="text" name="user-name" class="form_app_text" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" required autocomplete="off">
                <input type="text" name="mobile-no" class="form_app_text" placeholder="Mobile No" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" required autocomplete="off">
                <div class="form_app_checkbox_container">
                    <input type="checkbox" name="checkbox" class="form_app_checkbox" id="pdpaTnc">
                    <label for="pdpaTnc" class="form_app_lbl">I hereby acknowledge that I have read, understand and agree to the <a data-toggle="modal" data-target="#termsofuseprivacypolicy" class="pdpa_link">PDPA terms & conditions</a>.</label>
                </div>
                <div class="form_app_submit_container">
                    <button type="submit" class="form_app_submit btn_blue">Next <span class="next_arrow_icon"><img src="dist/images/svg/arrow_right_white.svg" alt=""></span></button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="termsofuseprivacypolicy">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms of Use & Privacy Policy</h5>
                </div>
                <div class="modal-body">
                    <div class="tnc_title">Terms of Use</div>
                    
                    <div class="tnc_title">Privacy Policy</div>
                    <div class="tnc_subtitle">Our Commitment to Privacy</div>
                    <p>Your privacy is important to us. To better protect your privacy we provide this notice explaining our online information practices and the choices you can make about the way your information is collected and used. To make this notice easy to find, we make it available on our homepage and at every point where personally identifiable information may be requested.</p>
                    <div class="tnc_subtitle">The Information We Collect:</div>
                    <p>This notice applies to all information collected or submitted on this mobile application. On some pages, you can make requests, and optionally register to receive materials. The types of personal information collected at these pages are:<br>Name<br>Contact Number</p>
                    <div class="tnc_subtitle">The Information We DONT Collect:</div>
                    <p>Credit/Debit Card Information</p>
                    <div class="tnc_subtitle">The Way We Use Information:</div>
                    <p>We use the information you provide about yourself internally. We do not share this information with outside parties except to the extent necessary upon your approval.</p>
                    <p>We use return email addresses to answer the email we receive. Such addresses are not used for any other purpose and are not shared with outside parties.</p>
                    <p>We use non-identifying and aggregate information to better design our mobile application and to share with advertisers or for statistical reference. For example, we may tell a sources that X number of individuals visited a certain area on our mobile application, or that Y number of men and Z number of women filled out our form, but we would not disclose anything that could be used to identify those individuals.</p>
                    <p>Finally, we never use or share the personally identifiable information provided to us online in ways unrelated to the ones described above without also providing you an opportunity to opt-out or otherwise prohibit such unrelated uses.</p>
                    <div class="tnc_subtitle">Our Commitment to Data Security</div>
                    <p>To prevent unauthorized access, maintain data accuracy, and ensure the correct use of information, we have put in place appropriate physical, electronic, and managerial procedures to safeguard and secure the information we collect online.</p>
                    <div class="tnc_subtitle">Our Commitment to Children’s Privacy</div>
                    <p>Protecting the privacy of the very young is especially important. For that reason, we never collect or maintain information at our mobile application from those we actually know are under 13, and no part of our mobile application is structured to attract anyone under 13.</p>
                    <div class="tnc_subtitle">How You Can Access or Correct Your Information</div>
                    <p>You can access all your personally identifiable information that we collect online and maintain by calling us or sending us an email. We use this procedure to better safeguard your information.</p>
                    <p>You can correct factual errors in your personally identifiable information by sending us a request that credibly shows error.</p>
                    <p>To protect your privacy and security, we will also take reasonable steps to verify your identity before granting access or making corrections.</p>
                    <div class="tnc_subtitle">How to Contact Us</div>
                    <p>Should you have other questions or concerns about these privacy policy, please email to <a href="mailto:care@mysejahteri.com" class="tnc_link">care@mysejahteri.com</a>.</p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>


    <script src="dist/js/jquery-3.2.1.slim.min.js"></script>
    <script src="dist/js/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app.js"></script>


</body>

</html>

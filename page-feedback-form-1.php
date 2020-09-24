<?php /* Template Name: Feedback-form-1 */ ?>

<!-- GOOGLE WEB FONT -->
<link
      href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600"
      rel="stylesheet"
    />

     <!-- BASE CSS -->
  <link href="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/css/menu.css" rel="stylesheet" />
    <link href="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/css/style.css" rel="stylesheet" />
    <link href="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/css/vendors.css" rel="stylesheet" />

    <!-- YOUR CUSTOM CSS -->
    <link href="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/css/custom.css" rel="stylesheet" />

    <!-- MODERNIZR MENU -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/modernizr.js"></script>

<!-- .content-area -->
<div id="primary" class="content-area">
    <!-- .site-main -->
    <main id="main" class="site-main" role="main">

    <div id="preloader">
      <div data-loader="circle-side"></div>
    </div>
    <!-- /Preload -->

    <div id="loader_form">
      <div data-loader="circle-side-2"></div>
    </div>
    <!-- /loader_form -->

    <!-- /menu -->

    <div class="container-fluid full-height">
      <div class="row row-height">
        <div class="col-lg-6 content-left">
          <div class="content-left-wrapper">
            <a href="#!" id="logo"
              ><img src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/img/logo.png" alt="black and white acme logo"
            /></a>
            <div id="social">
              <ul>
                <li>
                  <a href="#0"><i class="icon-facebook"></i></a>
                </li>
                <li>
                  <a href="#0"><i class="icon-instagram"></i></a>
                </li>
              </ul>
            </div>
            <!-- /social -->
            <div id="proof-box">
				<div class="size-box-info">
          
					<p>The <strong>Size: </strong><span id="proof-width">2</span> x <span id="proof-heigth"> 3 </span> </p>
				  </div>
				  <br>
              <figure>
                <img id="proof-img-preview" src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/img/Donut.png" alt="" class="img-fluid" />
			  </figure>
			 
              <div class="order-summary-dropdown-box">
				  <p>
            <strong>Type: </strong><span id="proof-cat"></span> - 
				 
					<strong>Qty: </strong><span id="proof-qty"> 50</span>
          <!--
          <br>
          
						<a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
						  Activity Log<i class="icon-angle-down"></i>
						</a>-->

				  </p>
			  </div>
             <br>
			  <div class="collapse" id="collapseExample">
				<div class="card card-body">
					<h3>Activity</h3>
					<div class="list-group">
					
						<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						  <div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Send Proof Design</h5>
							<small class="text-muted">ACME Staff</small>
						  </div>
						  <p class="mb-1">Send email with custom link to username in order for him to aprobe the sticker proof design.</p>
						  <small class="text-muted">Sep 3 - 11:47 pm.</small>
						</a>
						<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						  <div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Uploaded Artwork</h5>
							<small class="text-muted">Username</small>
						  </div>
						  <p class="mb-1">synthwave.jpeg.</p>
						  <small class="text-muted">Sep 10 - 10:55 pm</small>
						</a>
					  </div>
				</div>
			  </div>
            </div>
            <div class="copy">© 2020 ACME Stickers</div>
          </div>
          <!-- /content-left-wrapper -->
        </div>
        <!-- /content-left -->

        <div class="col-lg-6 content-right" id="start">
          <div id="wizard_container">
            <div id="top-wizard">
              <div id="progressbar"></div>
            </div>
              
              <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    /*$subject = "".$_POST['subject'];*/
						$to = "benjamin.martinez@ografix.com";		/* YOUR ADMIN EMAIL HERE */
						$subject = "Design Proof Feedback from client";
						$headers = "From: Email from Acme Stickers <noreply@acmestickers.com>";
						$message = "DETAILS\n";

						$message .= "\n1) Proof Status?\n" ;
						foreach($_POST['question_1'] as $value) 
							{ 
							$message .=   "- " .  trim(stripslashes($value)) . "\n"; 
							};
						$message .= "\n2) Additional info: " . $_POST['additional_message'];						
						
						$message .= "\nFirst Name: " . $_POST['firstname'];
						$message .= "\nLast Name: " . $_POST['lastname'];
						$message .= "\nEmail: " . $_POST['email'];
						$message .= "\nTelephone: " . $_POST['telephone'];
						$message .= "\nTerms and conditions accepted: " . $_POST['terms'] . "\n";
												
						//Receive Variable
						$sentOk = mail($to,$subject,$message,$headers);
						
						//Confirmation page
						$user = "benjamin.martinez@ografix.com";
						$usersubject = "Thank You";
						$userheaders = "From: info@acmestickers.com\n";
						
						//Confirmation page WITH  SUMMARY
						$usermessage = "Thank you for your time. Your quotation request is successfully submitted. We will reply shortly.\n\nBELOW A SUMMARY\n\n$message"; 
						mail($user,$usersubject,$usermessage,$userheaders);
              ?>
              <div id="success">
                <div class="icon icon--order-success svg">
                     <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                      <g fill="none" stroke="#8EC343" stroke-width="2">
                         <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                         <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                      </g>
                     </svg>
                 </div>
                <h4><span>Feedback successfully sent!</span> You will get an email whith the following steps. Thank you for your time</h4>
                <small>You will be redirect back in a couple of seconds.</small>
            </div>
              <?       
                } else{
            ?>
            <!-- /top-wizard -->
            <form id="wrapped" method="POST" enctype="multipart/form-data">
              <input id="website" name="website" type="text" value="" />
              <!-- Leave for security protection, read docs for details -->
              <div id="middle-wizard">
                <div class="step">
                  <h3 class="main_question">
                    <strong>Design Proof</strong>Is this how you would like your sticker
                    to look?
                  </h3>
                  <div class="form-group">
                    <label class="container_radio version_2"
                      >Yes, I aprove this design proof
                      <input
                        type="radio"
                        name="question_1[]"
                        value="Aprove"
                        class="required"
                        onchange="getVals(this, 'question_1');"
                      />
                      <span class="checkmark"></span>
                      <span class="fs1" aria-hidden="true" data-icon="R"></san>
                    </label>
                  </div>
                  <div class="form-group">
                    <label class="container_radio version_2"
                      >Not quite there, I need some changes
                      <input
                        type="radio"
                        name="question_1[]"
                        value="Change"
                        class="required"
                        onchange="getVals(this, 'question_1');"
                      />
                      <span class="fs1" aria-hidden="true" data-icon="p"></span>

                      <span class="checkmark info"></span>
                    </label>
                  </div>
                  <div class="form-group">
                    <label class="container_radio version_2"
                      >Not at all, I need to totally redo this
                      <input
                        type="radio"
                        name="question_1[]"
                        value="Cancel"
                        class="required"
                        onchange="getVals(this, 'question_1');"
                      />
                      <span class="fs1" aria-hidden="true" data-icon="Q"></span>
                      <span class="checkmark cancel"></span>
                    </label>
                  </div>
                </div>
                <!-- /step-->
                <div class="step">
                  <h3 class="main_question">
                    <strong>STEP 2/4</strong>Please provide any additional
                    information
                  </h3>
                  <div class="form-group add_top_30">
                    <label>Additional information</label>
                    <textarea
                      name="additional_message"
                      class="form-control required"
                      style="height: 150px"
                      placeholder="Type here additional info..."
                      onkeyup="getVals(this, 'additional_message');"
                    ></textarea>
                  </div>
                  <!--
                  <div class="form-group add_top_30">
                    <label
                      >Optional file upload<br /><small
                        >(Files accepted: gif, jpg, jpeg, .png, .pdf - Max file
                        size: 5MB for demo purpose, you can send us a bigger file <a target="_blank" href="https://acmestickers.com/contact-us/">here</a>. ) </small
                      ></label
                    >
                    <div class="fileupload">
                      <input
                        type="file"
                        name="fileupload"
                        accept="image/*,.pdf"
                        onchange="getVals(this, 'fileupload');"
                      />
                    </div>


                  </div>

                -->
                </div>
                <!-- /step-->
                <div class="step">
									<h3 class="main_question"><strong>3/4</strong>Please fill with your details</h3>
									<div class="form-group">
										<input type="text" name="firstname" class="form-control required" placeholder="First Name">
									</div>
									<div class="form-group">
										<input type="text" name="lastname" class="form-control required" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input id="usr-email" type="email" name="email" class="form-control required" placeholder="Your Email">
									</div>
									<div class="form-group">
										<input type="text" name="telephone" class="form-control" placeholder="Telephone">
									</div>
									<div class="form-group terms">
										<label class="container_check">Please accept our <a href="#" data-toggle="modal" data-target="#terms-txt">Terms and conditions</a>
											<input type="checkbox" name="terms" value="Yes" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								<!-- /step-->
                <!-- /step-->
                
                <!-- /step-->
                <div class="submit step">
                  <h3 class="main_question"><strong>STEP 4/4</strong>Summary</h3>
                  <div class="summary">
                    <ul>
                      <li>
                        <strong>1</strong>
                        <h5>Proof Status</h5>
                        <p id="question_1"></p>
                      </li>
                      <li>
                        <strong>2</strong>
                        <h5>Additional information</h5>
                        <p id="additional_message"></p>
                        <!--
                        <p>
                          <label>File upload</label>:
                          <span id="fileupload"></span>
                        </p>
                      -->
                      </li>
                     
                    </ul>      
                  </div>
                </div>
                <!-- /step-->
              </div>
              <!-- /middle-wizard -->
              <div id="bottom-wizard">
                <button type="button" name="backward" class="backward">
                  Prev
                </button>
                <button type="button" name="forward" class="forward">
                  Next
                </button>
                <button type="submit" name="submit" class="submit">
                  Send Feedback
                </button>
              </div>
              <!-- /bottom-wizard -->
            </form>
              
               <?  
                }
            ?>
              
          </div>
          <!-- /Wizard container -->
        </div>
        <!-- /content-right-->
      </div>
      <!-- /row-->
    </div>
    <!-- /container-fluid -->

    <!-- /cd-overlay-nav -->

    <!-- /cd-overlay-content -->

    <!-- /menu button -->

    <!-- Modal terms -->
    <div
      class="modal fade"
      id="terms-txt"
      tabindex="-1"
      role="dialog"
      aria-labelledby="termsLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-hidden="true"
            >
              &times;
            </button>
          </div>
          <div class="modal-body">
            <p>
              Lorem ipsum dolor sit amet, in porro albucius qui, in
              <strong>nec quod novum accumsan</strong>, mei ludus tamquam
              dolores id. No sit debitis meliore postulant, per ex prompta
              alterum sanctus, pro ne quod dicunt sensibus.
            </p>
            <p>
              Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod
              novum accumsan, mei ludus tamquam dolores id. No sit debitis
              meliore postulant, per ex prompta alterum sanctus, pro ne quod
              dicunt sensibus. Lorem ipsum dolor sit amet,
              <strong>in porro albucius qui</strong>, in nec quod novum
              accumsan, mei ludus tamquam dolores id. No sit debitis meliore
              postulant, per ex prompta alterum sanctus, pro ne quod dicunt
              sensibus.
            </p>
            <p>
              Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod
              novum accumsan, mei ludus tamquam dolores id. No sit debitis
              meliore postulant, per ex prompta alterum sanctus, pro ne quod
              dicunt sensibus.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn_1" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- COMMON SCRIPTS -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/jquery-3.2.1.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/common_scripts.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/velocity.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/functions.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/file-validator.js"></script>

    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/load-data-url.js"></script>
    <!-- Wizard script -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/quotation_func.js"></script>

    </main><!-- .site-main -->
</div><!-- .content-area -->
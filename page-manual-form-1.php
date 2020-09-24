<?php /* Template Name: Manual-form-1 */ ?>
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

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
<div id="preloader">
      <div data-loader="circle-side"></div>
    </div>
    <!-- /Preload -->

    <div id="loader_form">
      <div data-loader="circle-side-2"></div>
    </div>
    <!-- /loader_form -->

    <div class="container-fluid full-height">
      <div class="row row-height">
        <div class="col-lg-6 content-left">
          <div class="content-left-wrapper">
            <a target="_blank" href="http://acmestickers.com/" id="logo"
              ><img src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/img/logo.png" alt="acme-logo-bw"
            /></a>

            <div>
              <figure>
                <img
                  id="manual-form-img"
                  src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/img/hero-slider-bg-acme-img.png"
                  alt=""
                  class="img-fluid"
                />
              </figure>
              <h2>Design Proof Form</h2>
              <p>
                Please fill out the following form and upload the design proof
                in order to email the client with his design proof.
              </p>
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
                    
                    $mail = $_POST['email'];
                    
                    $to = "benjamin.martinez@ografix.com";/* YOUR USERS EMAIL HERE */
                    $subject = "Design Sticker Proof from Acme Stickers";
                    $headers = "From: Email from Acme Stickers <noreply@acmestickers.com>";
                    $message = "DETAILS\n";
                    
                    $message .= "\nType of sticker: " . $_POST['sticker-type'];
                    $message .= "\nQuantity: " . $_POST['quantity'];
                    $message .= "\nWidth: " . $_POST['width'];
                    $message .= "\nHeigth: " . $_POST['height'];
                    
                    $message = "Please copy and paste this url on your browser to view your design proof.";
                    $message .= "\nUrl: " . $_POST['urlwithdata'];
                   
                    
                    //Receive Variable
				    $sentOk = mail($to,$subject,$message,$headers);
                    
                    //Confirmation page
                    $user = "$mail";
                    $usersubject = "Thank You";
                    $userheaders = "From: info@acmestickers.com\n";
                    
                    //Confirmation page WITH  SUMMARY
                    $usermessage = "Thank you for your time. Your design proof was successfully submitted. They will reply shortly.\n\nBELOW A SUMMARY\n\n$message"; 
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
                <h4><span>Design Proof successfully sent!</span>Thank you for your time</h4>
                <small>You will be redirect back in 5 seconds.</small>
                <!--remove in production code-->
               
                <!--remove in production code-->
            </div>
            <?       
                } else{
            ?>
            <!-- /top-wizard -->
            <form id="wrapped" method="POST">
              <input id="website" name="website" type="text" value="" />
              <!-- Leave for security protection, read docs for details -->
              <div id="middle-wizard">
                <div class="step">
                  <h3 class="main_question">
                    <strong>1/2</strong>Please fill the order details
                  </h3>
                  <div class="form-group">
                    <input
                      type="email"
                      name="email"
                      class="form-control required"
                      placeholder="His/Her Email"
                      onchange="getVals(this, 'email');"
                    />
                  </div>
                  <!-- START: type of sticker -->
                  <div class="form-group">
                    <div class="styled-select clearfix">
                      <select
                        class="wide required"
                        name="sticker-type"
                        onchange="getVals(this, 'question_1');"
                      >
                        <option value="">Type of sticker</option>
                        <option value="die-cut">Die Cut Sticker</option>
                        <option value="bumper">Bumper Sticker</option>
                        <option value="circle">Circle Sticker</option>
                        <option value="kiss-cut">Kiss Cut Sticker</option>
                        <option value="oval">Oval Sticker</option>
                        <option value="rectangle">Rectangle Sticker</option>
                        <option value="rounded-corner">
                          Rounded Corner Sticker
                        </option>
                      </select>
                    </div>
                  </div>
                  <!-- END: type of sticker -->
                  <!-- START: qty -->
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <input
                          type="text"
                          name="quantity"
                          class="form-control required"
                          placeholder="Qty"
                          onchange="getVals(this, 'question_2');"
                        />
                      </div>
                    </div>
                    <!-- END: qty -->
                    <!-- START: width -->
                    <div class="col-4">
                      <div class="form-group">
                        <input
                          type="text"
                          name="width"
                          class="form-control required"
                          placeholder="width"
                          onchange="getVals(this, 'question_3');"
                        />
                      </div>
                    </div>
                    <!-- END: width -->
                    <!-- START: heigth -->
                    <div class="col-4">
                      <div class="form-group">
                        <input
                          type="text"
                          name="height"
                          class="form-control required"
                          placeholder="height"
                          onchange="getVals(this, 'question_4');"
                        />
                      </div>
                    </div>
                    <!-- END: heigth -->
                  </div>
                  <!-- /row -->

                  <!-- START: file upload -->
                  <div class="form-group">
                    <!--  <label
                      >Required file upload<br /><small
                        >(Files accepted: gif, jpg, jpeg, .png, .pdf <br />
                        Max file size: 5MB for demo purpose.)
                      </small></label
                    >-->
                    <label>
                      <br />Proof URL
                      <small>
                        Log into your wordpress Dahsboard
                        <a
                          href="https://acmestickers.com/wp-admin/upload.php"
                          target="_blank"
                          >media library panel</a
                        >
                        &amp; upload the proof file there, then copy the files url
                        and paste it here, please.
                      </small>
                    </label>
                    <div class="fileupload">
                      <input
                        type="text"
                        name="proofurl"
                        class="form-control required"
                        placeholder="Paste your uploaded proof image url here"
                        onchange="getVals(this, 'url-img');"
                      />
                      <!--      <input
                        type="file"
                        name="fileupload"
                        accept="image/*,.pdf"
                        onchange="getVals(this, 'fileupload');"
                      />-->
                    </div>

                    <div class="form-group">
                      <input
                        id="urlwithdata-field"
                        type="hidden"
                        name="urlwithdata"
                        class="form-control"
                        placeholder="ignore this field"
                      />
                    </div>
                  </div>
                  <!-- END: file upload -->
                </div>
                <!-- /step-->

                <!-- /step-->

                <!-- /step-->

                <!-- /step-->
                <div class="submit step">
                  <h3 class="main_question">
                    <strong>2/2</strong>Summary<br />
                  </h3>
                  <p>
                    Please <strong>doble check</strong> the following
                    information before hiting Send Email.
                  </p>
                  <div class="summary">
                    <ul>
                      <li>
                        <strong>1</strong>
                        <h5>Who will recieve this proof form?</h5>
                        <p id="email"></p>
                      </li>

                      <li>
                        <strong>2</strong>
                        <h5>Type of sticker</h5>
                        <p id="question_1"></p>
                      </li>
                      <li>
                        <strong>3</strong>
                        <h5>Quantity of stickers</h5>
                        <p id="question_2"></p>
                      </li>
                      <li>
                        <strong>4</strong>
                        <h5>Size of stickers</h5>
                        <p>
                          Width:<span id="question_3">id="question_3"</span> x
                          Heigth <span id="question_4"></span>
                        </p>
                      </li>
                      <li>
                        <strong>5</strong>
                        <h5>Design Proof file URL stored in WordPress</h5>
                        <!--<p id="fileupload"></p>-->
                        <p id="url-img"></p>
                      </li>
                      <li>
                        <strong>6</strong>
                        <h5>
                          Click on
                          <a
                            id="preview-proof"
                            style="color: #007bff"
                            href="#"
                            target="_blank"
                            >this URL</a
                          >
                          to preview what the user will see
                        </h5>
                        <!--<p id="fileupload"></p>-->
                        <p id="url-user"></p>
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
                <button
                  type="button"
                  name="forward"
                  class="forward"
                  onclick="generateUrlWithData();"
                >
                  Next
                </button>
             
                <button type="submit" name="submit" class="submit">
                  Send Email
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

    <!-- COMMON SCRIPTS -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/jquery-3.2.1.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/common_scripts.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/velocity.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/functions.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/file-validator.js"></script>

    <!-- Wizard script -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/acme-proof/js/upload-proof-form.js"></script>

    </main><!-- .site-main -->
</div><!-- .content-area -->
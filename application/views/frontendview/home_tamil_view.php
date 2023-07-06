<!-- popups -->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true"  data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3">
        <div class="modal-header p-0" style="border: none;">
          <div class="clearfix"></div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="<?php echo base_url("assets/frontend/images/thank.gif"); ?>" alt="" class="img-fluid mx-auto d-block" width="200px;">
          <p class="mb-3" style="text-align: center;">எங்களுடன் இணைந்ததற்கு நன்றி, உங்கள் குறிப்பு எண் <div id="ref_no"></div></p>

        </div>
      </div>
    </div>
  </div>
   <!-- popups -->
   
<div class="clearfix"></div>

<div class="container">

  <div class="row m-auto">

      <div class="col-xxl-6 offset-xxl-5 col-xl-6 offset-xl-5 col-lg-6 offset-lg-5 col-md-12 col-sm-12 col-12">

        <!-- kid image -->
        <img src="<?php echo base_url("assets/frontend/images/kid04.png"); ?>" alt="" class="kid_04 d-none d-sm-none d-md-block" data-aos="fade-down">
        <!-- kid image -->

        <!-- kid image -->
        <div class="position-relative d-none d-sm-none d-md-block">
          <div class="position-absolute top-0 end-0">
             <img src="<?php echo base_url("assets/frontend/images/kid03.png"); ?>" alt="" class="start-end kid_03" data-aos="fade-up">
          </div>
        </div>
        <!-- kid image -->

        <div class="form_blue_box shadow rounded">

          <!-- language button -->
        <div class="lang_div mb-2">
            <div class="position-relative">
                <div class="top-0 end-0">
                <a href="<?php echo base_url('Home-En');?>"><button class="btn btn-primary blue_white_btn">Eng</button></a>
                <a href="<?php echo base_url('Home-Si');?>"><button class="btn btn-primary blue_white_btn">සිං</button></a>                
              </div>
            </div>
          </div>
          <!-- language button -->
          
          <div class="row m-auto">
            
            <div class="shadow p-3 bg-body rounded mb-3" style="width: max-content;">
              <a href="<?php echo base_url("Home-Ta"); ?>">
                <img src="<?php echo base_url("assets/frontend/images/logo.svg"); ?>" alt="" class="top_logo aos-init aos-animate" data-aos="fade-down">
              </a>
            </div>

            <h1 class="heading" style="color: #ffffff; padding-left: 0px;" data-aos="fade-down">Lorem Ipsum</h1>
            <p style="padding-left: 0px;" data-aos="fade-down">
              Lorem Ipsum is simply dummy text of the printing.
            </p>

          </div>
          <div class="col-md-12">
                <x-auth-validation-errors class="mb-12" :errors="$errors" />
          </div>
          <div class="clearfix"></div>
          <form id="submission_form" name="submission_form" method="post"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
            <div class="row">            
        
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group" >
                <input type="text" class="form-control mb-3" id="tFullNameTam" name="tFullName" placeholder="முழு பெயர்">
              <div id="FullName_div" style="display:none; color:#F00; margin-top: -3px"> முழுப் பெயரை உள்ளிடவும் </div>
              </div>

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                <input type="email" class="form-control mb-3" id="vEmailTam" name="vEmail" placeholder="மின்னஞ்சல் முகவரி">
             <div id="vEmail_div" style="display:none; color:#F00; margin-top: -3px">மின்னஞ்சல் முகவரியை உள்ளிடவும்</div>
                <div id="Email_div" style="display:none; color:#F00; margin-top: -3px">தவறான மின்னஞ்சல், மீண்டும் சரிபார்க்கவும்</div>
              </div>

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <select class="form-select mb-3" aria-label="Default select example" id="iCategoryIdTam" name="iCategoryId">
                  <option selected>வகை</option>
                  <?php                                               
                    foreach ($category as $categories) {
                      $cid = $categories->id;
                      echo '<option value="' . $cid . '">' . $categories->vCategoryNameTam . '</option>';
                    }                                            
                  ?>
                </select>
              <div id="Category_div" style="display:none; color:#F00; margin-top: -3px">ஓர் வகையறாவை தேர்ந்தெடு</div>
             </div>

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <select class="form-select mb-3" aria-label="Default select example" id="iSubCategoryIdTam" name="iSubCategoryId">
                  <option selected>துணை வகை</option>
                  <?php                                               
                    // foreach ($sub_category as $sub_categories) {
                    //   $sid = $sub_categories->id;
                    //   echo '<option value="' . $sid . '">' . $sub_categories->vSubcategoryName . '</option>';
                    // }                                            
                  ?>
                </select>
             <div id="Subcategory_div" style="display:none; color:#F00; margin-top: -3px">ஒரு துணை வகையைத் தேர்ந்தெடுக்கவும்</div>
              </div> 

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <select class="form-select mb-3" aria-label="Default select example" id="iDistrictIdTam" name="iDistrictId">
                  <option selected>மாவட்டங்கள்</option>
                  <?php                                               
                    foreach ($district as $districts) {
                      $did = $districts->id;
                      echo '<option value="' . $did . '">' . $districts->vDistrictNameTam . '</option>';
                    }                                            
                  ?>
                </select>
              <div id="District_div" style="display:none; color:#F00; margin-top: -3px">ஒரு மாவட்டத்தைத் தேர்ந்தெடுக்கவும்</div>
              </div> 

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <select class="form-select mb-3" aria-label="Default select example" id="iDivSecretariatIdTam" name="iDivSecretariatIdTam">
                  <option value="0" selected>பிரதேச செயலகம் *</option>
                  <?php                                               
                    // foreach ($sub_category as $sub_categories) {
                    //   $sid = $sub_categories->id;
                    //   echo '<option value="' . $sid . '">' . $sub_categories->vSubcategoryName . '</option>';
                    // }                                            
                  ?>
                </select>
                <div id="DivSecretariat_div" style="display:none; color:#F00; margin-top: -3px">பிரதேச செயலகத்தைத் தேர்ந்தெடுங்கள்</div>
              </div> 

              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group" >
                <input type="text" class="form-control mb-3" id="tSchoolTam" name="tSchoolTam" placeholder="பள்ளி *">
                <div id="School_div" style="display:none; color:#F00; margin-top: -3px"> பள்ளியில் நுழைய </div>
              </div>

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <select class="form-select mb-3" aria-label="Default select example" id="iGradeTam" name="iGradeTam">
                  <option value="0" selected>தரம் *</option>
                  <?php                                               
                    foreach ($grades as $grade) {
                      $id = $grade->id;
                      echo '<option value="' . $id . '">' . $grade->iGrade . '</option>';
                    }                                            
                  ?>
                </select>
                <div id="District_div" style="display:none; color:#F00; margin-top: -3px">ஒரு தரத்தைத் தேர்ந்தெடுக்கவும்</div>
              </div>

              <div class="clearfix"></div>

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <input type="file" id="formFile_video_tam" class="form-control mb-3" name="vVideo" placeholder="" accept="video/mp4,video/x-m4v,video/*">
             <div id="Video_div" style="display:none; color:#F00; margin-top: -3px">உங்கள் வீடியோவைப் பதிவேற்றவும்</div>
             <div id="Video_limit_div" style="display:none; color:#F00; margin-top: -3px">அளவு அதிகமாக உள்ளது, அதிகபட்ச வரம்பு 50MB</div>
               </div>

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <input type="file" id="formFile_img_tam" class="form-control mb-3" name="vImage" placeholder="" accept="image/png, image/jpg, image/jpeg">
              <div id="Image_div" style="display:none; color:#F00; margin-top: -3px">உங்கள் விண்ணப்பப் படத்தைப் பதிவேற்றவும்</div>
              </div>

              <div class="clearfix"></div>

              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <button type="button" class="btn btn-primary green_btn mb-3" style="width: auto;" onClick="checkemptyTamil();" id="submission_submit" >இப்போது சமர்ப்பிக்கவும்</button>
                <!--  -->
                
              </div>            
              
              <div class="row mx-auto">
                    <div class="shadow p-3 bg-body rounded mb-3">
                        <img src="<?php echo base_url("assets/frontend/images/sub_logo.svg"); ?>" alt="" class="sub_logo">
                    </div>
                  </div>

              <a href="<?php echo base_url("Terms-of-use-Ta"); ?>" target="_blank"><p style="color: #ffffff;" class="mb-0">விதிமுறைகள் மற்றும் நிபந்தனைகள்</p></a>
              <p class="mb-0"><small><?php echo date("Y"); ?> © Mobitel (Pvt) Ltd. அனைத்து உரிமைகளும் பாதுகாக்கப்பட்டவை.</small></p>
              
            </div>
          </form>
        </div>

         <!-- kid image -->
        <div class="position-relative d-none d-sm-none d-md-none d-lg-block">
          <div class="position-absolute bottom-0 start-0">
             <img src="<?php echo base_url("assets/frontend/images/kid01.png"); ?>" alt="" class="start-end kid_01" data-aos="fade-up">
          </div>
        </div>
        <!-- kid image -->

         <!-- kid image -->
        <div class="position-relative">
          <div class="position-absolute bottom-0 end-0">
             <img src="<?php echo base_url("assets/frontend/images/kid02.png"); ?>" alt="" class="start-end kid_02" data-aos="fade-up">
          </div>
        </div>
        <!-- kid image -->

      </div>

    </div>

</div>

<!-- ======================= -->

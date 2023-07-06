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
          <p class="mb-3" style="text-align: center;">අප හා සම්බන්ධ වූවාට ඔබට ස්තූතියි, ඔබගේ යොමු අංකය <div id="ref_no"> </div> </p>

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
          <div class="lang_div">
            <div class="position-relative">
              <div class="position-absolute top-0 end-0">
                <a href="<?php echo base_url('Home-En');?>"><button class="btn btn-primary blue_white_btn">Eng</button></a>
                <a href="<?php echo base_url('Home-Ta');?>"><button class="btn btn-primary blue_white_btn">தமி</button></a>
              </div>
            </div>
          </div>
          <!-- language button -->
          
          <div class="row m-auto">
            
            <div class="shadow p-3 bg-body rounded mb-3" style="width: max-content;">
              <a href="<?php echo base_url("Home-Si"); ?>">
                <img src="<?php echo base_url("assets/frontend/images/logo.png"); ?>" alt="" class="top_logo aos-init aos-animate" data-aos="fade-down">
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
                <input type="text" class="form-control mb-3" id="tFullNameSin" name="tFullName" placeholder="සම්පූර්ණ නම">
              <div id="FullName_div" style="display:none; color:#F00; margin-top: -3px"> සම්පූර්ණ නම ඇතුලත් කරන්න </div>
              </div>

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 form-group">
                <input type="email" class="form-control mb-3" id="vEmailSin" name="vEmail" placeholder="විද්යුත් තැපැල් ලිපිනය">
                <div id="vEmail_div" style="display:none; color:#F00; margin-top: -3px">ඊමේල් ලිපිනය ඇතුලත් කරන්න</div>
                <div id="Email_div" style="display:none; color:#F00; margin-top: -3px">වලංගු නොවන විද්‍යුත් තැපෑලක්, නැවත පරීක්ෂා කරන්න</div>
              </div>

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <select class="form-select mb-3" aria-label="Default select example" id="iCategoryIdSin" name="iCategoryId">
                  <option selected>කාණ්ඩය</option>
                  <?php                                               
                    foreach ($category as $categories) {
                      $cid = $categories->id;
                      echo '<option value="' . $cid . '">' . $categories->vCategoryNameSin . '</option>';
                    }                                            
                  ?>
                </select>
                <div id="Category_div" style="display:none; color:#F00; margin-top: -3px">කාණ්ඩයක් තෝරන්න</div>
              </div>

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <select class="form-select mb-3" aria-label="Default select example" id="iSubCategoryIdSin" name="iSubCategoryId">
                  <option selected>උප කාණ්ඩය</option>
                  <?php                                               
                    // foreach ($sub_category as $sub_categories) {
                    //   $sid = $sub_categories->id;
                    //   echo '<option value="' . $sid . '">' . $sub_categories->vSubcategoryName . '</option>';
                    // }                                            
                  ?>
                </select>
               <div id="Subcategory_div" style="display:none; color:#F00; margin-top: -3px">උප කාණ්ඩයක් තෝරන්න</div>
               </div> 

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <select class="form-select mb-3" aria-label="Default select example" id="iDistrictIdSin" name="iDistrictId">
                  <option selected>දිස්ත්‍රික්කය</option>
                  <?php                                               
                    foreach ($district as $districts) {
                      $did = $districts->id;
                      echo '<option value="' . $did . '">' . $districts->vDistrictNameSin . '</option>';
                    }                                            
                  ?>
                </select>
              <div id="District_div" style="display:none; color:#F00; margin-top: -3px">දිස්ත්‍රික්කයක් තෝරන්න</div>
              </div> 

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <input type="file" id="formFile_video_sin" class="form-control mb-3" name="vVideo" placeholder="" accept="video/mp4,video/x-m4v,video/*">
                <div id="Video_div" style="display:none; color:#F00; margin-top: -3px">ඔබගේ වීඩියෝව අමුණන්න</div>
                <div id="Video_limit_div" style="display:none; color:#F00; margin-top: -3px">ප්‍රමාණය ඉක්මවයි, උපරිම සීමාව 50MB වේ</div>
              </div>

              <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 form-group">
                <input type="file" id="formFile_img_sin" class="form-control mb-3" name="vImage" placeholder="" accept="image/png, image/jpg, image/jpeg">
              <div id="Image_div" style="display:none; color:#F00; margin-top: -3px">ඔබගේ අයදුම්තේ චායාරූපය අමුණන්න</div>
              </div>

              <div class="clearfix"></div>

              

              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <button type="button" class="btn btn-primary green_btn mb-3" style="width: auto;"  data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal" id="submission_submit_sin" disabled>දැන් ඉදිරිපත් කරන්න</button>
                <!--  -->
                
              </div>            

              <a href="<?php echo base_url("Terms-of-use-Si"); ?>" target="_blank"><p style="color: #ffffff;" class="mb-0">නියම සහ කොන්දේසි</p></a>
              <p class="mb-0"><small><?php echo date("Y"); ?> © Mobitel (Pvt) Ltd. සියලුම හිමිකම් ඇවිරිණි.</small></p>
              
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

<!-- header section -->

    <!--=============================================-->
  <!--===================header====================-->


  <!--=============================================-->
  <!--===================body====================-->


    <!--=============================================-->
  <!--===================body====================-->

  <div class="clearfix"></div>
    <br>
    <br>

  <!--=============================================-->
  <!--===================footer====================-->


  <!--=============================================-->
  <!--===================footer====================-->

    <div class="clearfix"></div>


  <!--=============================================-->
  <!--===================scroll top====================-->

  <button class="scroll-top">
    <div class="arrow up"></div>
  </button>

  <!--=============================================-->
  <!--===================scroll top====================-->



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?php echo base_url("assets/frontend/js/jquery-3.2.1.min.js"); ?>"></script>
      <script src="<?php echo base_url("assets/frontend/js/popper.min.js"); ?>" ></script> 
      <script src="<?php echo base_url("assets/frontend/js/bootstrap.min.js"); ?>" ></script>
      <script src="<?php echo base_url("assets/frontend/js/jquery.validate.min.js"); ?>" ></script>


      <!-- scroll top -->
      <script src="<?php echo base_url("assets/frontend/js/drop_down_menu.js"); ?>"></script>
      <!-- scroll top -->

    <!--loading effects-->
    <script src="<?php echo base_url("assets/frontend/js/aos.js"); ?>"></script>

    <script>
    AOS.init({
    easing: 'ease-out-back',
            duration: 1000
    });</script>

    <!--loading effects-->

  <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
  <script src="https://www.google.com/recaptcha/api.js?render=6LeA75cjAAAAAD6lX4cO1droxHHnDjcEM2hq5xmi"></script>
  <script>
//   grecaptcha.ready(function() {
//       grecaptcha.execute('6LeA75cjAAAAAD6lX4cO1droxHHnDjcEM2hq5xmi', {action: <?php echo base_url('Home/save_submission'); ?>}).then(function(token) {
//         // pass the token to the backend script for verification
//       });
//   });
  </script>
 
    <script type="text/javascript" >
	    $(document).ready(function(){
            $('#iCategoryId').change(function(){ 
                var id=$(this).val();
                // alert(id);
                $.ajax({
                    url : "<?php echo base_url('home/get_sub_categories');?>",
                    method : "POST",
                    data : {cat_id: id},
                    success: function(data){
                        $('#iSubCategoryId').html(data); 
                    }
                });
                return false;
            });
            
            $('#iCategoryIdSin').change(function(){ 
                var id=$(this).val();
                // alert(id);
                $.ajax({
                    url : "<?php echo base_url('home/get_sub_sin_categories');?>",
                    method : "POST",
                    data : {cat_id: id},
                    success: function(data){
                        $('#iSubCategoryIdSin').html(data); 
                    }
                });
                return false;
            });
            
            $('#iCategoryIdTam').change(function(){ 
                var id=$(this).val();
                // alert(id);
                $.ajax({
                    url : "<?php echo base_url('home/get_sub_tam_categories');?>",
                    method : "POST",
                    data : {cat_id: id},
                    success: function(data){
                        $('#iSubCategoryIdTam').html(data); 
                    }
                });
                return false;
            });            
            
            $('#vEmail').blur(function(){
                var email = $("#vEmail").val();
                var testEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,6})+$/;
                if (testEmail.test(email)){
                    $("#Email_div").css('display', 'none');
                }
                else{
                    var error = true;
                    $("#Email_div").css('display', 'block');
                }
            });
	    
            $('#formFile_video').change(function(e) {
                var video = e.target.files[0].name;
                // alert(video);
                $('#formFile_video::before').css("content",video);
                $('#formFile_video::before').html(video);
                // $('.video-content::before').css("Name",'video');
                // $("h4").text(geekss + ' is the selected file.');
 
            });

            $('#formFile_video').change(function() {
                if (this.files[0].size < 52428800){
                    $("#Video_limit_div").css('display', 'none');                    
                }
                else{
                    var error = true;
                    $("#Video_limit_div").css('display', 'block');
                }
            });     
	    });  

            function  checkemptyEnglish() {
                var tFullName = $('#tFullName').val().length;
                var vEmail = $('#vEmail').val().length;
                var iCategoryId=$('#iCategoryId option:selected').val();
                var iSubCategoryId=$('#iSubCategoryId option:selected').val();
                var iDistrictId=$('#iDistrictId option:selected').val();
                var formFile_video=$('#formFile_video').val().length;
                var formFile_img=$('#formFile_img').val().length;
                
                var error;
                
                var alphaExpNum = /^[0-9]+$/;
                var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                var letters = /^[A-Za-z]+$/;
                
                if(tFullName == 0) {
                    document.getElementById('tFullName').className = "form-control_error";
                    $('#FullName_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('tFullName').className = "form-control";
                }
                
                if(vEmail == 0) {
                    document.getElementById('vEmail').className = "form-control_error";
                    $('#vEmail_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('vEmail').className = "form-control";
                }
                
                if(iCategoryId == 0) {
                    document.getElementById('iCategoryId').className = "form-control_error";
                    $('#Category_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iCategoryId').className = "form-control";
                }
                
                if(iSubCategoryId == 0) {
                    document.getElementById('iSubCategoryId').className = "form-control_error";
                    $('#Subcategory_div').show();
                    error = true;
                    
                }
                else{
                    document.getElementById('iSubCategoryId').className = "form-control";
                }                
                
                if(iDistrictId == 0) {
                    document.getElementById('iDistrictId').className = "form-control_error";
                    $('#District_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iDistrictId').className = "form-control";
                }
                
                if(formFile_video == 0) {
                    document.getElementById('formFile_video').className = "form-control_error";
                    $('#Video_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('formFile_video').className = "form-control";
                }
                
                if(formFile_img == 0) {
                    document.getElementById('formFile_img').className = "form-control_error";
                    $('#Image_div').show();
                    error = true;
                    
                }
                else{
                    document.getElementById('formFile_img').className = "form-control";
                }   

                if (error == true) {
                    return false;
                } else {
                    var tFullName = $('#tFullName').val();
                    var vEmail = $('#vEmail').val();
                    var iCategoryId=$('#iCategoryId option:selected').val();
                    var iSubCategoryId=$('#iSubCategoryId option:selected').val();
                    var iDistrictId=$('#iDistrictId option:selected').val();
                    // var vVideo=$('#formFile_video').val();
                    // var vImage=$('#formFile_img').val();

                    var formFile_video = $('#formFile_video').val().split('\\').pop();
                    var formFile_img = $('#formFile_img').val().split('\\').pop();
                    // document.forms["submission_form"].submit();
                    // ajaxCall(); 
                    // function ajaxCall() {
                    // $('#submission_form').submit(function(e){
                        // alert(tFullName);
                        // alert(vEmail);
                        // alert(iCategoryId);
                        // alert(iSubCategoryId);
                        // alert(iDistrictId);
                        // alert(vVideo);
                        // alert(vImage);
                        // e.preventDefault(); 
                        // send the formData
                        // var formData = new FormData($("#submission_form"));
                        var form_data = new FormData(document.getElementById("submission_form"));
                        // alert("test");
                        $.ajax({
                            url:"<?php echo base_url('Home/save_submission'); ?>",
                            type : "POST",
                            data: form_data,
                            processData: false,
                            contentType: false,
                            // dataType : "json",
                            // data : {
                            //     'tFullName' : tFullName, 
                            //     'vEmail' : vEmail, 
                            //     'iCategoryId' : iCategoryId, 
                            //     'iSubCategoryId' : iSubCategoryId, 
                            //     'iDistrictId' : iDistrictId, 
                            //     'formFile_video' : formFile_video, 
                            //     'formFile_img' : formFile_img
                            // },
                            // cache: false,
                            success: function(data){
                                console.log(data);                            
                                $('#exampleModalToggle').find('#ref_no').html(data).show;
                                $('#exampleModalToggle').modal('show');
                            },
                            error: function (req, status, err) {
                                // alert(err);
                                // console.log('Something went wrong', status, err);
                            }
                        });
                    // }); 
                    // }
                                       
                }
            }

            function  checkemptySinhala() {
                var tFullName = $('#tFullNameSin').val().length;
                var vEmail = $('#vEmailSin').val().length;
                var iCategoryId=$('#iCategoryIdSin option:selected').val();
                var iSubCategoryId=$('#iSubCategoryIdSin option:selected').val();
                var iDistrictId=$('#iDistrictIdSin option:selected').val();
                var formFile_video=$('#formFile_video_sin').val().length;
                var formFile_img=$('#formFile_img_sin').val().length;
                
                var error;
                
                var alphaExpNum = /^[0-9]+$/;
                var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                var letters = /^[A-Za-z]+$/;
                
                if(tFullName == 0) {
                    document.getElementById('tFullNameSin').className = "form-control_error";
                    $('#FullName_div').show();
                    error = true;                    
                }
                else{ 
                    document.getElementById('tFullNameSin').className = "form-control";
                }
                
                if(vEmail == 0) {
                    document.getElementById('vEmailSin').className = "form-control_error";
                    $('#vEmail_div').show();
                    error = true;                    
                }
                else{ 
                    document.getElementById('vEmailSin').className = "form-control";
                }
                
                if(iCategoryId == 0) {
                    document.getElementById('iCategoryIdSin').className = "form-control_error";
                    $('#Category_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iCategoryIdSin').className = "form-control";
                }
                
                if(iSubCategoryId == 0) {
                    document.getElementById('iSubCategoryIdSin').className = "form-control_error";
                    $('#Subcategory_div').show();
                    error = true;                    
                }
                else{
                    document.getElementById('iSubCategoryIdSin').className = "form-control";
                }                
                
                if(iDistrictId == 0) {
                    document.getElementById('iDistrictIdSin').className = "form-control_error";
                    $('#District_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iDistrictIdSin').className = "form-control";
                }
                
                if(formFile_video == 0) {
                    document.getElementById('formFile_video_sin').className = "form-control_error";
                    $('#Video_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('formFile_video_sin').className = "form-control";
                }
                
                if(formFile_img == 0) {
                    document.getElementById('formFile_img_sin').className = "form-control_error";
                    $('#Image_div').show();
                    error = true;
                    
                }
                else{
                    document.getElementById('formFile_img_sin').className = "form-control";
                }   

                if (error == true) {
                    return false;
                } else {
                    var tFullName = $('#tFullNameSin').val();
                    var vEmail = $('#vEmailSin').val();
                    var iCategoryId=$('#iCategoryIdSin option:selected').val();
                    var iSubCategoryId=$('#iSubCategoryIdSin option:selected').val();
                    var iDistrictId=$('#iDistrictIdSin option:selected').val();
                    // var vVideo=$('#formFile_video').val();
                    // var vImage=$('#formFile_img').val();

                    var formFile_video = $('#formFile_video_sin').val().split('\\').pop();
                    var formFile_img = $('#formFile_img_sin').val().split('\\').pop();
                    // document.forms["submission_form"].submit();
                    // ajaxCall(); 
                    // function ajaxCall() {
                    // $('#submission_form').submit(function(e){
                        // alert(tFullName);
                        // alert(vEmail);
                        // alert(iCategoryId);
                        // alert(iSubCategoryId);
                        // alert(iDistrictId);
                        // alert(vVideo);
                        // alert(vImage);
                        // e.preventDefault(); 
                        // send the formData
                        // var formData = new FormData($("#submission_form"));
                        var form_data = new FormData(document.getElementById("submission_form"));
                        // alert("test");
                        $.ajax({
                            url:"<?php echo base_url('Home/save_submission'); ?>",
                            type : "POST",
                            data: form_data,
                            processData: false,
                            contentType: false,
                            // dataType : "json",
                            // data : {
                            //     'tFullName' : tFullName, 
                            //     'vEmail' : vEmail, 
                            //     'iCategoryId' : iCategoryId, 
                            //     'iSubCategoryId' : iSubCategoryId, 
                            //     'iDistrictId' : iDistrictId, 
                            //     'formFile_video' : formFile_video, 
                            //     'formFile_img' : formFile_img
                            // },
                            // cache: false,
                            success: function(data){
                                console.log(data);                            
                                $('#exampleModalToggle').find('#ref_no').html(data).show;
                                $('#exampleModalToggle').modal('show');
                            },
                            error: function (req, status, err) {
                                // alert(err);
                                // console.log('Something went wrong', status, err);
                            }
                        });
                    // }); 
                    // }
                                       
                }
            }

            function  checkemptyEnglish() {
                var tFullName = $('#tFullNameTam').val().length;
                var vEmail = $('#vEmailTam').val().length;
                var iCategoryId=$('#iCategoryIdTam option:selected').val();
                var iSubCategoryId=$('#iSubCategoryIdTam option:selected').val();
                var iDistrictId=$('#iDistrictIdTam option:selected').val();
                var formFile_video=$('#formFile_video_tam').val().length;
                var formFile_img=$('#formFile_img_tam').val().length;
                
                var error;
                
                var alphaExpNum = /^[0-9]+$/;
                var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                var letters = /^[A-Za-z]+$/;
                
                if(tFullName == 0) {
                    document.getElementById('tFullNameTam').className = "form-control_error";
                    $('#FullName_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('tFullNameTam').className = "form-control";
                }
                
                if(vEmail == 0) {
                    document.getElementById('vEmailTam').className = "form-control_error";
                    $('#vEmail_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('vEmailTam').className = "form-control";
                }
                
                if(iCategoryId == 0) {
                    document.getElementById('iCategoryIdTam').className = "form-control_error";
                    $('#Category_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iCategoryIdTam').className = "form-control";
                }
                
                if(iSubCategoryId == 0) {
                    document.getElementById('iSubCategoryIdTam').className = "form-control_error";
                    $('#Subcategory_div').show();
                    error = true;
                    
                }
                else{
                    document.getElementById('iSubCategoryIdTam').className = "form-control";
                }                
                
                if(iDistrictId == 0) {
                    document.getElementById('iDistrictIdTam').className = "form-control_error";
                    $('#District_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iDistrictIdTam').className = "form-control";
                }
                
                if(formFile_video == 0) {
                    document.getElementById('formFile_video_tam').className = "form-control_error";
                    $('#Video_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('formFile_video_tam').className = "form-control";
                }
                
                if(formFile_img == 0) {
                    document.getElementById('formFile_img_tam').className = "form-control_error";
                    $('#Image_div').show();
                    error = true;
                    
                }
                else{
                    document.getElementById('formFile_img_tam').className = "form-control";
                }   

                if (error == true) {
                    return false;
                } else {
                    var tFullName = $('#tFullName').val();
                    var vEmail = $('#vEmail').val();
                    var iCategoryId=$('#iCategoryId option:selected').val();
                    var iSubCategoryId=$('#iSubCategoryId option:selected').val();
                    var iDistrictId=$('#iDistrictId option:selected').val();
                    // var vVideo=$('#formFile_video').val();
                    // var vImage=$('#formFile_img').val();

                    var formFile_video = $('#formFile_video').val().split('\\').pop();
                    var formFile_img = $('#formFile_img').val().split('\\').pop();
                    // document.forms["submission_form"].submit();
                    // ajaxCall(); 
                    // function ajaxCall() {
                    // $('#submission_form').submit(function(e){
                        // alert(tFullName);
                        // alert(vEmail);
                        // alert(iCategoryId);
                        // alert(iSubCategoryId);
                        // alert(iDistrictId);
                        // alert(vVideo);
                        // alert(vImage);
                        // e.preventDefault(); 
                        // send the formData
                        // var formData = new FormData($("#submission_form"));
                        var form_data = new FormData(document.getElementById("submission_form"));
                        // alert("test");
                        $.ajax({
                            url:"<?php echo base_url('Home/save_submission'); ?>",
                            type : "POST",
                            data: form_data,
                            processData: false,
                            contentType: false,
                            // dataType : "json",
                            // data : {
                            //     'tFullName' : tFullName, 
                            //     'vEmail' : vEmail, 
                            //     'iCategoryId' : iCategoryId, 
                            //     'iSubCategoryId' : iSubCategoryId, 
                            //     'iDistrictId' : iDistrictId, 
                            //     'formFile_video' : formFile_video, 
                            //     'formFile_img' : formFile_img
                            // },
                            // cache: false,
                            success: function(data){
                                console.log(data);                            
                                $('#exampleModalToggle').find('#ref_no').html(data).show;
                                $('#exampleModalToggle').modal('show');
                            },
                            error: function (req, status, err) {
                                // alert(err);
                                // console.log('Something went wrong', status, err);
                            }
                        });
                    // }); 
                    // }
                                       
                }
            }

            $('#exampleModalToggle').on('hidden.bs.modal', function () {
                location.reload();
            });



	</script>
  </body>
</html>
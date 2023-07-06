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
        });
    </script>

    <script>
     // hljs.initHighlightingOnLoad();

      $('.hero__scroll').on('click', function(e) {
          $('html, body').animate({
              scrollTop: $(window).height()
          }, 1200);
      });
    </script>

    <!--loading effects-->

 <script src="https://www.google.com/recaptcha/api.js?render=6LeA75cjAAAAAD6lX4cO1droxHHnDjcEM2hq5xmi"></script>
  
 <!--loading effects-->
 <script src="<?php echo base_url('assets/frontend/js/aos.js'); ?>"></script>

<script>
   AOS.init({
       easing: 'ease-out-back',
       duration: 1000
   });
</script>

<script>
  // hljs.initHighlightingOnLoad();

   $('.hero__scroll').on('click', function(e) {
       $('html, body').animate({
           scrollTop: $(window).height()
       }, 1200);
   });
</script>
<!--loading effects-->
 
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

        $('#iDistrictId').change(function(){ 
            var id=$(this).val();
            // alert(id);
            $.ajax({
                url : "<?php echo base_url('home/get_divisional_secretariat');?>",
                method : "POST",
                data : {dis_id: id},
                success: function(data){
                    $('#iDivSecretariatId').html(data); 
                }
            });
            return false;
        });
        
        $('#iDistrictIdSin').change(function(){ 
            var id=$(this).val();
            // alert(id);
            $.ajax({
                url : "<?php echo base_url('home/get_sin_divisional_secretariat');?>",
                method : "POST",
                data : {dis_id: id},
                success: function(data){
                    $('#iDivSecretariatIdSin').html(data); 
                }
            });
            return false;
        });
        
        $('#iDistrictIdTam').change(function(){ 
            var id=$(this).val();
            // alert(id);
            $.ajax({
                url : "<?php echo base_url('home/get_tam_divisional_secretariat');?>",
                method : "POST",
                data : {dis_id: id},
                success: function(data){
                    $('#iDivSecretariatIdTam').html(data); 
                }
            });
            return false;
        });
        
        //  $('#vEmail').blur(function(){
	    //     var email = $("#vEmail").val();
        //     var testEmail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,6})+$/;
        //     if (testEmail.test(email)){
        //         $("#Email_div").css('display', 'none');
        //     }
        //     else{
        //         $("#Email_div").css('display', 'block');
        //     }
	    // });

        $('#tFullName').blur(function(){
	        var tFullName = $("#tFullName").val();
            var letters = /^([\s.]?[a-zA-Z]+)+$/;
            if (letters.test(tFullName)){
                $("#FullName_div").css('display', 'none');
            }
            else{
                $("#FullName_div").css('display', 'block');
            }
	    });

        $('#tFullNameSin').blur(function(){
	        var tFullNameSin = $("#tFullNameSin").val();
            var letters = /^([\s.]?[a-zA-Z]+)+$/;
            if (letters.test(tFullNameSin)){
                $("#FullName_div").css('display', 'none');
            }
            else{
                $("#FullName_div").css('display', 'block');
            }
	    });

        $('#tFullNameTam').blur(function(){
	        var tFullNameTam = $("#tFullNameTam").val();
            var letters = /^([\s.]?[a-zA-Z]+)+$/;
            if (letters.test(tFullNameTam)){
                $("#FullName_div").css('display', 'none');
            }
            else{
                $("#FullName_div").css('display', 'block');
            }
	    });

        $('#formFile_img').change(function(){
            $('head').append('<style>#formFile_img:before{display:none !important;}</style>');
	        var image = $("#formFile_img").val();
            $(this).css("content",image);
	    });

        $('#formFile_img_sin').change(function(){
            $('head').append('<style>#formFile_img_sin:before{display:none !important;}</style>');
	        var image = $("#formFile_img_sin").val();
            $(this).css("content",video);
	    });

        $('#formFile_img_tam').change(function(){
            $('head').append('<style>#formFile_img_tam:before{display:none !important;}</style>');
	        var video = $("#formFile_img_tam").val();
            $(this).css("content",video);
	    });
	    
	    $('#formFile_video').change(function(){
            $('head').append('<style>#formFile_video:before{display:none !important;}</style>');
	        var video = $("#formFile_video").val();
            $(this).css("content",video);
	    });

        $('#formFile_video_sin').change(function(){
            $('head').append('<style>#formFile_video_sin:before{display:none !important;}</style>');
	        var video = $("#formFile_video_sin").val();
            $(this).css("content",video);
	    });
        
        $('#formFile_video_tam').change(function(){
            $('head').append('<style>#formFile_video_tam:before{display:none !important;}</style>');
	        var video = $("#formFile_video_tam").val();
            $(this).css("content",video);
	    });
	    
	    $('#formFile_video').change(function() {
            //this.files[0].size gets the size of your file.
            // alert(this.files[0].size);
            if (this.files[0].size < 52428800){
                // alert(this.files[0].size);
                $("#Video_limit_div").css('display', 'none');                    
            }
            else{
                var error = true;
                $("#Video_limit_div").css('display', 'block');
            }
        });

        $('#formFile_video_sin').change(function() {
            //this.files[0].size gets the size of your file.
            // alert(this.files[0].size);
            if (this.files[0].size < 52428800){
                // alert(this.files[0].size);
                $("#Video_limit_div").css('display', 'none');                    
            }
            else{
                var error = true;
                $("#Video_limit_div").css('display', 'block');
            }
        });

        $('#formFile_video_tam').change(function() {
            //this.files[0].size gets the size of your file.
            // alert(this.files[0].size);
            if (this.files[0].size < 52428800){
                // alert(this.files[0].size);
                $("#Video_limit_div").css('display', 'none');                    
            }
            else{
                var error = true;
                $("#Video_limit_div").css('display', 'block');
            }
        });
                    
	});     
	    
	        function  checkemptyEnglish() {
                var tFullName = $('#tFullName').val();
                // var vEmail = $('#vEmail').val();
                var iCategoryId=$('#iCategoryId option:selected').val();
                var iSubCategoryId=$('#iSubCategoryId option:selected').val();
                var iDistrictId=$('#iDistrictId option:selected').val();
                var iDivSecretariatId=$('#iDivSecretariatId option:selected').val();
                var tSchool = $('#tSchool').val();
                var iGrade=$('#iGrade option:selected').val();
                var formFile_video=$('#formFile_video').val();
                var formFile_img=$('#formFile_img').val();
                
                var error;
                
                var alphaExpNum = /^[0-9]+$/;
                var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                var letters = /^[A-Za-z]+$/;
                
                if(tFullName == '') {
                    document.getElementById('tFullName').className = "form-control_error";
                    $('#FullName_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('tFullName').className = "form-control";
                }
                
                // if(vEmail == '') {
                //     document.getElementById('vEmail').className = "form-control_error";
                //     $('#vEmail_div').show();
                //     error = true;
                    
                // }
                // else{ 
                //     document.getElementById('vEmail').className = "form-control";
                // }
                
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

                if(iDivSecretariatId == 0) {
                    document.getElementById('iDivSecretariatId').className = "form-control_error";
                    $('#DivSecretariat_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iDivSecretariatId').className = "form-control";
                }

                if(tSchool == 0) {
                    document.getElementById('tSchool').className = "form-control_error";
                    $('#School_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('tSchool').className = "form-control";
                }

                if(iGrade == 0) {
                    document.getElementById('iGrade').className = "form-control_error";
                    $('#Grade_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iGrade').className = "form-control";
                }
                
                if(formFile_video == '') {
                    document.getElementById('formFile_video').className = "form-control_error";
                    $('#Video_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('formFile_video').className = "form-control";
                }
                
                if(formFile_img == '') {
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
                    // var vEmail = $('#vEmail').val();
                    var iCategoryId=$('#iCategoryId option:selected').val();
                    var iSubCategoryId=$('#iSubCategoryId option:selected').val();
                    var iDistrictId=$('#iDistrictId option:selected').val();
                    var iDivSecretariatId=$('#iDivSecretariatId option:selected').val();
                    var tSchool = $('#tSchool').val();
                    var iGrade=$('#iGrade option:selected').val();

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
                        $body = $("section");
                        $.ajax({
                            url:"<?php echo base_url('Home/save_submission'); ?>",
                            type : "POST",
                            data: form_data,
                            processData: false,
                            contentType: false,
                            beforeSend: function(){
                                // Show image container
                                $body.addClass("loading");
                            },
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
                                $body.removeClass("loading");
                                console.log(data);                            
                                $('#exampleModalToggle').find('#ref_no').html(data).show;
                                $('#exampleModalToggle').modal('show');
                            },
                            error: function (req, status, err) {
                                // alert(err);
                                // console.log('Something went wrong', status, err);
                            },
                            complete:function(data){
                                // Hide image container
                                
                            }
                        });
                    // }); 
                    // }
                                       
                }
            }

            function  checkemptySinhala() {
                var tFullName = $('#tFullNameSin').val();
                // var vEmail = $('#vEmailSin').val();
                var iCategoryId=$('#iCategoryIdSin option:selected').val();
                var iSubCategoryId=$('#iSubCategoryIdSin option:selected').val();
                var iDistrictId=$('#iDistrictIdSin option:selected').val();
                var iDivSecretariatId=$('#iDivSecretariatIdSin option:selected').val();
                var tSchool = $('#tSchoolSin').val();
                var iGrade=$('#iGradeSin option:selected').val();
                var formFile_video=$('#formFile_video_sin').val();
                var formFile_img=$('#formFile_img_sin').val();
                
                var error;
                
                var alphaExpNum = /^[0-9]+$/;
                var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                var letters = /^[A-Za-z]+$/;
                
                if(tFullName == '') {
                    document.getElementById('tFullNameSin').className = "form-control_error";
                    $('#FullName_div').show();
                    error = true;                    
                }
                else{ 
                    document.getElementById('tFullNameSin').className = "form-control";
                }
                
                // if(vEmail == '') {
                //     document.getElementById('vEmailSin').className = "form-control_error";
                //     $('#vEmail_div').show();
                //     error = true;                    
                // }
                // else{ 
                //     document.getElementById('vEmailSin').className = "form-control";
                // }
                
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

                if(iDivSecretariatId == 0) {
                    document.getElementById('iDivSecretariatIdSin').className = "form-control_error";
                    $('#DivSecretariat_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iDivSecretariatIdSin').className = "form-control";
                }

                if(tSchool == 0) {
                    document.getElementById('tSchoolSin').className = "form-control_error";
                    $('#School_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('tSchoolSin').className = "form-control";
                }

                if(iGrade == 0) {
                    document.getElementById('iGradeSin').className = "form-control_error";
                    $('#Grade_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iGradeSin').className = "form-control";
                }
                
                if(formFile_video == '') {
                    document.getElementById('formFile_video_sin').className = "form-control_error";
                    $('#Video_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('formFile_video_sin').className = "form-control";
                }
                
                if(formFile_img == '') {
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
                    // var vEmail = $('#vEmailSin').val();
                    var iCategoryId=$('#iCategoryIdSin option:selected').val();
                    var iSubCategoryId=$('#iSubCategoryIdSin option:selected').val();
                    var iDistrictId=$('#iDistrictIdSin option:selected').val();
                    var iDivSecretariatId=$('#iDivSecretariatIdSin option:selected').val();
                    var tSchool = $('#tSchoolSin').val();
                    var iGrade=$('#iGradeSin option:selected').val();

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

            function  checkemptyTamil() {
                var tFullName = $('#tFullNameTam').val();
                // var vEmail = $('#vEmailTam').val();
                var iCategoryId=$('#iCategoryIdTam option:selected').val();
                var iSubCategoryId=$('#iSubCategoryIdTam option:selected').val();
                var iDistrictId=$('#iDistrictIdTam option:selected').val();
                var iDivSecretariatId=$('#iDivSecretariatIdTam option:selected').val();
                var tSchool = $('#tSchoolTam').val();
                var iGrade=$('#iGradeTam option:selected').val();
                var formFile_video=$('#formFile_video_tam').val();
                var formFile_img=$('#formFile_img_tam').val();
                
                var error;
                
                var alphaExpNum = /^[0-9]+$/;
                var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                var letters = /^[A-Za-z]+$/;
                
                if(tFullName == '') {
                    document.getElementById('tFullNameTam').className = "form-control_error";
                    $('#FullName_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('tFullNameTam').className = "form-control";
                }
                
                if(vEmail == '') {
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

                if(iDivSecretariatId == 0) {
                    document.getElementById('tSchoolTam').className = "form-control_error";
                    $('#DivSecretariat_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('tSchoolTam').className = "form-control";
                }

                if(tSchool == 0) {
                    document.getElementById('tSchoolTam').className = "form-control_error";
                    $('#School_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('tSchoolTam').className = "form-control";
                }

                if(iGrade == 0) {
                    document.getElementById('iGradeTam').className = "form-control_error";
                    $('#Grade_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('iGradeTam').className = "form-control";
                }
                
                if(formFile_video == '') {
                    document.getElementById('formFile_video_tam').className = "form-control_error";
                    $('#Video_div').show();
                    error = true;
                    
                }
                else{ 
                    document.getElementById('formFile_video_tam').className = "form-control";
                }
                
                if(formFile_img == '') {
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
                    var tFullName = $('#tFullNameTam').val();
                // var vEmail = $('#vEmailTam').val();
                var iCategoryId=$('#iCategoryIdTam option:selected').val();
                var iSubCategoryId=$('#iSubCategoryIdTam option:selected').val();
                var iDistrictId=$('#iDistrictIdTam option:selected').val();
                var iDivSecretariatId=$('#iDivSecretariatIdTam option:selected').val();
                var tSchool = $('#tSchoolTam').val();
                var iGrade=$('#iGradeTam option:selected').val();
                var formFile_video=$('#formFile_video_tam').val();
                var formFile_img=$('#formFile_img_tam').val();

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
        <script>
            // $('#submission_form').submit(function(e){
            //     // alert("test");
            //     e.preventDefault(); 
            //         $.ajax({
            //             url:"<?php echo base_url('Home/save_submission'); ?>",
            //             type:"post",
            //             data:new FormData(this),
            //             processData:false,
            //             contentType:false,
            //             cache:false,
            //             async:false,
            //             success: function(data){
            //                 // consolde.log(data);
            //                 $('#exampleModalToggle').find('#ref_no').html(data).show;
            //                 // if(data!=0)
            //                 // {
            //                 // $('#ref_no').val(data); 
            //                 // }else{
            //                 // return false;
            //                 // }
            //         }
            //         });
            //     }); 

            //     $('#exampleModalToggle').on('hidden.bs.modal', function () {
            //         location.reload();
            //     });
        </script>



  </body>
</html>
<?php
if ($saveStatus == "A") {
    $vFirstName = "";
    $vLastName = "";
    $vEmail = "";
    $vContactNo = "";
    $vUserName = "";
    $iUserType = "";
    $id = "";
    $cEnable = "";
    $catPrivilages = "";
    $form_title = "Add User";
}else{
    $form_title = "Edit User";
}
?>
<style>
.myDiv{
	display:none;
    
}
</style> 
<div class="right_col" role="main">
    <div class="">

        <!-- <div class="page-title">
            <div class="title_left">
                <h3>
                    Backend User
                </h3>
            </div> -->


        <!--</div>-->
        <div class="clearfix"></div>
        <div style="text-align:center;">
            <div id="dialog" title="Error" style="display: none;">
                <p>Please fill required information.</p>
            </div>
            <?php
            $showinput = 1;
            if ($this->session->flashdata('message_saved') != "") {

                $showinput = 0;
                ?>
                <div  style="color:#096;">
                    <?php echo $this->session->flashdata('message_saved'); ?>
                </div>
                <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('message_restricted') != "") {
                $showinput = 0;
                ?>
                <div  style="color:#F00;">
                    <?php echo $this->session->flashdata('message_restricted'); ?>
                </div>
                <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('message_error') != "" || validation_errors() != "") {
                $showinput = 0;
                ?>
                <div  style="color:#F00;">
                    <?php
                    echo validation_errors('<div style="height:22px; padding:0px; margin-bottom:5px; " class="alert alert-danger" role="alert">', '</div>');
                    echo $this->session->flashdata('message_error');
                    ?>
                </div>
                <?php
            }
            ?>

        </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <!-- <div class="x_title">
                        <h2><a class="collapse-link" style="cursor:pointer; text-decoration:none;"><span class="btn btn-dark"  style="color:#FFF; padding-top:2px; padding-bottom:2px;"><?php echo $form_title; ?></span></a></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div> -->
                    <div class="x_title">
                        <div class="col-md-9 col-sm-9 col-xs-9">                                  
                            <h2>Backend User</h2>                                
                        </div>
                        <ul class="nav navbar-right col-md-3 col-sm-3 col-xs-3">
                            <li><a class="collapse-link" style="text-align:right;cursor:pointer;">
                                <span class="btn btn-dark"  style="color:#FFF;"><?php echo $form_title; ?></span>
                                &nbsp;<i class="fa fa-chevron-down"></i></a>
                            </li>

                        </ul>
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" <?php if ($saveStatus == "A" && $showinput == 1) { ?> style="display:none;" <?php } ?>>
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('adminpanel/master/user/save_user'); ?>" method="post" novalidate>
                            <!--data-parsley-validate-->
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">First Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="vFirstName" name="vFirstName" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vFirstName', $vFirstName); ?>">

                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Last Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="vLastName" name="vLastName" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vLastName', $vLastName); ?>">

                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Email<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="email" id="vEmail" name="vEmail" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vEmail', $vEmail); ?>">

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Contact No<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="tel" id="vContactNo" name="vContactNo" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vContactNo', $vContactNo); ?>">

                                    </div>
                                </div>
                                
                                <?php 
                                    $count = 1;
                                    foreach ($category as $categories) {
                                ?>
                                
                                    <div class="item form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12"><?php if($count=== 1){echo "Categories";}?><span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="checkbox"  value="<?php echo $categories->id; ?>" name="vCatPrivilages[]" id="catPrivilages" class="flat"
                                            <?php 
                                                if(isset($vCatPrivilages))
                                                {
                                                    $arr = explode(',',$vCatPrivilages);
                                                    foreach($arr as $num)
                                                    {
                                                        if($categories->id == $num)
                                                        {
                                                            echo "checked";
                                                        }
                                                    }
                                                }
                                            ?>
                                            >&nbsp;&nbsp;
                                            <label style="padding-left:0px;"><?php echo $categories->vCategoryName; ?></label>
                                        </div>
                                    </div>
                                <?php 
                                        $count++;
                                    }
                                ?>


                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Status<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="cEnable" id="cEnable" class="form-control" required data-parsley-id="1297">
                                            <option value="Y" <?php if ($cEnable == 'Y') { ?>selected="selected"<?php } ?> <?php echo set_select('cEnable', 'Y'); ?>>Active</option>
                                            <option value="N" <?php if ($cEnable == 'N') { ?>selected="selected"<?php } ?> <?php echo set_select('cEnable', 'N'); ?> >Inactive</option>
                                        </select>

                                    </div>
                                </div>
                                    <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">User Type<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="iUserType" id="iUserType" class="form-control" required data-parsley-id="1297">
                                            <option value=""></option>
                                            <?php
                                            foreach ($iUserTypeArr as $row) {
                                                $u_type_id = trim($row->id);
                                                if ($u_type_id == $iUserType) {
                                                    echo '<option value="' . $u_type_id . '" selected="selected">' . $row->vAccTypeName . '</option>';
                                                } else {
                                                    echo '<option value="' . $u_type_id . '">' . $row->vAccTypeName . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">User Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="vUserName" name="vUserName" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vUserName', $vUserName); ?>">
                                            <input type="hidden" id="cSaveStatus" name="cSaveStatus" value="<?php echo $saveStatus; ?>">
                                            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                            <input type="hidden" id="tbl_name" name="tbl_name" value="tbl_backend_user">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="pPassword" class="control-label col-md-4">Password<span class="required">*</span></label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input id="pPassword" type="password" name="pPassword" data-validate-length="6,7,8,9,10,11,12,13,14" class="form-control col-md-7 col-xs-12" required>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="cPassword" class="control-label col-md-4 col-sm-3 col-xs-12">Confirm Password<span class="required">*</span></label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input id="cPassword" type="password" name="cPassword" data-validate-linked="pPassword" class="form-control col-md-7 col-xs-12" required >
                                        </div>
                                    </div>     
                                    <?php /* ?>
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <!--<input id="pPassword" name="pPassword" class="form-control col-md-7 col-xs-12" type="password" required >-->
                                            <input id="pPassword" class="form-control col-md-7 col-xs-12" type="password" required="required" data-validate-length="6,8" name="pPassword">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Confirm Password<span class="required">*</span></label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input id="cPassword" class="form-control col-md-7 col-xs-12" type="password" required="required" data-validate-linked="pPassword" name="cPassword">
                                        </div>
                                    </div> 
                                    <?php */?>    
                                                        
                                <div style="clear:both;"></div>

                                
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div style="clear:both;"></div><br>
                                <div class="ln_solid" ></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-6 col-xs-12 ">
                                    <a href="<?php echo base_url() . 'adminpanel/master/user/add_user'?>"><button type="button" class="btn btn-default pull-right">Cancel</button></a>
                                        <button type="submit" class="btn btn-primary pull-right" >Submit</button>
                                    </div>
                                </div>
                            </div>     
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th>ID </th>
                                    <th>User Name </th>
                                    <th>First Name </th>
                                    <th>Last Name </th>
                                    <th>E-Mail </th>
                                    <th>Contact Number </th>
                                    <th>Edit </th>
                                    <th>Status </th>
                                    <th>Delete </th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $oddeven_count = 0;
                                foreach ($list_data as $rowlist) {
                                    $oddeven_count++;
                                    if ($oddeven_count == 1) {
                                        $oddeven = 'even pointer';
                                    } else {
                                        $oddeven = 'odd pointer';
                                        $oddeven_count = 0;
                                    }

                                    $recordid = $rowlist->id;
                                    $cEnable = $rowlist->cEnable;
                                    if ($cEnable == 'Y') {
                                        $clicon = 'fa fa-check';
                                    } else {
                                        $clicon = 'fa fa-remove';
                                    }
                                    ?>
                                    <tr class="<?php echo $oddeven; ?>">
                                        <td class="a-center "><?php echo $recordid; ?></td>
                                        <td class=" "><?php echo $rowlist->vUserName; ?></td>
                                        <td class=" "><?php echo $rowlist->vFirstName; ?></td>
                                        <td class=" "><?php echo $rowlist->vLastName; ?></td>
                                        <td class=" "><?php echo $rowlist->vEmail; ?></td>
                                        <td class=" "><?php echo $rowlist->vContactNo; ?></td>
                                        <td class=" "><a href="<?php echo base_url() . "adminpanel/master/user/update_user/$recordid" ?>">
                                                <i class="fa fa-edit"></i></a>

                                        </td>
                                        <td class=" "><a onclick="return confirm('Are you sure you want to change this?');" href="<?php echo base_url() . "adminpanel/master/user/change_status/status/$recordid" ?>">
                                                <i class="<?php echo $clicon; ?>"></i></a>

                                        </td>
                                        <td class="a-right a-right "><a onclick="return confirm('Are you sure you want to delete this?');" href="<?php echo base_url() . "adminpanel/master/user/delete_record/delete/$recordid" ?>">
                                                <i class="fa fa-trash-o"></i></a></td>

                                        </td>
                                    </tr>


                                <?php } ?>


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .DTTT_container
        {
            display:none !important;
            visibility:hidden !important;
        }

        .alert
        {
            margin-left: 161px;
            border-style: none;
        }		
        .form-control_error
        {
            background-color: #fff;
            background-image: none;
            border: 1px solid #E01A39;
            border-radius: 0;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            color: #555;
            display: block;
            font-size: 14px;
            height: 50px;
            line-height: 1.42857;
            padding: 6px 12px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
            width: 100%;  
        }	
    </style>
    <script>


        $(".btn-default").click(function() {
         $(this).closest('form').find("input[type=text], textarea").val("");
         $(this).closest('form').find("input[type=password], textarea").val("");
         $(this).closest('form').find("input[type=number], textarea").val("");
         $(this).closest('form').find("input[type=email], textarea").val("");
            $('#iUserType').prop('selectedIndex', 0);
            $('#cEnable').prop('selectedIndex', 0);
         $('.form-group').removeClass('bad');
            $('.alert').attr('hidden', 'true');
         $('.alert').removeClass('alert');
         
        });


    </script>                 

</div>
<script>
    // initialize the validator function
    validator.message['date'] = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required')
            .on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
    });

    // bind the validation to the form submit event
    //$('#send').click('submit');//.prop('disabled', true);

    $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;
        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit)
            this.submit();
        return false;
    });

    /* FOR DEMO ONLY */
    $('#vfields').change(function() {
        $('form').toggleClass('mode2');
    }).prop('checked', false);

    $('#alerts').change(function() {
        validator.defaults.alerts = (this.checked) ? false : true;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function(){        
        $("#vContactNo").blur(function(){
            var error;
            var phoneHome = $("#vContactNo").val();
            var alphaExpNum = /^[0-9]+$/;
            
            if(phoneHome.length < 10 || phoneHome.length > 10 || !phoneHome.match(alphaExpNum) ) {
              document.getElementById('vContactNo').className = "form-control_error";
        		error = true;
                  
            }else{ document.getElementById('vContactNo').className = "form-control";}
                // alert("This input field has lost its focus.");
        });
    });
</script>
<!-- <script type="text/javascript">

        $('#iUserType').change(function() {

            var iUserType = $(this).val();
            // console.log(iProvinceid);

            if (iUserType=='Branch Manager') {

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('adminpanel/master/User/get_branch_detail'); ?>",
                    data: { iUserType:iUserType },
                    dataType:"JSON",
                    success: function(res) {

                            $("#iUserType").empty();
                            $("#iUserType").append('<option value="0">Select Model</option>');
                            $.each(res, function(key, value) {

                                    $("#iUserType").append('<option value="' + res[key].id + '">' + res[key].vCityName +
                                    '</option>');
                            });
                    }
                });
            } else {

                $("#iUserType").empty();
            }
        });

    </script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>      

<script>
$(document).ready(function(){
    $('#iUserType').on('change', function(){
    	var demovalue = $(this).val(); 
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });
});
</script> 
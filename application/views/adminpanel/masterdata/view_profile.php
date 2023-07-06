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
}
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Change Password
                </h3>
            </div>
        </div>
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
                    <div class="x_content" <?php if ($saveStatus == "A" && $showinput == 1) { ?> style="display:none;" <?php } ?>>
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('adminpanel/master/profile/save_profile'); ?>" method="post" novalidate>
                            <!--data-parsley-validate-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">First Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="vFirstName" name="vFirstName" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vFirstName', $vFirstName); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Last Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="vLastName" name="vLastName" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vLastName', $vLastName); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Email<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="email" id="vEmail" name="vEmail" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vEmail', $vEmail); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Contact No<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="number" id="vContactNo" name="vContactNo" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vContactNo', $vContactNo); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Status<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="cEnable" id="cEnable" class="form-control" required="" data-parsley-id="1297"  disabled="disabled">
                                            <option value="Y" <?php if ($cEnable == 'Y') { ?>selected="selected"<?php } ?> <?php echo set_select('cEnable', 'Y'); ?>>Active</option>
                                            <option value="N" <?php if ($cEnable == 'N') { ?>selected="selected"<?php } ?> <?php echo set_select('cEnable', 'N'); ?> >Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">User Type<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="iUserType" id="iUserType" class="form-control" required="" data-parsley-id="1297" disabled="disabled">
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
                                        <input type="text" id="vUserName" name="vUserName" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vUserName', $vUserName); ?>" readonly="readonly">
                                    </div>
                                </div>
                                <?php /* ?> <div class="item form-group">
                                  <label for="pPasswordold" class="control-label col-md-4">Old Password<span class="required">*</span></label>
                                  <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input id="pPasswordold" type="password" name="pPasswordold" data-validate-length="12,12" class="form-control col-md-7 col-xs-12" required>
                                  </div>
                                  </div>
                                  <div class="item form-group">
                                  <label for="cPassword" class="control-label col-md-4 col-sm-3 col-xs-12">Repeat Old Password<span class="required">*</span></label>
                                  <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input id="cPassword" type="password" name="cPassword" data-validate-linked="pPasswordold" class="form-control col-md-7 col-xs-12" required>
                                  </div>
                                  </div>   <?php */ ?>  
                                <div class="item form-group">
                                    <label for="pPassword" class="control-label col-md-4">New Password<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input id="pPassword" type="password" name="pPassword"  class="form-control col-md-7 col-xs-12" required><!--data-validate-length="12,12"-->
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="cPassword" class="control-label col-md-4 col-sm-3 col-xs-12">Confirm New Password<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input id="cPassword" type="password" name="cPassword" data-validate-linked="pPassword" class="form-control col-md-7 col-xs-12" required>
                                    </div>
                                </div>      
                            </div>
                            <div style="clear:both;"></div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-11">
                                    <!--<button type="submit" class="btn btn-primary">Cancel</button>-->
                                    <button type="submit" class="btn btn-success" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .alert
        {
            margin-left: 161px;
            border-style: none;
        }			
    </style>
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
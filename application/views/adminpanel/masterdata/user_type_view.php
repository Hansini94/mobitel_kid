<?php
if ($saveStatus == "A") {
    $vAccTypeName = "";
    $vAccDescription = "";
    $id = "";
    $cEnable = "";
    
    $selected_records = array();
} else {
    if ($saveStatus) {
        
    }
}
?>
<div class="right_col" role="main">
    <div class="">
        <!-- <div class="page-title">
            <div class="title_left">
                <h3>
                    User Type
                </h3>
            </div>
        </div> -->
        <div class="clearfix">
            <div id="dialog" title="Error" style="display: none;">
                <p>Please fill required information.</p>
            </div>
            <?php
            if ($this->session->flashdata('message_saved') != "") {
                ?>
                <div  style="color:#096;">
                    <?php echo $this->session->flashdata('message_saved'); ?>
                </div>
                <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('message_restricted') != "") {
                ?>
                <div  style="color:#F00;">
                    <?php echo $this->session->flashdata('message_restricted'); ?>
                </div>
                <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('message_error') != "" || validation_errors() != "") {
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
                        <h2><a class="collapse-link" style="cursor:pointer; text-decoration:none;"><span class="btn btn-dark"  style="color:#FFF;">Add User Type</span></a></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                            </li>
                        </ul>
                    </div> -->

                    <div class="x_title">
                        <div class="col-md-9 col-sm-9 col-xs-9">                                  
                            <h2>User Type</h2>                                
                        </div>
                        <ul class="nav navbar-right col-md-3 col-sm-3 col-xs-3">
                            <li><a class="collapse-link" style="text-align:right;cursor:pointer;">
                                <span class="btn btn-dark"  style="color:#FFF;">Add User Type</span>
                                &nbsp;<i class="fa fa-chevron-down"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content" <?php if ($saveStatus == "A") { ?> style="display:none;" <?php } ?>>
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('adminpanel/master/user_type/save_user_type'); ?>" method="post">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">User Account Type<span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="vAccTypeName" name="vAccTypeName" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vAccTypeName', $vAccTypeName); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group" >
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Account Description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" id="vAccDescription" name="vAccDescription" required class="form-control col-md-7 col-xs-12" value="<?php echo set_value('vAccDescription', $vAccDescription); ?>">
                                        <input type="hidden" id="cSaveStatus" name="cSaveStatus" value="<?php echo $saveStatus; ?>">
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" id="tbl_name" name="tbl_name" value="tbl_user_type">
                                    </div>
                                </div>
                                </div>
                            
                            
                            <div style="clear:both;"></div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <?php /* ?><div class="x_title">
                                      <h2>Stripped table <small>Stripped table subtitle</small></h2>
                                      <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                      </li>
                                      <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                      <ul class="dropdown-menu" role="menu">
                                      <li><a href="#">Settings 1</a>
                                      </li>
                                      <li><a href="#">Settings 2</a>
                                      </li>
                                      </ul>
                                      </li>
                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                      </ul>
                                      <div class="clearfix"></div>
                                      </div><?php */ ?>
                                    <div class="x_content" <?php if ($saveStatus == "A") { ?> style="display:none;" <?php } ?>>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:left;">#</th>
                                                    <th style="text-align:left;">Form Name</th>
                                                    <th style="text-align:center;">View</th>
                                                    <th style="text-align:center;">Edit</th>
                                                    <th style="text-align:center;">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($gr_records as $row) {
                                                    if ($row->parent_order != "")
                                                        $bgColor = "#f0f8f8";
                                                    else
                                                        $bgColor = "#FFFFFF";

                                                    $arr_privilages[0] = '';
                                                    $arr_privilages[1] = '';
                                                    $arr_privilages[2] = '';
                                                    //print_r($selected_records);
                                                    //echo "<br>";
                                                    if (count($selected_records) > 0) {
                                                        $privilages = "";

                                                        foreach ($selected_records as $row_sr) {
                                                            if ($row->page_id == $row_sr->iFormID) {
                                                                $privilages = $row_sr->vPrivilages;
                                                            }
                                                        }
                                                        if ($privilages != "")
                                                            $arr_privilages = explode(",", $privilages);
                                                    }
                                                    // print_r($arr_privilages);
                                                    // echo "<br>";
                                                    $sequenseID = $row->id . '`' . $row->is_parent . '`' . $row->parent_id;
                                                    ?>
                                                    <tr bgcolor="<?php echo $bgColor; ?>">
                                                        <th scope="row" style="text-align:left;"><input type="hidden" name="rowCount[]" id="row<?php echo $no; ?>" value="<?php echo $row->id ?>"/>
                                                            <input type="hidden" id="parent_id<?php echo $no; ?>" value="<?php echo $sequenseID ?>"/>
                                                            <?php echo $no ?></th>
                                                        <td style="text-align:left;"><?php
                                                            if ($row->parent_id != "0") {
                                                                ?>
                                                                <span style="padding-left: 20px;"><?php echo $row->title ?></span>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <span style="padding-left: 0px;"><?php echo $row->title ?></span>
                                                                <?php
                                                            }
                                                            ?></td>
                                                        <td style="text-align:center;">
                                                            <div class="checkbox">
                                                                <label style="padding-left:0px;">
                                                                    <input type="checkbox"  onclick="checked_view_check_box(<?php echo $no; ?>)" value="1" <?php if ($arr_privilages[0] == 1) { ?> checked="check" <?php } ?> name="view<?php echo $row->id ?>" id="view<?php echo $no ?>" class="flat">
                                                                </label>
                                                            </div></td>
                                                        <td style="text-align:center;">
                                                            <div class="checkbox">
                                                                <label style="padding-left:0px;">
                                                                    <input type="checkbox"  onclick="checked_edit_check_box(<?php echo $no; ?>)" value="2" <?php if ($arr_privilages[1] == 2) { ?> checked="check" <?php } ?> name="edit<?php echo $row->id ?>" id="edit<?php echo $no ?>" class="flat">
                                                                </label>
                                                            </div></td>
                                                        <td style="text-align:center;">
                                                            <div class="checkbox">
                                                                <label style="padding-left:0px;">
                                                                    <input type="checkbox"  onclick="checked_delete_check_box(<?php echo $no; ?>)" value="3" <?php if ($arr_privilages[2] == 3) { ?> checked="check" <?php } ?> name="delete<?php echo $row->id ?>" id="delete<?php echo $no ?>" class="flat">
                                                                </label>
                                                            </div></td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                }
                                                ?>    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-6 col-xs-12 ">
                                <a href="<?php echo base_url() . 'adminpanel/master/user_type/add_user_type'?>"><button type="button" class="btn btn-default pull-right">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
                                    <th>Account Type </th>
                                    <th>Description </th>
                                    <th>Date </th>
                                    <th style="width:80px; text-align:center">Edit </th>
                                    <th style="width:80px; text-align:center">Status </th>
                                    <th style="width:80px; text-align:center">Delete </th>
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
                                        <td><?php echo $rowlist->vAccTypeName; ?></td>
                                        <td><?php echo $rowlist->vAccDescription; ?></td>
                                        <td><?php echo $rowlist->dSaveDate; ?></td>
                                        <td style="text-align:center;">
                                           
                                            <a href="<?php echo base_url() . "adminpanel/master/user_type/update_user/$recordid" ?>"><i class="fa fa-edit"></i></a>
                                           
                                        </td>
                                        <td style="text-align:center;">
                                            <?php if($recordid != 1) { ?>
                                                <a  href="<?php echo base_url() . "adminpanel/master/user_type/change_status/status/$recordid" ?>">
                                                <i class="<?php echo $clicon; ?>"></i></a>
                                                <?php } ?>
                                        </td>
                                        <td class="a-right a-right" style="text-align:center;">
                                            <?php if($recordid != 1) { ?>
                                                <a  href="<?php echo base_url() . "adminpanel/master/user_type/delete_record/delete/$recordid" ?>">
                                                <i class="fa fa-trash-o"></i></a>
                                                <?php } ?>
                                            </td>
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
    </style>
    <script>


                                                                        $(".btn-default").click(function() {
                                                                            $(this).closest('form').find("input[type=text], textarea").val("");
                                                                            $(this).closest('form').find("input[type=checkbox], textarea").val("");
                                                                            $('.selected').removeClass('selected');
                                                                            $('.checked').removeClass('checked');

                                                                        });

    </script> 
</div>

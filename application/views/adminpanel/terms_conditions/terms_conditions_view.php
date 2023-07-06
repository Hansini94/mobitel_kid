<?php
if ($cSaveStatus == "E") {
    $id = $list_data[0]->id;
    $tContent_eng = $list_data[0]->tContent_eng;
    $tContent_sin = $list_data[0]->tContent_sin;
    $tContent_tam = $list_data[0]->tContent_tam;
} else {
    $id = "";   
	$tContent_eng = ""; 
    $tContent_sin = ""; 
    $tContent_tam = "";
}
?>
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div style="text-align:center;">
            <div id="dialog" title="Error" style="display: none;">
                <p>Please fill required information.</p>
            </div>
            <?php
            $showinput = 1;
            if ($this->session->flashdata('testimonial_saved') != "") {
                $showinput = 0;
                ?>
                <div  style="color:#096;">
                    <?php echo $this->session->flashdata('testimonial_saved'); ?>
                </div>
                <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('testimonial_restricted') != "") {
                $showinput = 0;
                ?>
                <div  style="color:#F00;">
                    <?php echo $this->session->flashdata('testimonial_restricted'); ?>
                </div>
                <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('testimonial_error') != "" || validation_errors() != "") {
                $showinput = 0;
                ?>
                <div  style="color:#F00;">
                    <?php
                    echo validation_errors('<div style="height:22px; padding:0px; margin-bottom:5px; " class="alert alert-danger" role="alert">', '</div>');
                    echo $this->session->flashdata('testimonial_error');
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                    
                    <div class="x_title">
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <h2>Terms & Conditions</h2>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <ul class="nav navbar-right">
                                <!-- <?php if($cSaveStatus == "E") { ?>
                                <li><a class="collapse-link" href="<?php echo base_url('adminpanel/terms_conditions/terms_conditions'); ?>" style="text-align:right;cursor:pointer;"><span class="btn btn-dark"  style="color:#FFF;">Add Detail</span>&nbsp;</a></li>
                                <?php } else { ?>
                                <li><a class="collapse-link" style="text-align:right;cursor:pointer;"><span class="btn btn-dark"  style="color:#FFF;">Add Detail</span>&nbsp;<i class="fa fa-chevron-down"></i></a></li>
                                <?php } ?> -->
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                                
                    <div class="x_content" >
                        <br />
                        <form id="edit_data" name="edit_data" action="<?php echo base_url('adminpanel/terms_conditions/terms_conditions/save_terms'); ?>" method="post"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                        
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-12 col-xs-12" for="vProTitle">Content English<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <textarea rows="15" name="tContent_eng" id="tContent_eng" class="form-control col-md-7 col-xs-12" required><?php echo $tContent_eng; ?></textarea>
                                        <?php echo display_ckeditor($ckeditor_tContent_eng); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-12 col-xs-12" for="vProTitle">Content Sinhala<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <textarea rows="15" name="tContent_sin" id="tContent_sin" class="form-control col-md-7 col-xs-12" required><?php echo $tContent_sin; ?></textarea>
                                        <?php echo display_ckeditor($ckeditor_tContent_sin); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-12 col-xs-12" for="vProTitle">Content Tamil<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <textarea rows="15" name="tContent_tam" id="tContent_tam" class="form-control col-md-7 col-xs-12" required><?php echo $tContent_tam; ?></textarea>
                                        <?php echo display_ckeditor($ckeditor_tContent_tam); ?>
                                    </div>
                                </div>
                            </div>

                            <div style="clear:both;"></div>
                            <div class="ln_solid" style="margin-top:2px; margin-bottom:8px;"></div>
                            
                            <div class="form-group" style="margin-bottom:0px;">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" id="uploadpath" name="uploadpath" value="front_img">
                                    <input type="hidden" id="cSaveStatus" name="cSaveStatus" value="<?php echo $cSaveStatus; ?>">
                                    <button type="button" class="btn btn-default pull-right" onclick="document.location.href = '<?php echo base_url('adminpanel/terms_conditions/terms_conditions'); ?>';">Cancel</button>
                                    <button type="button" class="btn btn-primary pull-right" onclick="checkempty()">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style=" padding-top:0px;">
                    <div class="x_content">
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th style="display:none;">ID </th>
                                    <th style="width:8%;text-align:center;">No </th>
                                    <th style="width:35%;">Title </th>      
                                    <th style="width:8%; text-align:center">Order</th>                   
                                    <th style="width:8%; text-align:center">Edit </th>
                                    <th style="width:8%; text-align:center">Status </th>
                                    <th style="width:8%; text-align:center">Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $oddeven_count = 0;
                                $no_count = 0;
                                if (count($list_data) != 0) {
                                    foreach ($list_data as $rowlist) {
                                        $oddeven_count++;
                                        $no_count++;
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
                                            <td class="a-center " style="display:none;"><?php echo $no_count; ?></td>
                                            <td style="text-align:center;"><?php echo $no_count; ?></td>
                                            <td><?php echo $rowlist->vTitle;?></td>                                          
                                            <td><?php echo $rowlist->iOrder;?></td> 
                                            <td style="text-align:center;"><a href="<?php echo base_url() . "adminpanel/terms_conditions/terms_conditions/edit/$recordid" ?>">
                                                    <i class="fa fa-edit"></i></a>
                                            </td>
                                            <td style="text-align:center;"><a  href="<?php echo base_url() . "adminpanel/terms_conditions/terms_conditions/change_status/status/$recordid" ?>" onclick="return confirm('Are you sure?')">
                                                    <i class="<?php echo $clicon; ?>"></i></a>
                                            </td>
                                            <td class="a-right a-right" style="text-align:center;"><a  href="<?php echo base_url() . "adminpanel/terms_conditions/terms_conditions/delete_record/delete/$recordid" ?>" onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash-o"></i></a></td>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
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
    </style>
   
   <script>
    function  checkempty() {
        var tContent_eng = $("#tContent_eng iframe").contents().find("body").length;
        var tContent_sin = $("#tContent_sin").val();
        var tContent_tam = $("#tContent_tam").val();
        
        var error;
alert(tContent_eng);
        if(tContent_eng == '') {
            // alert(tContent_eng);
            document.getElementById('tContent_eng').className = "form-control_error";
            error = true;            
        }
        else
        { 
            alert("filled");
            document.getElementById('tContent_eng').className = "form-control";
        }
        
        if(tContent_sin == '') {
            document.getElementById('tContent_sin').className = "form-control_error";
            error = true;            
        }
        else
        { 
            document.getElementById('tContent_sin').className = "form-control";
        }

        if(tContent_tam == '') {
            document.getElementById('tContent_tam').className = "form-control_error";
            error = true;            
        }
        else
        { 
            document.getElementById('tContent_tam').className = "form-control";
        }
        
        if (error == true) {
            return false;
        } else {
            document.forms["edit_data"].submit();
        }
    }
</script>
</div>

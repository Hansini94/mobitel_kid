<?php
if ($cSaveStatus == "E") {
    $id = $edit_data['id'];
    $vReferenceNo = $edit_data['vReferenceNo'];
    $tFullName = $edit_data['tFullName'];
    $vEmail = $edit_data['vEmail'];
    $iCategoryId = $edit_data['iCategoryId'];
    $iSubCategoryId = $edit_data['iSubCategoryId'];
    $iDistrictId = $edit_data['iDistrictId'];
} else {
    $id = ""; 
    $vReferenceNo = "";    
    $tFullName = "Y";
    $vEmail = "";
    $iCategoryId = "";
    $iSubCategoryId = "";
    $iDistrictId = "";
}
?>
<div class="right_col" role="main">
    <div class=""></div>
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
                      
                    <div class="x_title">
                        <div class="col-md-9 col-sm-9 col-xs-9">                                  
                            <h2>Submissions</h2>                                
                        </div>
                        <!--<ul class="nav navbar-right col-md-3 col-sm-3 col-xs-3">-->
                        <!--    <li><a class="collapse-link" style="text-align:right;cursor:pointer;">-->
                        <!--        <span class="btn btn-dark"  style="color:#FFF;"></span>-->
                        <!--        &nbsp;<i class="fa fa-chevron-down"></i></a>-->
                        <!--    </li>-->

                        <!--</ul>-->
                       
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="x_content" >
                        <br />
                        <!--<form action="<?php echo base_url('adminpanel/submission/submissions/search_data'); ?>" method="post" class="form-horizontal form-label-left">-->
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url('adminpanel/submission/submissions/search_data'); ?>" method="post" novalidate>
                 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">From Date
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        
                                        <input type="date" id="from_date" name="from_date"  class="form-control col-md-7 col-xs-12" value="" > 

                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">To Date
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="date" id="to_date" name="to_date"  class="form-control col-md-7 col-xs-12" value="" > 

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Main Category
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="category_id" id="category_id" class="form-control" required data-parsley-id="1297">
                                            <option value="">Select</option>
                                            <?php  foreach($category as $categories){
                                                echo "<option value='".$categories->id."'>".$categories->vCategoryName."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>                                
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Sub Category
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="sub_category_id" id="sub_category_id" class="form-control" required data-parsley-id="1297">
                                            <option value="">Select</option>
                                            
                                        </select>
                                    </div>
                                </div>                              
                                <div class="item form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">District
                                    </label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select name="district_id" id="district_id" class="form-control" required data-parsley-id="1297">
                                            <option value="">Select</option>
                                            <?php 
                                        foreach($district as $districts){
                                            echo "<option value='".$districts->id."'>".$districts->vDistrictName."</option>";
                                        }
                                    ?>
                                        </select>
                                    </div>
                                </div>                                                                 
                        </div>           
                    <div style="clear:both;"></div>
                    <div class="col-md-12 col-sm-12 col-xs-12">   
                                <div class="ln_solid" ></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-6 col-xs-12 ">
                                        <button id="button1id" name="button1id" type="submit" class="btn btn-primary" style="float:right;">Search</button>
                                        <button name="reset" id="reset" type="button" class="btn btn-default" style="float:right;" onclick="document.location.href = '<?php echo base_url('adminpanel/submission/submissions/index'); ?>';">Reset</button>
                                        <a href="<?php if(isset($file_path)){ echo base_url() . $file_path ;}?>" <?php if(!isset($file_path)){ echo 'style="visibility: hidden"';}?> download>
                                            <button id="download" name="download" type="button" class="btn btn-success" style="float:right;">Download</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
   
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style=" padding-top:0px;">    
                    <div class="clearfix"></div><br>
                    
                    </div>    
                    <div class="clearfix"></div><br>  
                    <div class="x_content">                        
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th style="display:none;">ID </th>
                                    <th style="width:8%;">Reference No </th>
                                    <th style="width:15%;">Full Name</th>  
                                    <th style="width:15%;">Email</th>                   
                                    <th style="width:15%;">Category</th>
                                    <th style="width:15%;">Sub Category</th>
                                    <th style="width:15%;">District</th>
                                    <th style="width:15%;">Date</th>
                                    <th style="width:8%;">Video</th>
                                    <th style="width:8%;">Image</th>
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
                                            
                                            if(isset($category))
                                            { 
                                                foreach($category as $cat)
                                                {
                                                    $id = $cat->id;
                                                    $iCategoryId = $rowlist->iCategoryId;
                                                    if ($iCategoryId == $id) {
                                                        $categoryName = $cat->vCategoryName;
                                                    }
                                                }
                                            }
                                            $categoryNameR = str_replace( ' ', '_', $categoryName);

                                            if(isset($sub_category))
                                            { 
                                                foreach($sub_category as $sub)
                                                {
                                                    $id = $sub->id;
                                                    $iSubCategoryId = $rowlist->iSubCategoryId;
                                                    if ($iSubCategoryId == $id) {
                                                        $subcategoryName = $sub->vSubcategoryName;
                                                    }
                                                }
                                            }
                                            $subcategoryNameR = str_replace( ' ', '_', $subcategoryName);

                                            if(isset($district))
                                            { 
                                                foreach($district as $dis)
                                                {
                                                    $id = $dis->id;
                                                    $iDistrictId = $rowlist->iDistrictId;
                                                    if ($iDistrictId == $id) {
                                                        $vDistrictName = $dis->vDistrictName;
                                                    }
                                                }
                                            }
                                ?>
                                         
                                        <tr class="<?php echo $oddeven; ?>">
                                            <td class="a-center " style="display:none;"><?php echo $no_count; ?></td>
                                            <td style="text-align:center;"><?php echo $rowlist->vReferenceNo;; ?></td>
                                            <td><?php echo $rowlist->tFullName;?></td>                                     
                                            <td><?php echo $rowlist->vEmail;?></td>
                                            <td><?php echo $categoryName; ?></td>
                                            <td><?php echo $subcategoryName; ?></td>
                                            <td><?php echo $vDistrictName; ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($rowlist->upload_datetime));; ?></td>
                                            <td style="text-align:center;">
                                                <?php if($rowlist->vVideo !== NULL){ ?>
                                                <a href="<?php echo base_url() . "uploading_videos/$categoryNameR/$subcategoryNameR/$rowlist->vVideo" ?>" target="_blank" >
                                                    <i class="fa fa-file-video-o"></i>
                                                </a>
                                                <?php } ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php if($rowlist->vImage !== NULL){ ?>
                                                <a  href="<?php echo base_url() . "uploading_images/$categoryNameR/$subcategoryNameR/$rowlist->vImage" ?>" target="_blank">
                                                    <i class="fa fa-file-image-o"></i>
                                                </a>
                                                <?php } ?>
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
    </style>
<script src="<?php echo base_url("assets/frontend/js/jquery-3.2.1.min.js"); ?>"></script>
    <script type="text/javascript" >
        $(document).ready(function(){
            $('#category_id').change(function(){ 
                var id=$(this).val();
                // alert(id);
                $.ajax({
                    url : "<?php echo base_url('adminpanel/submission/submissions/get_sub_categories');?>",
                    method : "POST",
                    data : {cat_id: id},
                    success: function(data){
                        $('#sub_category_id').html(data); 
                    }
                });
                return false;
            }); 
            
            // $('#download').click(function(){ 
            //     var file_path=$('#file_path').val();
            //     // alert(file_path);
            //     // alert(id);
            //     $.ajax({
            //         url : "<?php echo base_url('adminpanel/submission/submissions/download');?>",
            //         method : "POST",
            //         data : {targetPath: file_path},
            //         success: function(data){
            //             // alert(data);
            //         }
            //     });
            //     return false;
            // }); 
        });  
    </script>
   

</div>

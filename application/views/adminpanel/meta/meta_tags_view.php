<?php if($saveStatus=='A') {

$id='';
$iPage_id='';
$vPage_class='';
$vPage_name='List';
$vTitle='';
$vMeta_title='';
$vMeta_description='';
$vMeta_keywords='';
$vOg_title='';
$vOg_url='';
$fOg_image='';
$vOg_site_name='';
$vOg_description='';
$vOg_email='';
$iOrder='';
$cEnable='';

}else{
    
    
} ?>

<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>
                    Meta Tags - <?php echo $vPage_name ?>
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
                <div class="x_panel" <?php if ($saveStatus == "A") { ?> style="display:none;" <?php } ?>>
                    
                    <div class="x_content" >
                        <br />
                        <form id="image" action="<?php echo base_url('adminpanel/meta/meta_tags/save_meta_tags'); ?>" method="post" name="image" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2">Title</label>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <input id="vTitle" class="form-control" type="text" value="<?php echo $vTitle ?>" name="vTitle">
                                    </div>
                                </div> 
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2">Meta Title</label>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <input id="vMeta_title" class="form-control" type="text" value="<?php echo $vMeta_title ?>" name="vMeta_title">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2">Meta Description</label>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <input id="vMeta_description" class="form-control" type="text" value="<?php echo $vMeta_description ?>" name="vMeta_description">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2">Meta Keywords</label>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <input id="vMeta_keywords" class="form-control" type="text" value="<?php echo $vMeta_keywords ?>" name="vMeta_keywords">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2">Og Title</label>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <input id="vOg_title" class="form-control" type="text" value="<?php echo $vOg_title ?>" name="vOg_title">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2">Og URL</label>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <input id="vOg_url" class="form-control" type="text" value="<?php echo $vOg_url ?>" name="vOg_url">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2">Og Image</label>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <input id="fOg_image" class="" type="file" value="<?php echo $fOg_image ?>" name="fOg_image">
                                    <?php if($fOg_image!='' && $fOg_image!=0) { ?>
                                    <br/>
                                    <img src="<?php echo base_url('front_img/'.$fOg_image.''); ?>" width="100px" />
                                    <?php } ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2">Og Site Name</label>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <input id="vOg_site_name" class="form-control" type="text" value="<?php echo $vOg_site_name ?>" name="vOg_site_name">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2">Og Description</label>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <input id="vOg_description" class="form-control" type="text" value="<?php echo $vOg_description ?>" name="vOg_description">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2">Og Email</label>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                        <input id="vOg_email" class="form-control" type="text" value="<?php echo $vOg_email ?>" name="vOg_email">
                                    </div>
                                </div>                             
                                    
                                <div class="item form-group">
                                    <div class="col-md-8 col-sm-7 col-xs-12"> 
                                        <input type="hidden" id="cSaveStatus" name="cSaveStatus" value="<?php echo $saveStatus; ?>">
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" id="iPage_id" name="iPage_id" value="<?php echo $iPage_id; ?>">
                                        <input type="hidden" id="vPage_class" name="vPage_class" value="<?php echo $vPage_class; ?>">
                                        <input type="hidden" id="vPage_name" name="vPage_name" value="<?php echo $vPage_name; ?>">
                                        <input type="hidden" id="iOrder" name="iOrder" value="<?php echo set_value('iOrder', $iOrder); ?>">
                                        <input type="hidden" id="uploadpath" name="uploadpath" value="front_img">
                                        <input type="hidden" id="cEnable" name="cEnable" value="<?php echo $cEnable; ?>">
                                    </div>
                                </div>

                            </div>

                            <div style="clear:both;"></div>

                            <div class="ln_solid" ></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-9">
                                    <button type="button" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary" >Submit</button>
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
                                    <th style="display:none;">ID </th>
                                    <th style="width:50px;">ID</th>
                                    <th>Page Name</th>
                                    <th style="width:70px;">Edit </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $oddeven_count = 0;
								$count=0;
                                foreach ($meta_list as $rowlist) {
									$count++;
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
                                        <td style="display:none;" class="a-center "><?php echo $count; ?></td>
                                        <td class=" " style="width:50px;"><?php echo $rowlist->id; ?></td>
                                        <td><?php echo $rowlist->vPage_name; ?></td>
                                       	<td class=" " style="width:70px;"><a href="<?php echo base_url() . "adminpanel/meta/meta_tags/edit/$recordid" ?>"><i class="fa fa-edit"></i></a></td>
                                        
                                       
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
    </style>
    <script>


        $(".btn-primary").click(function() {
			
			window.location="<?php echo base_url(uri_string()); ?>";
            

        });


    </script>                 

</div>


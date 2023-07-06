<?php
if ($cSaveStatus == "E") {
//     $id = $view_data['id'];  

//     $iCategoryId = $view_data['iCategoryId'];
//     $iBrandId = $view_data['iBrandId'];
//     $iModelId = $view_data['iModelId'];
//     $tDescription = $view_data['tDescription'];
//     $iCityId = $view_data['iCityId'];
//     $vStatus = $view_data['vStatus'];
    $cEnable = $view_data['cEnable'];
//     $iOrder = $view_data['iOrder'];
} else {
//     $id = ""; 
  
//     $iCategoryId = ""; 
//     $iBrandId = ""; 
//     $iModelId = ""; 
//     $tDescription = ""; 
//     $iCityId = ""; 
//     $vStatus = ""; 
    $cEnable = "Y";
//     $iOrder = "";
}
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
   <style>
    thead input {
        width: 100%;
    }
   </style>
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div style="text-align:center;">
            <div id="dialog" title="Error" style="display: none;">
                <p>Please fill required information.</p>
            </div>           
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                    
                    <div class="x_title">
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <h2>Reports - Devices</h2>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">                           
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <br />    
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style=" padding-top:0px;">
                    <div class="x_content">
                      <!-- Search filter -->
                        <div>
                        <!-- status -->
                        <select id='sel_status' style="width:30% !important;float: left" class="form-control">
                            <option value=''>-- Select Status --</option>
                            <?php 
                            foreach($status as $status1){
                            echo "<option value='".$status1."'>".$status1."</option>";
                            }
                            ?>
                        </select>

                        
                           
                        </div>

                        <br />       <br />       <br />        
                        <table id="devices" class="table table-striped responsive-utilities jambo_table display nowrap"  style="width:100%">
                            <thead>
                                <tr class="headings">
                                    <!-- <th style="display:none;">ID </th> -->
                                    <th style="text-align:center">No </th>
                                    
                                    <th style="text-align:center">Category</th>                   
                                    <th style="text-align:center">Brand </th>
                                    <th style="text-align:center">Model </th>
                                    <th style="text-align:center">Branch </th>
                                    <th style="text-align:center">Sale Price </th>
                                    <th style="display:none;">Summary Description</th>
                                    <th style="display:none;">Description</th>
                                    <th style="display:none;">Specification</th>
                                    <th style="text-align:center">Status</th>
                                    <th style="display:none;">Discount</th>
                                    <th style="display:none;">New Sale Price</th>
                                    <th style="display:none;">Reject Reason</th>
                                </tr>
                            </thead>
                           
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

        /* .table tr th:nth-child(5),
        .table tr td:nth-child(5){
        display: none;
        } */
        	
    </style>
   


</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<!-- <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script> -->
 <!-- Script -->
 <script type="text/javascript">
    
    $(document).ready(function(){

       var userDataTable = $('#devices').DataTable({
         'processing': true,
         'serverSide': true,
         'serverMethod': 'post',
         lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100] ],
         dom: 'Blfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
          
         'ajax': {
            'url':'<?=base_url()?>device-list',
            'data': function(data){
               data.searchStatus = $('#sel_status').val();
               data.searchDeviceName = $('#searchDeviceName').val();
            }
         },
         'columns': [
            { data: null, render: (data, type, row, meta) => meta.row +1, },

            { data: 'vCategoryName' },
            { data: 'vBrandName' },
            { data: 'vModelName' },
            { data: 'vCityName' },
            { data: 'iTotal' },
            { data: 'vStatus' },
         ]
       });

       $('#sel_status').change(function(){
          userDataTable.draw();
       });
       $('#searchDeviceName').keyup(function(){
          userDataTable.draw();
       });
    });
    </script>

<!-- footer content -->
<!--<footer>
    <div class="">
        <p class="pull-right">Gentelella Alela! a Bootstrap 3 template by <a>Kimlabs</a>. |
            <span class="lead"> <i class="fa fa-paw"></i> Gentelella Alela!</span>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>-->
<!-- /footer content -->
</div>
<!-- /page content -->
</div>
</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
<!-- chart js -->
<script src="<?php echo base_url("assets/js/chartjs/chart.min.js"); ?>"></script>
<!-- bootstrap progress js -->
<script src="<?php echo base_url("assets/js/progressbar/bootstrap-progressbar.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/nicescroll/jquery.nicescroll.min.js"); ?>"></script>
<!-- icheck -->
<script src="<?php echo base_url("assets/js/icheck/icheck.min.js"); ?>"></script>
<?php if ($this->uri->segment(2) != '1manageproperty') { ?>
    <script src="<?php echo base_url("assets/js/custom.js"); ?>"></script>
<?php } ?>

<!-- Datatables -->
<script src="<?php echo base_url("assets/js/datatables/js/jquery.dataTables.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/datatables/tools/js/dataTables.tableTools.js"); ?>"></script>
<script>
    $(document).ready(function() {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
    var asInitVals = new Array();
    $(document).ready(function() {
        var oTable = $('#example').dataTable({
            "oLanguage": {
                "sSearch": "Search all columns:"
            },
            "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [0]
                } //disables sorting for column one
            ],
            'iDisplayLength': 12,
            "sPaginationType": "full_numbers",
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "<?php echo base_url('assets/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
            }
        });
        $("tfoot input").keyup(function() {
            /* Filter on the column based on the index of this element's parent <th> */
            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
        });
        $("tfoot input").each(function(i) {
            asInitVals[i] = this.value;
        });
        $("tfoot input").focus(function() {
            if (this.className == "search_init") {
                this.className = "";
                this.value = "";
            }
        });
        $("tfoot input").blur(function(i) {
            if (this.value == "") {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
    });
</script>
</body>
</html>
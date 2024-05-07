        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © 2023 <a href="http://gtechz.implogix.com">Gtechz</a>. All rights reserved
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
    </div>
    <style>
        .select2-container {
    width: 100% !important;
    padding: 0;
}
    </style>

    <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

        <!-- JQUERY JS -->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/js/jquery.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Bootstrap-Date Range Picker js-->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

        <!-- jQuery UI Date Picker js -->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/date-picker/jquery-ui.js"></script>

        <!-- bootstrap-datepicker js (Date picker Style-01) -->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/bootstrap-datepicker/js/datepicker.js"></script>

        <!-- Amaze UI Date Picker js-->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

        <!-- Simple Date Time Picker js-->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

        <!-- SELECT2 JS -->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/select2/select2.full.min.js"></script>

        <!-- BOOTSTRAP MAX-LENGTH JS -->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/bootstrap-maxlength/dist/bootstrap-maxlength.min.js"></script>

        <!--Internal Fileuploads js-->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/fileuploads/js/fileupload.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/fileuploads/js/file-upload.js"></script>

        <!--Internal Fancy uploader js-->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/fancyuploder/fancy-uploader.js"></script>

        <!-- SIDE-MENU JS-->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/sidemenu/sidemenu.js"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/p-scroll/pscroll.js"></script>

        <!-- FORM ELEMENTS JS -->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/js/formelementadvnced.js"></script>

        <!-- STICKY JS -->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/js/sticky.js"></script>

        <!-- COLOR THEME JS -->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/js/themeColors.js"></script>

        <!-- CUSTOM JS -->
        <script src="<?php echo base_url(); ?>assets/adminz/assets/js/custom.js"></script>

<script>
    $(document).ready(function(){
    $.fn.modal.Constructor.prototype.enforceFocus = function () {};
    $('#mySelect4').select2({
        dropdownParent: $('#addbankac')
    });
    $('#myCurrency').select2({
        dropdownParent: $('#addbankac')
    });
        
});

</script>
</body>

</html>
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
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminz/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/adminz/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/adminz/dist/js/demo.js"></script>
<!-- Ekko Lightbox -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/summernote/summernote-bs4.min.js"></script>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/adminz/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({
		
		icons: { time: 'far fa-clock' },
	 	//format: 'MM/DD/YYYY hh:mm A'
	 	format: 'DD/MM/YYYY hh:mm:ss A',
	 	//format: 'm/d/Y g:ia', 
		//formatTime: 'g:ia',
		pick12HourFormat: true
		//hours12:true
		 //startDate: '-0m'
		//minDate: new Date()
		
		
	});

	      //Date and time picker
    $('#reservationdatetime1').datetimepicker({
		
				
		//mydate= $("#reservationdatetime").datepicker("getDate"),
		icons: { time: 'far fa-clock' },
	 	//format: 'MM/DD/YYYY hh:mm A'
	 	format: 'DD/MM/YYYY hh:mm:ss A',
		pick12HourFormat: true
		//minDate: new Date()
		 //minDate : moment()
		//minDate: $( "#reservationdatetime" ).datetimepicker( "option", "minDate", selectedDate );
	
	});
	   $('#reservationdatetime2').datetimepicker({
		
			//var dateNow = new Date(),	
		//mydate= $("#reservationdatetime").datepicker("getDate"),
		icons: { time: 'far fa-clock' },
	 	//format: 'MM/DD/YYYY hh:mm A'
	 	format: 'DD/MM/YYYY hh:mm:ss A',
		pick12HourFormat: true,
		   useCurrent: false, 
       defaultDate:new Date(),
		 //setDate:new Date(),
		   //startDate: '-0m'
		//setDate: new Date(),
		minDate: new Date()
		 //minDate : moment()
		//minDate: $( "#reservationdatetime" ).datetimepicker( "option", "minDate", selectedDate );
	
	});
	  $('#reservationdatetime3').datetimepicker({
		
		
		//mydate= $("#reservationdatetime").datepicker("getDate"),
		icons: { time: 'far fa-clock' },
	 	//format: 'MM/DD/YYYY hh:mm A'
	 	format: 'DD/MM/YYYY hh:mm:ss A',
		pick12HourFormat: true,
//		 /useCurrent: false 
		 // minDate: new Date(),
		   //defaultDate:new Date()
       defaultDate:new Date().setMinutes(new Date().getMinutes() + 60)
		 //setDate:new Date(),
		   //startDate: '-0m'
		//setDate: new Date(),
		//minDate: new Date()
		 //minDate : moment()
		//minDate: $( "#reservationdatetime" ).datetimepicker( "option", "minDate", selectedDate );
		 
	
	});
	   $("#reservationdatetime2").on("change.datetimepicker", function (e) {
		  // alert(e.date);
          $('#reservationdatetime3').datetimepicker('minDate', e.date.add('1','hours'));
         
            //$('#reservationdatetime3').datetimepicker('minDate', e.date);
	 /* $("#reservationdatetime2").on("change.datetimepicker", ({date, oldDate}) => {
              console.log("New date", date);
              console.log("Old date", oldDate);
              alert("Changed date"+oldDate);
			$('#reservationdatetime3').datetimepicker('minDate', e.date);
				 // $("#reservationdatetime3").datetimepicker("option",{ defaultDate: new Date(date)})
			  //$('#reservationdatetime3').datetimepicker("option",{defaultDate:new Date()});
		*/
				  
      });


	  $('#billdt2').datetimepicker({
		icons: { time: 'far fa-clock' },
	 	format: 'DD/MM/YYYY',
		pick12HourFormat: true,
		useCurrent: false, 
       defaultDate:new Date()
	
	});

	  $('#billdt3').datetimepicker({
		icons: { time: 'far fa-clock' },
	 	format: 'DD/MM/YYYY',
		pick12HourFormat: true,
		useCurrent: false, 
       defaultDate:new Date()
	
	});


	  
			//var dateNow = new Date(),	
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
	
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());

    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    //file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.removeAllFiles(file) }
	 // myDropzone.removeAllFiles(true)
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    //myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
	  myDropzone.removeAllFiles(true)
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

    
     <script>
        CKEDITOR.replace( 'editor1' );
    </script>   
     <script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    })
    </script>
    <script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
 $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

</script>
  <script>
$(document).ready(function(){

if($('#mpurc_id').val()!=null)	{
$('#btnclear').on('click',function(){
//alert('hi');
$('#meeting').val('');
$("#shstatus").val($("#shstatus option:first").val()).change();
$("#staffname").val($("#staffname option:first").val()).change();
$("#online").val($("#online option:first").val()).change();

});	

}

if($('#mleadsmeasure_id').val()!=null)	{

	$('input.number').keyup(function (event) {
  //if (event.which !== 8 && event.which !== 0  && event.which !== 46  && (event.which < 45 || event.which > 57)) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
  $(this).val(function (index, value) {
  //return value.replace(/\D/g, "");

	return value.replace(/[^0-9.]/g, '');
	});
  }
});
//number ends

$('#width').on('keyup blur',function(){
	
	get_sqfzt();
});

$('#height').on('keyup blur',function(){
	
	get_sqft();
});

function get_sqft(){
	//alert('get_sqft');
var sq_width = $('#width').val();
var sq_hight = $('#height').val();
var sq_ft=0;
if(sq_width > 0 && sq_hight > 0)
{

	sq_ft= parseInt(sq_width) * parseInt(sq_hight);
	$('#sqft').val(sq_ft);	
}
else
{
	$('#sqft').val(sq_ft);	
}
return false;

}


}


if($('#medit_leads').val()!=null)	{

$('input.number').keyup(function (event) {
  //if (event.which !== 8 && event.which !== 0  && event.which !== 46  && (event.which < 45 || event.which > 57)) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
  $(this).val(function (index, value) {
  //return value.replace(/\D/g, "");

	return value.replace(/[^0-9.]/g, '');
	});
  }
});
//number ends
$('#user_id').change(function(){ 
		//alert('yes');
		var aku="http://127.0.0.1/candid/employee/staff/get_sub_customers";
		var id=$(this).val();
		
				 $.ajax({
                type : "POST",
                url  : aku, 
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                //alert('success');
								var i;
								var html = '';
								for(i=0; i<data.length; i++){


									$('#address').val(data[i].door_no+", "+data[i].address_name+", "+data[i].user_address+", "+data[i].landmark);
									$('#address_id').val(data[i].address_id);
									$('#location').val(data[i].taluk);
									$('#zipcode').val(data[i].pincode);
									$('#username').val(data[i].username);
									$('#contact').val(data[i].contact);
									}
               
								}
        
            });
		return false;
			 
});
//user ends
$('#inquryassigneduser').change(function(){ 
		//alert(ak);
		var id=$(this).val();
		var inquryassignedusername=$("#inquryassigneduser option:selected");
		alert('inquryassigneduser');
				$('#inquryassignedusername').val(inquryassignedusername.text());
				});
//inquryassigneduser ends

$('#executivename').change(function(){ 
		//alert(ak);
		var id=$(this).val();
		var executivenamez=$("#executivename option:selected");
				$('#executivenamez').val(executivenamez.text());
				});
//executivenamez ends


$('#category').change(function(){ 
		var ak="http://127.0.0.1/candid/employee/staff/get_sub_categories";
		//alert(ak);
		var id=$(this).val();
		var categoryname=$("#category option:selected");
				$('#categoryname').val(categoryname.text());
				 $.ajax({
                type : "POST",
                url  : ak, 
                dataType : "JSON",
                data : {id:id},
                success: function(data){
								var i;
								var html = '';
								for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].id+'">'+data[i].subname+'</option>';
                     }
                $('#subcategory').html(html);
								var subid=$('#subcategory').val();
								var subname=$("#subcategory option:selected");
								$('#subcategoryid').val(subid);
								$('#subcategoryname').val(subname.text());
								$(`#subcategory option[value='${subcategoryide}']`).prop('selected', true);
								}
        
            });
		return false;
			 
});
//category ends
$('#subcategory').change(function(){ 
	var subid=$('#subcategory').val();
				var subname=$("#subcategory option:selected");
				$('#subcategoryid').val(subid);
				$('#subcategoryname').val(subname.text());
		var akp="http://127.0.0.1/candid/employee/staff/get_sub_products";
		//alert(ak);
		var id=$(this).val();
		var cid=$('#category').val();
	
				 $.ajax({
                type : "POST",
                url  : akp, 
                dataType : "JSON",
                data : {id:id,cid:cid},

                success: function(data){



								var i;
								var html = '';
								for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                     }
                $('#product_name').html(html);
								var productid=$('#product_name').val();
								var productname=$("#product_name option:selected");
								$('#productid').val(productid);
								$('#productname').val(productname.text());
								$(`#product_name option[value='${subcategoryide}']`).prop('selected', true);
								}
        
            });
		return false;
			 
});
//subcategory ends
$('#product_name').change(function(){ 
				var productid=$('#product_name').val();
				var productname=$("#product_name option:selected");
				$('#productid').val(productid);
				$('#productname').val(productname.text());
				//return false;
});
//product_name ends
if($('#subcategoryide').val()!=""){
				//alert('hi');
				
				$('#user_id').change();
				$('#category').change();
				$('#subcategory').change();
				var subcategoryide=$('#subcategoryide').val();
				$(`#subcategory option[value='${subcategoryide}']`).prop('selected', true);
				//alert($('#subcategoryide').val());
				//$('#subcategory').val(subcategoryide);
				//$("#subcategory").val(subcategoryide).change();
				//alert(subcategoryide);
				//$('#subcategory' option[value=subcategoryide]).attr('selected','selected');
			}
}
//medit_leads ends
if($('#mcreate_leads').val()!=null)	{
$('input.number').keyup(function (event) {
  //if (event.which !== 8 && event.which !== 0  && event.which !== 46  && (event.which < 45 || event.which > 57)) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
  $(this).val(function (index, value) {
  //return value.replace(/\D/g, "");

	return value.replace(/[^0-9.]/g, '');
	});
  }
});

$('#user_id').change(function(){ 
		//alert('yes');
		var aku="http://127.0.0.1/candid/employee/staff/get_sub_customers";
		var id=$(this).val();
		
				 $.ajax({
                type : "POST",
                url  : aku, 
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                //alert('success');
								var i;
								var html = '';
								for(i=0; i<data.length; i++){


									$('#address').val(data[i].door_no+", "+data[i].address_name+", "+data[i].user_address+", "+data[i].landmark);
									$('#address_id').val(data[i].address_id);
									$('#location').val(data[i].taluk);
									$('#zipcode').val(data[i].pincode);
									$('#username').val(data[i].username);
									$('#contact').val(data[i].contact);
									}
               
								}
        
            });
		return false;
			 
});
$('#inquryassigneduser').change(function(){ 
		//alert(ak);
		var id=$(this).val();
		var inquryassignedusername=$("#inquryassigneduser option:selected");
		//alert('inquryassigneduser');
		$('#inquryassignedusername').val(inquryassignedusername.text());
				});
//inquryassigneduser ends

$('#executivename').change(function(){ 
		//alert('yes');
		var akp="http://127.0.0.1/candid/employee/staff/get_staff_contact";
		var id=$(this).val();
		var executivenamez=$("#executivename option:selected");
		$('#executivenamez').val(executivenamez.text());

		if(id>0)
		{
						 $.ajax({
                type : "POST",
                url  : akp, 
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	//ert("get_staff_contact"+data[0].username);
                	$('#executivecontact').val(data[0].username);
								}
        
            });
		}
		else
		{
			$('#executivecontact').val("");
		}
		//alert(id);

		return false;

		});

//executivenamez ends
$('#category').change(function(){ 
		var ak="http://127.0.0.1/candid/employee/staff/get_sub_categories";
		//alert(ak);
		var id=$(this).val();
		var categoryname=$("#category option:selected");
		$('#categoryname').val(categoryname.text());
				 $.ajax({
                type : "POST",
                url  : ak, 
                dataType : "JSON",
                data : {id:id},
                success: function(data){
								var i;
								var html = '';
								for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].id+'">'+data[i].subname+'</option>';
                     }
                $('#subcategory').html(html);
								var subid=$('#subcategory').val();
								var subname=$("#subcategory option:selected");
								$('#subcategoryid').val(subid);
								$('#subcategoryname').val(subname.text());
								$(`#subcategory option[value='${subcategoryide}']`).prop('selected', true);
								}
        
            });
		return false;
			 
});
$('#subcategory').change(function(){ 
	var subid=$('#subcategory').val();
				var subname=$("#subcategory option:selected");
				$('#subcategoryid').val(subid);
				$('#subcategoryname').val(subname.text());
		var akp="http://127.0.0.1/candid/employee/staff/get_sub_products";
		//alert(ak);
		var id=$(this).val();
		var cid=$('#category').val();
	
				 $.ajax({
                type : "POST",
                url  : akp, 
                dataType : "JSON",
                data : {id:id,cid:cid},

                success: function(data){



								var i;
								var html = '';
								for(i=0; i<data.length; i++){
									html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                     }
                $('#product_name').html(html);
								var productid=$('#product_name').val();
								var productname=$("#product_name option:selected");
								$('#productid').val(productid);
								$('#productname').val(productname.text());
								$(`#product_name option[value='${subcategoryide}']`).prop('selected', true);
								}
        
            });
		return false;
			 
});
		
			
$('#product_name').change(function(){ 
				var productid=$('#product_name').val();
				var productname=$("#product_name option:selected");
				$('#productid').val(productid);
				$('#productname').val(productname.text());
				//return false;
});


}



if($('#mcreate_servi').val()!=null)	{
$('#bill_no').change(function(){ 
		//alert('yes');
		var id=$(this).val();
		//alert(id);
		var akp="http://127.0.0.1/candid/employee/staff/get_cleadssalesnamesingle/";

		if(id>0)
		{
						 $.ajax({
                type : "POST",
                url  : akp, 
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	
                	//alert("get_staff_contact"+data[0].name);
                	$('#name').val(data[0].name);
                	$('#user_id').val(data[0].order_id);
								}
        
            });
		}
		else
		{
			$('#name').val("");
			$('#user_id').val("");
		}
		//alert(id);

		return false;

});

}

if($('#mpurcpayedi_id').val()!=null)	{
	$('input.number').keyup(function (event) {
  //if (event.which !== 8 && event.which !== 0  && event.which !== 46  && (event.which < 45 || event.which > 57)) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
 
//	  if (event.which !== 46 && event.which > 31
//    /&& (event.which < 48 || event.which > 57)){
    // 0 for null value
    // 8 for backspace
    // 48-57 for 0-9 numbers
  $(this).val(function (index, value) {
  //return value.replace(/\D/g, "");

return value.replace(/[^0-9.]/g, '');
});
  }
});

$(".updsalespay").submit(function(e){
		e.preventDefault();
		 
		//alert('hiiiii');

		//var dataString = $("#basicform*").serialize();
		//var dataString = $(theForm).serialize();
		var theForm = $(this);
		var dataString = new FormData(this);
		//return false;
		var amk="http://127.0.0.1/candid/employee/staff/update_purchasepayment/";
		//alert(dataString);
		$.ajax({
                type : "POST",
                url  : amk, 
								dataType: "JSON",	 
                //data: dataString,
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(response){
                	 //alert(response['success']);
                	 if(response['success']===true)
                	 {

                	 	$('.statusMsg').html("Updated Successfully..");
                	 	setTimeout(function(){$('.updsalespayfm').modal('hide')}, 8000);
                	 	//location.reload();

                	 }
                	 else
                	 {
                	 	$('.statusMsg').html("Error Occured. Please try later.");
                	 	setTimeout(function(){$('.updsalespayfm').modal('hide')}, 8000);
                	// 	//location.reload();
                	 }
                	//location.reload();
                	setTimeout(location. reload. bind(location), 1000);
                }

                });	
		return false;
	});


		$("#basicformc").submit(function(e){
		e.preventDefault();
		//alert('purchase');

		//var dataStringz = $("#basicformc").serialize();
		//var dataString = $(theForm).serialize();
		var theForm = $(this);
		var dataString = new FormData(this);
		//alert(dataString);
		var amkz="http://127.0.0.1/candid/employee/staff/create-purchasepayment/";
		//alert(dataStringz);
		$.ajax({
                type : "POST",
                url  : amkz, 
								dataType: "JSON",	 
                //data: dataStringz,
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(response){
                	 //alert(response);
                	 if(response['success']===true)
                	 {

                	 	$('#statusMsg').html("Added Successfully..");
                	 	setTimeout(function(){$('#modal-lgcreate').modal('hide')}, 8000);
                	 	//location.reload();

                	 }
                	 else
                	 {
                	 	$('#statusMsg').html("Error Occured. Please try later.");
                	 	setTimeout(function(){$('#modal-lgcreate').modal('hide')}, 8000);
                	// 	//location.reload();
                	 }
                	//location.reload();
                	setTimeout(location. reload. bind(location), 1000);
                }

                });	
		return false;
	});

}



if($('#msalespayedi_id').val()!=null)	{

$('input.number').keyup(function (event) {
  //if (event.which !== 8 && event.which !== 0  && event.which !== 46  && (event.which < 45 || event.which > 57)) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
 
//	  if (event.which !== 46 && event.which > 31
//    /&& (event.which < 48 || event.which > 57)){
    // 0 for null value
    // 8 for backspace
    // 48-57 for 0-9 numbers
  $(this).val(function (index, value) {
  //return value.replace(/\D/g, "");

return value.replace(/[^0-9.]/g, '');
});
  }
});

	//$("#basicform*").submit(function(e){
	$(".updsalespay").submit(function(e){
		e.preventDefault();
		 var theForm = $(this);
		//alert('hiiiii');

		//var dataString = $("#basicform*").serialize();
		var dataString = $(theForm).serialize();
		var amk="http://127.0.0.1/candid/employee/staff/update_salespayment/";
		//alert(dataString);
		$.ajax({
                type : "POST",
                url  : amk, 
								dataType: "JSON",	 
                data: dataString,
                success: function(response){
                	 //alert(response['success']);
                	 if(response['success']===true)
                	 {

                	 	$('.statusMsg').html("Updated Successfully..");
                	 	setTimeout(function(){$('.updsalespayfm').modal('hide')}, 8000);
                	 	//location.reload();

                	 }
                	 else
                	 {
                	 	$('.statusMsg').html("Error Occured. Please try later.");
                	 	setTimeout(function(){$('.updsalespayfm').modal('hide')}, 8000);
                	// 	//location.reload();
                	 }
                	//location.reload();
                	setTimeout(location. reload. bind(location), 1000);
                }

                });	
		return false;
	});


$("#basicformc").submit(function(e){
		e.preventDefault();
		//alert('h');
		var dataStringz = $("#basicformc").serialize();
		//var dataString = $(theForm).serialize();
		var amkz="http://127.0.0.1/candid/employee/staff/create-salespayment";
		//alert(dataStringz);
		$.ajax({
                type : "POST",
                url  : amkz, 
								dataType: "JSON",	 
                data: dataStringz,
                success: function(response){
                	 //alert(response);
                	 if(response['success']===true)
                	 {

                	 	$('#statusMsg').html("Added Successfully..");
                	 	setTimeout(function(){$('#modal-lgcreate').modal('hide')}, 8000);
                	 	//location.reload();

                	 }
                	 else
                	 {
                	 	$('#statusMsg').html("Error Occured. Please try later.");
                	 	setTimeout(function(){$('#modal-lgcreate').modal('hide')}, 8000);
                	// 	//location.reload();
                	 }
                	//location.reload();
                	setTimeout(location. reload. bind(location), 1000);
                }

                });	
		return false;
	});

	       // get Delete Product
        $('.btn-delete').on('click',function(){
        		//alert('hiiiii');
            // get data from button edit
            const id = $(this).data('id');
            alert(id);
            // Set data to Form Edit
            $('.productID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });

}


if($('#mproductedi_id').val()!=null)	{

$('input.number').keyup(function (event) {
  //if (event.which !== 8 && event.which !== 0  && event.which !== 46  && (event.which < 45 || event.which > 57)) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
 
//	  if (event.which !== 46 && event.which > 31
//    /&& (event.which < 48 || event.which > 57)){
    // 0 for null value
    // 8 for backspace
    // 48-57 for 0-9 numbers
  $(this).val(function (index, value) {
  //return value.replace(/\D/g, "");

return value.replace(/[^0-9.]/g, '');
});
  }
});


$('#category').change(function(){ 
		var ak="http://127.0.0.1/candid/employee/staff/get_sub_categories"
		//var ak="http://127.0.0.1/candid/crm/administrator/get_sub_categories";;
		//alert(ak);
		var id=$(this).val();
				 //alert('helo'+id);
				 $.ajax({
				//alert('hiiiiiii');
                type : "POST",
               
                url  : ak, 
					
                dataType : "JSON",
                data : {id:id},
				//alert(data)
                success: function(data){
					//alert(data['subname']);
					 //alert("Response:" + data); 
					
                    //$('[name="subcategory"]').val(data);
					var i;
							var html = '';
								//alert(data.length);
                        for(i=0; i<data.length; i++){
							//alert(data[i].blockp);
							//$('[name="city"]').val('+data[i].city+');
                            html += '<option value="'+data[i].id+'">'+data[i].subname+'</option>';
                        }
                        $('#subcategory').html(html);
					var subid=$('#subcategory').val();
					var subname=$("#subcategory option:selected");
					$('#subcategoryid').val(subid);
					$('#subcategoryname').val(subname.text());
					$(`#subcategory option[value='${subcategoryide}']`).prop('selected', true);
				}
        
            });
		return false;
			 
		 });
		
			
		$('#subcategory').change(function(){ 
			var subid=$('#subcategory').val();
			var subname=$("#subcategory option:selected");
			$('#subcategoryid').val(subid);
			$('#subcategoryname').val(subname.text());
		});
			//return false;



if($('#subcategoryide').val()!=""){
				//alert('hi');
				
				$('#category').change()
				//$('#subcategory').change();
				var subcategoryide=$('#subcategoryide').val();
				$(`#subcategory option[value='${subcategoryide}']`).prop('selected', true);
				//alert($('#subcategoryide').val());
				//$('#subcategory').val(subcategoryide);
				//$("#subcategory").val(subcategoryide).change();
				//alert(subcategoryide);
				//$('#subcategory' option[value=subcategoryide]).attr('selected','selected');
			}
	
	$('#seller_id').change(function(){ 
		//alert(ak);
		var id=$(this).val();
		var seller_name=$("#seller_id option:selected");
		//alert('inquryassigneduser');
		$('#seller_name').val(seller_name.text().trim());
	});
//mprodedit closes
}


if($('#mproduct_id').val()!=null)	{

$('input.number').keyup(function (event) {
  if (event.which !== 8 && event.which !== 0 && event.which < 48 || event.which > 57) {
    // 0 for null value
    // 8 for backspace
    // 48-57 for 0-9 numbers
  $(this).val(function (index, value) {
  return value.replace(/\D/g, "");
});
  }
});

}

if($('#mpost_id').val()!=null)
	{
		
		//alert($('#exampleInputFilea').val());
		if($('#category_id').val()==1 || $('#category_id').val()==3)
			{
				
				$('#exampleInputFilea').hide();
				$('#titlez').show();
				
			}
		else
			{
				$('#exampleInputFilea').show();
				$('#titlez').hide();
				
			}
		$(document).on("change keyup blur", "#category_id", function() {
			
			if($('#category_id').val()==1|| $('#category_id').val()==3)
			{
				
				$('#exampleInputFilea').hide();
				$('#titlez').show();
				
			}
		else
			{
				$('#exampleInputFilea').show();
				$('#titlez').hide();
				
			}
			 });
		
		//if(category_id exampleInputFile
	}
	else
		{
			
		}
	
	$(document).on("change keyup blur", "#offer_type", function() {
		
			get_percentage();
 });

$('#offer_data').on('keyup',function(){
	
	get_percentage();
});
function get_percentage(){
var offer_type = $('#offer_type').val();
var product_price = $('#productsprice').val();
var offer_data = $('#offer_data').val();
var offer_final_price=$('#offer_dataprice').val();
//alert(offer_type+offer_data+product_price);

 if(offer_type=='PERCENTAGE')
	{
	 if(offer_data > 0  && offer_data <100)
	{
	
	offer_final_price=product_price-((offer_data/100)*product_price);
	$('#offer_dataprice').val(offer_final_price);	
	}
		else{$('#offer_dataprice').val(product_price);$('#offer_data').val(''); $('#offer_data').focus();}
}
else if(offer_type=='AMOUNT')
{
		 if(offer_data > 0  && offer_data < parseFloat(product_price))
	{
	
	offer_final_price=product_price-offer_data;
	$('#offer_dataprice').val(offer_final_price);	
	}
		else{$('#offer_dataprice').val(product_price);$('#offer_data').val(''); $('#offer_data').focus();}
	
}
	else
		{
			
		}

}

//};
});
</script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<script>
	$(document).ready(function(){
if($('#mprint_id').val()!=null)
	{
		window.addEventListener("load", window.print());
	}
	});
  
</script>

</body>
</html>  

$(document).ready(function(){
    $('#currency').on('change', function(){
        var iso2 = $(this).val();
        var iso3 = $('#source_type').val();
        var currencyname=$("#currency option:selected");
        var sourcetype=$("#source_type option:selected");
        //$('#currency_namez').val(currencyname);
        $('#currency_namez').val(currencyname.text());
        $('#source_typez').val(sourcetype.text());
        //alert(iso2);
        if(iso2 && iso3){
            // alert(sourcetype.text());
            if(sourcetype.text()=='Psource4 (Crypto Payment)'){
                $('#totalAmount').val('5');
                $(".wallet_address_label").css("display", "block");
                $(".account_number_label").css("display", "none");
                $(".paymentID_label").css("display", "none");
            }
            if(sourcetype.text()=='Psource5 (Card Payment)'){
                $(".paymentID_label").css("display", "block");
                $(".account_number_label").css("display", "none");
                $(".wallet_address_label").css("display", "none");
            }
            if(sourcetype.text()=='Psource6'){
                $('#totalAmount').val('80.00');
            }
            if(sourcetype.text()=='Psource7'){
                $('#totalAmount').val('100');
            }
            $.ajax({
                type:'POST',
                url:'getBankData.php',
                /*data:{'iso2_val='+iso2},*/
                data: {iso2_val:iso2, iso3_val:iso3},
                success:function(html){
                    //alert(html);
                    $('#bank_type').html(html);
                }
            }); 
        }else{
            $('#bank_type').html('<option value="">---</option>'); 
        }
    });
    $('#bank_type').on('change', function(){
        var sourcetype=$("#source_type option:selected");
        if(sourcetype.text()=='Psource1'){
            var currency = $('#currency').val();
            // alert(currency);
            if(currency=='10'){     //for CNY
                $('#totalAmount').val('1000');
            }else if(currency=='5' || currency=='9'){   //for USD
                $('#totalAmount').val('5');
            }else if(currency=='2'){
                $('#totalAmount').val('100');              //for THB
            }else{
                $('#totalAmount').val('100.00');   
            }
        }
    });
});
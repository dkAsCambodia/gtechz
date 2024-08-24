$(document).ready(function(){
    $('#currency').on('change', function(){
        var iso2 = $(this).val();
        var iso3 = $('#source_type').val();
        var currencyname=$("#currency option:selected");
        var sourcetype=$("#source_type option:selected");
        //$('#currency_namez').val(currencyname);
        $('#currency_namez').val(currencyname.text());
        $('#source_typez').val(sourcetype.text());
        if(iso2 && iso3){
            if(sourcetype.text()=='source4 (Crypto Payment)'){
                $('#totalAmount').val('100');
            }
            if(sourcetype.text()=='source6'){
                $(".bank_account_field").css("display", "block");
                $('#totalAmount').val('100.00');
            }
            if(sourcetype.text()=='source7'){
                $(".bank_account_field").css("display", "block");
                $('#totalAmount').val('300');
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
        var bankval = $(this).val();
        // alert(bankval);
        if(bankval=='QTSE'){
            var currency = $('#currency').val();
            // alert(currency);
            if(currency=='10'){     //for CNY
                $('#totalAmount').val('5000');
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
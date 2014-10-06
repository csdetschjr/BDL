$(document).ready(function(){
    $('#form select[name="diagnosiskey"]').change(function(){
        if($('#form select[name="diagnosiskey"] option:selected').val() == 'AFB'){
            $('#terra').show();
            $('#tylan').show();
            $('#spore').hide();
            $('#mite').hide();
        }
        else if($('#form select[name="diagnosiskey"] option:selected').val() == 'NOS'){
            $('#terra').hide();
            $('#tylan').hide();
            $('#mite').hide();
            $('#spore').show();
        }
        else if($('#form select[name="diagnosiskey"] option:selected').val() == 'VD-A'
                || $('#form select[name="diagnosiskey"] option:selected').val() == 'VD-B'){
            $('#terra').hide();
            $('#tylan').hide();
            $('#spore').hide();
            $('#mite').show();
        }
        else{
            $('#terra').hide();
            $('#tylan').hide();
            $('#spore').hide();
            $('#mite').hide();
        }
    });

});

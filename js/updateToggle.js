$(document).ready(function(){
    $('#form select[name="toggle"]').change(function(){
        if($('#form select[name="toggle"] option:selected').val() == 'Sample'){
            $('#subForm').hide();
            $('#personForm').hide();
            $('#diagForm').hide();
            $('#dTypeForm').hide();
            $('#sampForm').show();
        }
        else if($('#form select[name="toggle"] option:selected').val() == 'Submission'){
            $('#sampForm').hide();
            $('#personForm').hide();
            $('#diagForm').hide();
            $('#dTypeForm').hide();
            $('#subForm').show();
        }
        else if($('#form select[name="toggle"] option:selected').val() == 'Person'){
            $('#sampForm').hide();
            $('#subForm').hide();
            $('#diagForm').hide();
            $('#dTypeForm').hide();
            $('#personForm').show();
        }
        else if($('#form select[name="toggle"] option:selected').val() == 'Diagnosis'){
            $('#sampForm').hide();
            $('#subForm').hide();
            $('#personForm').hide();
            $('#dTypeForm').hide();
            $('#diagForm').show();
        }
        else if($('#form select[name="toggle"] option:selected').val() == 'Diagnosis Type'){
            $('#sampForm').hide();
            $('#subForm').hide();
            $('#personForm').hide();
            $('#diagForm').hide();
            $('#dTypeForm').show();
        }
    });
        $('#diagForm select[name="diagnosiskey"]').change(function(){
        if($('#diagForm select[name="diagnosiskey"] option:selected').val() == 'AFB'){
                $('#terra').show();
                $('#tylan').show();
                $('#spore').hide();
                $('#mite').hide();
            }
            else if($('#diagForm select[name="diagnosiskey"] option:selected').val() == 'NOS'){
                $('#terra').hide();
                 $('#tylan').hide();
                $('#mite').hide();
                $('#spore').show();
            }
            else if($('#diagForm select[name="diagnosiskey"] option:selected').val() == 'VD-A'
                || $('#diagForm select[name="diagnosiskey"] option:selected').val() == 'VD-B'){
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


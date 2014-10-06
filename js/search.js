$(document).ready(function(){
     $('#form select[name="toggle"]').change(function(){
        if($('#form select[name="toggle"] option:selected').val() == 'Sample'){
            $('#subForm').hide();
            $('#personForm').hide();
            $('#sampleForm').show();
        }
        else if($('#form select[name="toggle"] option:selected').val() == 'Submission'){
            $('#sampleForm').hide();
            $('#personForm').hide();
            $('#subForm').show();
        }
        else{
            $('#sampleForm').hide();
            $('#subForm').hide();
            $('#personForm').show();
        }
    });

    $('#personForm').submit(function(event){
        event.preventDefault();
        var table = {
            'fname' : $('input[name=fname]').val(),
            'lname' : $('input[name=lname]').val(),
            'ownerid' : $('input[name=ownerid]').val(),
            'submitterid' : $('input[name=submitterid]').val(),
            'businessname' : $('input[name=businessname]').val(),
            'postalcode' : $('input[name=postalcode]').val(),
            'city' : $('input[name=city]').val(),
            'workphone' : $('input[name=workphone]').val(),
            'email' : $('input[name=email]').val()
        };
        $.ajax({
            type: 'POST',
            url : 'php/searchPerson.php',
            data: table,
            dataType: 'html'
            })
            .done(function(table){
                $("#display").html(table);
            });
    });

    $('#sampleForm').submit(function(event){
        event.preventDefault();
        var table = {
            'sampleid' : $('input[name=sampleid]').val(),
            'sampletype' : $('select[name=sampletype]').val(),
            'submissionid' : $('input[name=submissionid]').val(),
            'comment' : $('input[name=comment]').val()
        };
        $.ajax({
            type: 'POST',
            url : 'php/searchSample.php',
            data: table,
            dataType: 'html'
            })
            .done(function(table){
                $("#display").html(table);
            });
    });
    
    $('#subForm').submit(function(event){
        event.preventDefault();
        var table = {
            'submissionid2' : $('input[name=submissionid2]').val(),
            'submissiondate' : $('input[name=submissiondate]').val(),
            'notification' : $('input[name=notification]').val(),
            'submitterid2' : $('input[name=submitterid2]').val(),
            'ownerid2' : $('input[name=ownerid2]').val()
        };
        $.ajax({
            type: 'POST',
            url : 'php/searchSubmission.php',
            data: table,
            dataType: 'html'
            })
            .done(function(table){
                $("#display").html(table);
            });
    });
});

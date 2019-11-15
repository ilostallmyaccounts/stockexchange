// Update the classifications data list
function getClassifications(){
    $.ajax({
        type: 'POST',
        url: 'api/classifications.json',
        data: 'action_type=index',
        success:function(html){
            $('#classificationData').html(html);
			$("#modalClassificationAddEdit").modal('hide');
            //$('#cakephp-container').html(html);
			//$('.modal-backdrop.fade.show').remove();
        }
    });
}

// Send CRUD requests to the server-side script
function classificationAction(type, id){
    id = (typeof id == "undefined")?'':id;
    var classificationData = '', frmElement = '';
	var urlFinal = 'api/classifications.json';
	var method = 'POST';
    if(type == 'add'){
        frmElement = $("#modalClassificationAddEdit");
		//urlFinal += '/add';
		method = 'POST';
        classificationData = frmElement.find('form').serialize()+'&action_type='+type+'&id='+id;
    }else if (type == 'edit'){
        frmElement = $("#modalClassificationAddEdit");
		//urlFinal += '/edit/' + id;
		method = 'PUT';
        classificationData = frmElement.find('form').serialize()+'&action_type='+type;
    }else{
        frmElement = $(".row");
		//urlFinal += '/' + type;
		method = 'DELETE';
        classificationData = 'action_type='+type+'&id='+id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: method,
        url: urlFinal,
        dataType: 'JSON',
        data: classificationData,
        beforeSend: function(){
            frmElement.find('form').css("opacity", "0.5");
        },
        success:function(resp){
			//window.location.reload();
            //frmElement.find('.statusMsg').html(resp.msg);
            //if(resp.status == 1){
                if(type == 'add'){
                    frmElement.find('form')[0].reset();
                }
                getClassifications();
            //}
            frmElement.find('form').css("opacity", "");
        }
    });
}

// Fill the classification's data in the edit form
function editClassification(id){
    $.ajax({
        type: 'POST',
        url: 'api/classifications.json',
        dataType: 'JSON',
        data: 'action_type=view&id='+id,
        success:function(data){
            $('#id').val(data.id);
            $('#name').val(data.name);
        }
    });
}

// Actions on modal show and hidden events
$(function(){
    $('#modalClassificationAddEdit').on('show.bs.modal', function(e){
        var type = $(e.relatedTarget).attr('data-type');
        var classificationFunc = "classificationAction('add');";
        if(type == 'edit'){
            classificationFunc = "classificationAction('edit');";
            var rowId = $(e.relatedTarget).attr('rowid');
			//console.log('eee: ' + rowId);
            editClassification(rowId);
        }
        $('#classificationSubmit').attr("onclick", classificationFunc);
    });
    
    $('#modalClassificationAddEdit').on('hidden.bs.modal', function(){
        $('#classificationSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});
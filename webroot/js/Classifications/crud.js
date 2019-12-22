
var app = angular.module('app', []);

app.controller('ClassificationCRUDCtrl', ['$scope', 'ClassificationCRUDService', function ($scope, ClassificationCRUDService) {

        $scope.updateClassification = function () {
            ClassificationCRUDService.updateClassification($scope.classification.id, $scope.classification.name)
                    .then(function success(response) {
                        $scope.message = 'Classification data updated!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating classification!';
                                $scope.message = '';
                            });
        }

        $scope.getClassification = function () {
            var id = $scope.classification.id;
            ClassificationCRUDService.getClassification($scope.classification.id)
                    .then(function success(response) {
                        $scope.classification = response.data;
                        $scope.classification.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'Classification not found!';
                                } else {
                                    $scope.errorMessage = "Error getting classification!";
                                }
                            });
        }

        $scope.addClassification = function () {
            if ($scope.classification != null && $scope.classification.name) {
                ClassificationCRUDService.addClassification($scope.classification.name)
                        .then(function success(response) {
                            $scope.message = 'Classification added!';
                            $scope.errorMessage = '';
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding classification!';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

        $scope.deleteClassification = function () {
            ClassificationCRUDService.deleteClassification($scope.classification.id)
                    .then(function success(response) {
                        $scope.message = 'Classification deleted!';
                        $scope.classification = null;
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting classification!';
                                $scope.message = '';
                            })
        }

        $scope.getAllClassifications = function () {
            ClassificationCRUDService.getAllClassifications()
                    .then(function success(response) {
                        $scope.classifications = response.data;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting classifications!';
                            });
        }

    }]);

app.service('ClassificationCRUDService', ['$http', function ($http) {

        this.getClassification = function getClassification(classificationId) {
            return $http({
                method: 'GET',
                data: {action_type: 'view', id: id},
                url: urlToRestApi + '/' + classificationId,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
					'Authorization': 'Bearer ' + token}
            });
        }

        this.addClassification = function addClassification(name) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {action_type: 'add', name: name},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
					'Authorization': 'Bearer ' + token}
            });
        }

        this.deleteClassification = function deleteClassification(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                data: {action_type: 'delete', id: id},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
				'Content-Type' : 'application/json',
                    'Accept' : 'application/json',
					'Authorization': 'Bearer ' + token}
            })
        }

        this.updateClassification = function updateClassification(id, name) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {action_type: 'edit', name: name, id: id},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
					'Authorization': 'Bearer ' + token}
            })
        }

        this.getAllClassifications = function getAllClassifications() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
					'Authorization': 'Bearer ' + token}
            });
        }

        this.changePW = function changePW() {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
					'Authorization': 'Bearer ' + token}
            });
        }

    }]);





/*

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


*/
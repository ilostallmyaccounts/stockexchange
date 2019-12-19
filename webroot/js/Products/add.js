var app = angular.module('linkedlists', []);

app.controller('classificationsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.classifications = response.data;
    });
});



/*
$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#classification-id').on('change', function () {
        var categoryId = $(this).val();
        if (categoryId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'classification_id=' + categoryId,
                success: function (subcategories) {
                    $select = $('#type-id');
                    $select.find('option').remove();
                    $.each(subcategories, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#type-id').html('<option value="">Select classification first</option>');
        }
    });
});
*/


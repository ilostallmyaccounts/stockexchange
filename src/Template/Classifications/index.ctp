<?php
$urlToRestApi = $this->Url->build([
    "controller" => "api",
    "action" => "classifications",
    //"_ext" => "json"
], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Classifications/crud', ['block' => 'scriptBottom']);
?>

<div ng-app="app" ng-controller="ClassificationCRUDCtrl">
    <table>
        <tr>
            <td width="100">ID:</td>
            <td><input type="text" id="id" ng-model="classification.id" /></td>
        </tr>
        <tr>
            <td width="100">Name:</td>
            <td><input type="text" id="name" ng-model="classification.name" /></td>
        </tr>
    </table>
    <br /> <br /> 
    <a ng-click="getClassification(classification.id)">Get Classification</a> 
    <a ng-click="updateClassification(classification.id, classification.name)">Update Classification</a> 
    <a ng-click="addClassification(classification.name)">Add Classification</a> 
    <a ng-click="deleteClassification(classification.id)">Delete Classification</a>

    <br /> <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <br />
    <br /> 
    <a ng-click="getAllClassifications()">Get all Classifications</a><br /> 
    <br /> <br />
    <div ng-repeat="classification in classifications">
        {{classification.id}} {{classification.name}}
    </div>
    <!-- pre ng-show='classifications'>{{classifications | json }}</pre-->
</div>

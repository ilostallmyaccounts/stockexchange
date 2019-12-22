<?php
$urlToRestApi = $this->Url->build([
    "controller" => "api",
    "action" => "classifications",
    //"_ext" => "json"
], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Classifications/crud', ['block' => 'scriptBottom']);
$urlLogin = $this->Url->build([
	"prefix" => "api",
    "controller" => "users",
    "action" => "token",
    //"_ext" => "json"
], true);
echo $this->Html->scriptBlock('var urlLogin = "' . $urlLogin . '";', ['block' => true]);
echo $this->Html->script('Classifications/crud', ['block' => 'scriptBottom']);
$urlChangePw = $this->Url->build([
	"prefix" => "api",
    "controller" => "users",
    "action" => "changepw",
    //"_ext" => "json"
], true);
echo $this->Html->scriptBlock('var urlChangePw = "' . $urlChangePw . '";', ['block' => true]);
?>

<div id="loginForm">
				<div id="ajaxLogin"></div>
				<div id="captchaBox"></div>
				<div>
				<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
				<script>
					var onloadCallback = function() {
						widgetId1 = grecaptcha.render('captchaBox', {
							'sitekey' : '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
							'theme' : 'light'
						});
					};
				</script>
				<script>
var token = '';

var loginForm = '<p>Email : <input type="text" id="ajaxU"/></p><p>Password : <input type="password" id="ajaxP"/></p><p><button onclick="login()">Login</button></p>';
var logoutForm = '<p>You are currently logged in.<input type="password" id="newpw" placeholder="Change your password?"/><button onclick="changepw();">Change</button></p><p><button onclick="logout()">Logout</button></p>';

function login() {
	if(grecaptcha.getResponse(widgetId1)==''){
		document.getElementById("captcha_status").innerText='Please verify captha.';
		return;
	}
	var uname = document.getElementById("ajaxU").value;
	var passwd = document.getElementById("ajaxP").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4) {
			document.getElementById("captcha_status").innerText='';
			if (this.status == 200) {
				document.getElementById("ajaxLogin").innerHTML = logoutForm;
				document.getElementById("contenuMonopage").style.display = "block";
				document.getElementById("captchaBox").style.display = "none";
				token = JSON.parse(this.response).data.token;
			} else {
				document.getElementById("ajaxLogin").innerHTML = "<p>Incorrect username/password.</p>" + loginForm;
			}
		}
	};
	xhttp.open("POST", urlLogin + ".json", true);
	xhttp.setRequestHeader("Content-type", "application/json");
	xhttp.send('{"username":"' + uname + '","password":"' + passwd + '"}');
}

function logout() {
	token = '';
	document.getElementById("ajaxLogin").innerHTML = loginForm;
	document.getElementById("contenuMonopage").style.display = "none";
	document.getElementById("captchaBox").style.display = "block";
	document.getElementById("captcha_status").innerHTML = "";
}

function changepw() {
	var passwd = document.getElementById("newpw").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4) {
			document.getElementById("captcha_status").innerText='';
			if (this.status == 200) {
				logout();
			} else {
				document.getElementById("captcha_status").innerHTML = "Could not change password.";
			}
		}
	};
	xhttp.open("POST", urlChangePw + ".json", true);
	xhttp.setRequestHeader("Content-type", "application/json");
	xhttp.setRequestHeader("Authorization", 'Bearer ' + token);
	xhttp.send('{"password":"' + passwd + '"}');
}

logout();
				</script>
</div>

<div ng-app="app" ng-controller="ClassificationCRUDCtrl">
	<p style="color:red;" id="captcha_status"></p>
	<p style="color: green">{{message}}</p>
	<p style="color: red">{{errorMessage}}</p>
	<div id="contenuMonopage" style="display:none;">
		<table>
			<tr>
				<td width="100">ID:</td>
				<td><input type="text" id="id" ng-model="classification.id" /></td>
				</td>
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

		<br />
		<br /> 
		<a ng-click="getAllClassifications()">Get all Classifications</a><br /> 
		<br /> <br />
		<div ng-repeat="classification in classifications">
			{{classification.name}}
		</div>
		<!-- pre ng-show='classifications'>{{classifications | json }}</pre-->
	</div>
</div>

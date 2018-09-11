//SignUp Javascript file using angularjs for data-binding.
var base_api_url = "http://localhost:8085/educaredb/api/";
var app = angular.module('signUpView', []);

app.controller ('signUpCtrl',  function($scope, $http) {
    this.user = {name:'', email:'', role:'', password:'', cpassword:'', registered_date:''};

    $scope.signup = function() {
        var param = {"method":"save", "table":"users", "data":this.user};
        $http({
            url:base_api_url+"users_http_api.php",
            method: "POST",
            data:param
        }).then((result) => {
            //$scope.berror = result.data.msg;
            show_alert(result.data.msg, "2000", "success");
        }, function(error) {
            //$scope.berror = error.statusText;
            show_alert(error.statusText, "2000", "danger");
        });
    };
});

//javascript file for roles using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('rolesView', []);

app.controller ('rolesCtrl', function($scope, $http) {

    this.role = {user:user, id:'', role:'', description:'', created_by:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.role_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"roles", "data":this.role};
            save_role($scope, $http, pb);
        } else {
            var data = Object.assign(this.role, this.update);
            var pu = {"method":"update", "table":"roles", "data":data};
            update_role($scope, $http, pu);
        }
    };

    $scope.role_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_role_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.role_delete = function(coln, colv){
        delete_role($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"roles_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"roles"}
    }).then((result) =>{
        $scope.roles = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_role($scope, $http, pb){
    $http({
        url: base_api_url+"roles_http_api.php",
        method: "POST",
        data:pb
    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function show_selected($scope, $http, column, value){
    $http({
        url: base_api_url+"roles_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"roles", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.role = result.data.role;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_role($scope, $http, pb){
    $http({
        url: base_api_url+"roles_http_api.php",
        method: "POST",
        data:pb
    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function delete_role($scope, $http, column, value){
    $http({
        url: base_api_url+"roles_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"roles", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


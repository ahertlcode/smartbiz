//javascript file for account_gl using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('account_glView', []);

app.controller ('account_glCtrl', function($scope, $http) {

    this.account_gl = {user:user, id:'', naration:'', trans_id:'', trans_ref:'', debit:'', credit:'', trans_date:'', value_date:'', savedby:'', postby:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.account_gl_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"account_gl", "data":this.account_gl};
            save_account_gl($scope, $http, pb);
        } else {
            var data = Object.assign(this.account_gl, this.update);
            var pu = {"method":"update", "table":"account_gl", "data":data};
            update_account_gl($scope, $http, pu);
        }
    };

    $scope.account_gl_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_account_gl_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.account_gl_delete = function(coln, colv){
        delete_account_gl($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"account_gl_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"account_gl"}
    }).then((result) =>{
        $scope.account_gl = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_account_gl($scope, $http, pb){
    $http({
        url: base_api_url+"account_gl_http_api.php",
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
        url: base_api_url+"account_gl_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"account_gl", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.account_gl = result.data.account_gl;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_account_gl($scope, $http, pb){
    $http({
        url: base_api_url+"account_gl_http_api.php",
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

function delete_account_gl($scope, $http, column, value){
    $http({
        url: base_api_url+"account_gl_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"account_gl", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


//javascript file for master_accounts using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('master_accountsView', []);

app.controller ('master_accountsCtrl', function($scope, $http) {

    this.master_account = {user:user, id:'', account_id:'', account_name:'', created_by:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.master_account_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"master_accounts", "data":this.master_account};
            save_master_account($scope, $http, pb);
        } else {
            var data = Object.assign(this.master_account, this.update);
            var pu = {"method":"update", "table":"master_accounts", "data":data};
            update_master_account($scope, $http, pu);
        }
    };

    $scope.master_account_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_master_account_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.master_account_delete = function(coln, colv){
        delete_master_account($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"master_accounts_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"master_accounts"}
    }).then((result) =>{
        $scope.master_accounts = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_master_account($scope, $http, pb){
    $http({
        url: base_api_url+"master_accounts_http_api.php",
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
        url: base_api_url+"master_accounts_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"master_accounts", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.master_account = result.data.master_account;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_master_account($scope, $http, pb){
    $http({
        url: base_api_url+"master_accounts_http_api.php",
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

function delete_master_account($scope, $http, column, value){
    $http({
        url: base_api_url+"master_accounts_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"master_accounts", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


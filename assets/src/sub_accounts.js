//javascript file for sub_accounts using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('sub_accountsView', []);

app.controller ('sub_accountsCtrl', function($scope, $http) {

    this.sub_account = {user:user, id:'', master_id:'', account_id:'', account_name:'', showTB:'', showPNL:'', showCF:'', created_by:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.sub_account_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"sub_accounts", "data":this.sub_account};
            save_sub_account($scope, $http, pb);
        } else {
            var data = Object.assign(this.sub_account, this.update);
            var pu = {"method":"update", "table":"sub_accounts", "data":data};
            update_sub_account($scope, $http, pu);
        }
    };

    $scope.sub_account_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_sub_account_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.sub_account_delete = function(coln, colv){
        delete_sub_account($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"sub_accounts_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"sub_accounts"}
    }).then((result) =>{
        $scope.sub_accounts = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_sub_account($scope, $http, pb){
    $http({
        url: base_api_url+"sub_accounts_http_api.php",
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
        url: base_api_url+"sub_accounts_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"sub_accounts", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.sub_account = result.data.sub_account;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_sub_account($scope, $http, pb){
    $http({
        url: base_api_url+"sub_accounts_http_api.php",
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

function delete_sub_account($scope, $http, column, value){
    $http({
        url: base_api_url+"sub_accounts_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"sub_accounts", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


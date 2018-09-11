//javascript file for sales_ledger using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('sales_ledgerView', []);

app.controller ('sales_ledgerCtrl', function($scope, $http) {

    this.sales_ledger = {user:user, id:'', trans_id:'', trans_ref:'', description:'', quantity:'', amount:'', total:'', trans_date:'', created_by:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.sales_ledger_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"sales_ledger", "data":this.sales_ledger};
            save_sales_ledger($scope, $http, pb);
        } else {
            var data = Object.assign(this.sales_ledger, this.update);
            var pu = {"method":"update", "table":"sales_ledger", "data":data};
            update_sales_ledger($scope, $http, pu);
        }
    };

    $scope.sales_ledger_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_sales_ledger_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.sales_ledger_delete = function(coln, colv){
        delete_sales_ledger($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"sales_ledger_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"sales_ledger"}
    }).then((result) =>{
        $scope.sales_ledger = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_sales_ledger($scope, $http, pb){
    $http({
        url: base_api_url+"sales_ledger_http_api.php",
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
        url: base_api_url+"sales_ledger_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"sales_ledger", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.sales_ledger = result.data.sales_ledger;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_sales_ledger($scope, $http, pb){
    $http({
        url: base_api_url+"sales_ledger_http_api.php",
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

function delete_sales_ledger($scope, $http, column, value){
    $http({
        url: base_api_url+"sales_ledger_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"sales_ledger", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


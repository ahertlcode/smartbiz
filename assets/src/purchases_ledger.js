//javascript file for purchases_ledger using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('purchases_ledgerView', []);

app.controller ('purchases_ledgerCtrl', function($scope, $http) {

    this.purchases_ledger = {user:user, id:'', trans_id:'', trans_ref:'', description:'', quantity:'', amount:'', total:'', trans_date:'', created_by:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.purchases_ledger_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"purchases_ledger", "data":this.purchases_ledger};
            save_purchases_ledger($scope, $http, pb);
        } else {
            var data = Object.assign(this.purchases_ledger, this.update);
            var pu = {"method":"update", "table":"purchases_ledger", "data":data};
            update_purchases_ledger($scope, $http, pu);
        }
    };

    $scope.purchases_ledger_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_purchases_ledger_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.purchases_ledger_delete = function(coln, colv){
        delete_purchases_ledger($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"purchases_ledger_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"purchases_ledger"}
    }).then((result) =>{
        $scope.purchases_ledger = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_purchases_ledger($scope, $http, pb){
    $http({
        url: base_api_url+"purchases_ledger_http_api.php",
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
        url: base_api_url+"purchases_ledger_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"purchases_ledger", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.purchases_ledger = result.data.purchases_ledger;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_purchases_ledger($scope, $http, pb){
    $http({
        url: base_api_url+"purchases_ledger_http_api.php",
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

function delete_purchases_ledger($scope, $http, column, value){
    $http({
        url: base_api_url+"purchases_ledger_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"purchases_ledger", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


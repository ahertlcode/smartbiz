//javascript file for orders_table using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('orders_tableView', []);

app.controller ('orders_tableCtrl', function($scope, $http) {

    this.orders_table = {user:user, id:'', customers_id:'', order_item:'', order_date:'', fulfilby:'', quantity:'', amount:'', total:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.orders_table_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"orders_table", "data":this.orders_table};
            save_orders_table($scope, $http, pb);
        } else {
            var data = Object.assign(this.orders_table, this.update);
            var pu = {"method":"update", "table":"orders_table", "data":data};
            update_orders_table($scope, $http, pu);
        }
    };

    $scope.orders_table_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_orders_table_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.orders_table_delete = function(coln, colv){
        delete_orders_table($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"orders_table_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"orders_table"}
    }).then((result) =>{
        $scope.orders_table = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_orders_table($scope, $http, pb){
    $http({
        url: base_api_url+"orders_table_http_api.php",
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
        url: base_api_url+"orders_table_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"orders_table", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.orders_table = result.data.orders_table;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_orders_table($scope, $http, pb){
    $http({
        url: base_api_url+"orders_table_http_api.php",
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

function delete_orders_table($scope, $http, column, value){
    $http({
        url: base_api_url+"orders_table_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"orders_table", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


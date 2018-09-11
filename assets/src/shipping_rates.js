//javascript file for shipping_rates using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('shipping_ratesView', []);

app.controller ('shipping_ratesCtrl', function($scope, $http) {

    this.shipping_rate = {user:user, id:'', rate:'', city:'', weight:'', created_by:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.shipping_rate_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"shipping_rates", "data":this.shipping_rate};
            save_shipping_rate($scope, $http, pb);
        } else {
            var data = Object.assign(this.shipping_rate, this.update);
            var pu = {"method":"update", "table":"shipping_rates", "data":data};
            update_shipping_rate($scope, $http, pu);
        }
    };

    $scope.shipping_rate_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_shipping_rate_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.shipping_rate_delete = function(coln, colv){
        delete_shipping_rate($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"shipping_rates_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"shipping_rates"}
    }).then((result) =>{
        $scope.shipping_rates = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_shipping_rate($scope, $http, pb){
    $http({
        url: base_api_url+"shipping_rates_http_api.php",
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
        url: base_api_url+"shipping_rates_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"shipping_rates", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.shipping_rate = result.data.shipping_rate;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_shipping_rate($scope, $http, pb){
    $http({
        url: base_api_url+"shipping_rates_http_api.php",
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

function delete_shipping_rate($scope, $http, column, value){
    $http({
        url: base_api_url+"shipping_rates_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"shipping_rates", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


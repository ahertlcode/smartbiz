//javascript file for stores using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('storesView', []);

app.controller ('storesCtrl', function($scope, $http) {

    this.store = {user:user, id:'', store_name:'', store_addr:'', store_onwer:'', created_date:'', created_by:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.store_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"stores", "data":this.store};
            save_store($scope, $http, pb);
        } else {
            var data = Object.assign(this.store, this.update);
            var pu = {"method":"update", "table":"stores", "data":data};
            update_store($scope, $http, pu);
        }
    };

    $scope.store_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_store_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.store_delete = function(coln, colv){
        delete_store($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"stores_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"stores"}
    }).then((result) =>{
        $scope.stores = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_store($scope, $http, pb){
    $http({
        url: base_api_url+"stores_http_api.php",
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
        url: base_api_url+"stores_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"stores", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.store = result.data.store;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_store($scope, $http, pb){
    $http({
        url: base_api_url+"stores_http_api.php",
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

function delete_store($scope, $http, column, value){
    $http({
        url: base_api_url+"stores_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"stores", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


//javascript file for master_assets using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('master_assetsView', []);

app.controller ('master_assetsCtrl', function($scope, $http) {

    this.master_asset = {user:user, id:'', asset_id:'', asset_class:'', created_by:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.master_asset_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"master_assets", "data":this.master_asset};
            save_master_asset($scope, $http, pb);
        } else {
            var data = Object.assign(this.master_asset, this.update);
            var pu = {"method":"update", "table":"master_assets", "data":data};
            update_master_asset($scope, $http, pu);
        }
    };

    $scope.master_asset_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_master_asset_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.master_asset_delete = function(coln, colv){
        delete_master_asset($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"master_assets_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"master_assets"}
    }).then((result) =>{
        $scope.master_assets = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_master_asset($scope, $http, pb){
    $http({
        url: base_api_url+"master_assets_http_api.php",
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
        url: base_api_url+"master_assets_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"master_assets", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.master_asset = result.data.master_asset;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_master_asset($scope, $http, pb){
    $http({
        url: base_api_url+"master_assets_http_api.php",
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

function delete_master_asset($scope, $http, column, value){
    $http({
        url: base_api_url+"master_assets_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"master_assets", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


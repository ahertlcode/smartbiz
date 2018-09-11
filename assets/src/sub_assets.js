//javascript file for sub_assets using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('sub_assetsView', []);

app.controller ('sub_assetsCtrl', function($scope, $http) {

    this.sub_asset = {user:user, id:'', master_asset_id:'', asset_id:'', asset_name:'', created_by:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.sub_asset_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"sub_assets", "data":this.sub_asset};
            save_sub_asset($scope, $http, pb);
        } else {
            var data = Object.assign(this.sub_asset, this.update);
            var pu = {"method":"update", "table":"sub_assets", "data":data};
            update_sub_asset($scope, $http, pu);
        }
    };

    $scope.sub_asset_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_sub_asset_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.sub_asset_delete = function(coln, colv){
        delete_sub_asset($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"sub_assets_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"sub_assets"}
    }).then((result) =>{
        $scope.sub_assets = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_sub_asset($scope, $http, pb){
    $http({
        url: base_api_url+"sub_assets_http_api.php",
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
        url: base_api_url+"sub_assets_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"sub_assets", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.sub_asset = result.data.sub_asset;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_sub_asset($scope, $http, pb){
    $http({
        url: base_api_url+"sub_assets_http_api.php",
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

function delete_sub_asset($scope, $http, column, value){
    $http({
        url: base_api_url+"sub_assets_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"sub_assets", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


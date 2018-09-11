//javascript file for returns using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('returnsView', []);

app.controller ('returnsCtrl', function($scope, $http) {

    this.return = {user:user, id:'', return_type:'', return_date:'', reason:'', created_by:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.return_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"returns", "data":this.return};
            save_return($scope, $http, pb);
        } else {
            var data = Object.assign(this.return, this.update);
            var pu = {"method":"update", "table":"returns", "data":data};
            update_return($scope, $http, pu);
        }
    };

    $scope.return_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_return_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.return_delete = function(coln, colv){
        delete_return($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"returns_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"returns"}
    }).then((result) =>{
        $scope.returns = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_return($scope, $http, pb){
    $http({
        url: base_api_url+"returns_http_api.php",
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
        url: base_api_url+"returns_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"returns", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.return = result.data.return;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_return($scope, $http, pb){
    $http({
        url: base_api_url+"returns_http_api.php",
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

function delete_return($scope, $http, column, value){
    $http({
        url: base_api_url+"returns_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"returns", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


//javascript file for ip_logs using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('ip_logsView', []);

app.controller ('ip_logsCtrl', function($scope, $http) {

    this.ip_log = {user:user, id:'', ip:'', system_id:'', browser_type:'', os_type:'', location:'', log_date:''};
    this.update = {col_name:'', col_value:''};

    $scope.ip_log_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"ip_logs", "data":this.ip_log};
            save_ip_log($scope, $http, pb);
        } else {
            var data = Object.assign(this.ip_log, this.update);
            var pu = {"method":"update", "table":"ip_logs", "data":data};
            update_ip_log($scope, $http, pu);
        }
    };

    $scope.ip_log_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_ip_log_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.ip_log_delete = function(coln, colv){
        delete_ip_log($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"ip_logs_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"ip_logs"}
    }).then((result) =>{
        $scope.ip_logs = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_ip_log($scope, $http, pb){
    $http({
        url: base_api_url+"ip_logs_http_api.php",
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
        url: base_api_url+"ip_logs_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"ip_logs", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.ip_log = result.data.ip_log;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_ip_log($scope, $http, pb){
    $http({
        url: base_api_url+"ip_logs_http_api.php",
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

function delete_ip_log($scope, $http, column, value){
    $http({
        url: base_api_url+"ip_logs_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"ip_logs", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


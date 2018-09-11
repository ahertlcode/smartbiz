//javascript file for audit_logs using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('audit_logsView', []);

app.controller ('audit_logsCtrl', function($scope, $http) {

    this.audit_log = {user:user, id:'', activity:'', log_date:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.audit_log_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"audit_logs", "data":this.audit_log};
            save_audit_log($scope, $http, pb);
        } else {
            var data = Object.assign(this.audit_log, this.update);
            var pu = {"method":"update", "table":"audit_logs", "data":data};
            update_audit_log($scope, $http, pu);
        }
    };

    $scope.audit_log_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_audit_log_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.audit_log_delete = function(coln, colv){
        delete_audit_log($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"audit_logs_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"audit_logs"}
    }).then((result) =>{
        $scope.audit_logs = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_audit_log($scope, $http, pb){
    $http({
        url: base_api_url+"audit_logs_http_api.php",
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
        url: base_api_url+"audit_logs_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"audit_logs", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.audit_log = result.data.audit_log;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_audit_log($scope, $http, pb){
    $http({
        url: base_api_url+"audit_logs_http_api.php",
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

function delete_audit_log($scope, $http, column, value){
    $http({
        url: base_api_url+"audit_logs_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"audit_logs", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


//javascript file for shipments_tracker using angularjs for data-binding.
var base_api_url = "http://localhost:8085/smartbiz/api/";
var user = local_store({}, "smartbiz-user", "get");
var app = angular.module('shipments_trackerView', []);

app.controller ('shipments_trackerCtrl', function($scope, $http) {

    this.shipments_tracker = {user:user, id:'', order_id:'', current_location:'', date_arrived:'', to_location:'', dispatch_date:'', date_created:'', date_updated:'', date_deleted:'', status:''};
    this.update = {col_name:'', col_value:''};

    $scope.shipments_tracker_save = function() {
        if (this.update == undefined) {
            var pb = {"method":"save", "table":"shipments_tracker", "data":this.shipments_tracker};
            save_shipments_tracker($scope, $http, pb);
        } else {
            var data = Object.assign(this.shipments_tracker, this.update);
            var pu = {"method":"update", "table":"shipments_tracker", "data":data};
            update_shipments_tracker($scope, $http, pu);
        }
    };

    $scope.shipments_tracker_view_single = function(coln, colv){
        show_selected($scope, $http, coln, colv);
    };

    $scope.do_shipments_tracker_update = function(colname, colvalue){
        $scope.update = {"col_name":colname, "col_value":colvalue};
        show_selected($scope, $http, colname, colvalue);
    };

    $scope.shipments_tracker_delete = function(coln, colv){
        delete_shipments_tracker($scope, $http, coln, colv);
    };

    $http({
        url: base_api_url+"shipments_tracker_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"shipments_tracker"}
    }).then((result) =>{
        $scope.shipments_tracker = result.data;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });

});

function save_shipments_tracker($scope, $http, pb){
    $http({
        url: base_api_url+"shipments_tracker_http_api.php",
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
        url: base_api_url+"shipments_tracker_http_api.php",
        method: "POST",
        data:{"method":"view", "table":"shipments_tracker", "data":{"col_name":column, "col_value":value}}
    }).then((result) =>{
        $scope.shipments_tracker = result.data.shipments_tracker;
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}

function update_shipments_tracker($scope, $http, pb){
    $http({
        url: base_api_url+"shipments_tracker_http_api.php",
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

function delete_shipments_tracker($scope, $http, column, value){
    $http({
        url: base_api_url+"shipments_tracker_http_api.php",
        method: "POST",
        data:{"method":"delete", "table":"shipments_tracker", "data":{"col_name":column, "col_value":value}}    }).then((result) =>{
        //$scope.berror = result.data.msg;
        show_alert(result.data.msg, "2000", "success");
    }, function(error){
        //$scope.berror = error.statusText;
        show_alert(error.statusText, "2000", "danger");
    });
}


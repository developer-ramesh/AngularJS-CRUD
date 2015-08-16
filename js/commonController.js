var app = angular.module("myApp", ['ngRoute']);

app.config(function ($routeProvider, $locationProvider) {
    console.log("route");
    $routeProvider
    // set route for the dynamic page
    
    //.when('/:pagename',{controller: 'RouteCtrl',templateUrl: 'uirouter.html'})
    
    .when('/about',{controller: 'RouteCtrl',templateUrl: 'about.html'})
    .when('/home',{controller: 'RouteCtrl',templateUrl: 'home.php'})
    .when('/contact',{controller: 'RouteCtrl',templateUrl: 'contact.html'})
    
    .otherwise({redirectTo: '/home'});
     
     $locationProvider.html5Mode(true);
 });
 

  app.controller('RouteCtrl', function($scope,$routeParams) {
    // create a message to display in our view 
    //$scope.page=$routeParams.pagename;
    //$scope.message = $routeParams.pagename;
  });



app.controller("fn", function($scope,$http) {
    $scope.heading = "Simple Example using AngularJS !!!";
    $scope.add_prod = true;
    
     $scope.get_data = function() {

        $http.get("http://localhost/AngularJs/server-file.php?action=get_data").success(function(data)
        {
            $scope.dat = data;    

        });
     }
    
     $scope.add_submit = function() {
        $http.post('http://localhost/AngularJs/server-file.php?action=add_data', 
            {
                'name'     : $scope.name, 
                'phone'    : $scope.phone, 
                'address'  : $scope.address
            }
        )
        .success(function (data) {
          $scope.msg=data['msg'];  
          $scope.get_data();
        });
    }
    
    $scope.data_delete = function(index) {  
     
      $http.post('http://localhost/AngularJs/server-file.php?action=delete_data', 
            {
                'prod_index'     : index
            }
        )      
        .success(function (data) {
             $scope.msg=data['msg'];
             $scope.get_data();
        })
    }
    
    $scope.data_edit = function(index) {  
      $scope.update_prod = true;
      $scope.add_prod = false;
      $http.post('http://localhost/AngularJs/server-file.php?action=edit_data', 
            {
                'prod_index'     : index
            }
        )      
        .success(function (data, status, headers, config) {    
            //alert(data[0]["prod_name"]);
            $scope.id          =   data[0]["id"];
            $scope.name        =   data[0]["name"];
            $scope.address     =   data[0]["address"];
            $scope.phone       =   data[0]["phone"];
        })
    }
    
    $scope.update_data = function() {
        //return false;
        $http.post('http://localhost/AngularJs/server-file.php?action=update_data', 
                    {
                        'id'            : $scope.id,
                        'name'          : $scope.name, 
                        'phone'         : $scope.phone, 
                        'address'       : $scope.address
                    }
                  )
                .success(function (data) {
                  $scope.msg=data['msg'];  
                  $scope.get_data();
                })
    }
    
    $scope.add_reset = function(){
        $scope.id='';
        $scope.name='';
        $scope.phone='';
        $scope.address='';
        $scope.add_prod=true;
        $scope.update_prod=false;
    }
});

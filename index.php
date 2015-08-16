<!DOCTYPE html>
<html>
<head>
    <title>::Learning AngularJs::</title>
    <base href="/AngularJS-CRUD/">
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/angular-route.js"></script>
    <script type="text/javascript" src="js/commonController.js"></script>
    <style>
    table, th , td  {
      border: 1px solid grey;
      border-collapse: collapse;
      padding: 5px;
    }
    table tr:nth-child(odd)	{
      background-color: #f1f1f1;
    }
    table tr:nth-child(even) {
      background-color: #ffffff;
    }
    </style>

</head>

<body>
    <div ng-app="myApp">
     
     <div ng-controller="fn">
     <div style="margin-top: 10px;">
     <h1>{{heading}}</h1>
     
     <p style="text-align: center;"> <strong style="color: #1E3D93;">{{msg}}</strong></p>
        
        <table style="width: 60%" ng-init="get_data()">
            <tr><th>Name</th><th>Address</th><th>Phone</th><th>Action</th></tr>
            <tr  ng-repeat="x in dat | orderBy:'id':true">
                <td>{{ x.name }}</td><td>{{ x.address }}</td><td>{{ x.phone }}</td>
                <td style="text-align: center;">
                    <a href="" ng-click="data_edit(x.id)">Edit</a> | <a href="" ng-click="data_delete(x.id)">Delete</a>
                </td>
            </tr>
        </table>
     </div>
     
     
     <div style="margin-top: 70px;">
         <h4>Add Data in Database Table !!! <a ng-click="add_reset()">Add</a></h4>
         <form name="add_product" class="wrapper">
           <input type="hidden" name="id" ng-model="id">
	   <input type="text" name="name" ng-model="name" placeholder="Enter Name">
	   <input type="text" name="address" ng-model="address" placeholder="Enter Address">
           <input type="text" name="phone" ng-model="phone" placeholder="Enter Phone">
	   <input type="button" name="submit_product" ng-show='add_prod' value="Add" ng-click="add_submit()">
	   <input type="button" name="update_product" ng-show='update_prod' value="Update" ng-click="update_data()">
         </form>
     </div>
     </div>
     
     
    <div ng-controller="RouteCtrl">
	<h1>Dynamic Routing Example</h1>
	<br />
       
	<a  href="/AngularJS-CRUD/home">Home</a>
	<a  href="/AngularJS-CRUD/about">About</a>
	<a  href="/AngularJS-CRUD/contact">Contact</a>
    
	<br />
	<br />
	
	<div ng-view="">in this area by $routeparam content will change</div>
    </div>
     

    </div>
    
   
    
</body>
</html>
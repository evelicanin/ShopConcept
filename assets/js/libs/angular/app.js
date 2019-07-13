	
	var app = angular.module('myApp', ['ui-notification', 'ngAnimate']);
	
	    app.controller("productsCtrl",function($scope,$http,Notification){
		
		// category filter reset (BUTTON)
		   $scope.resetCategoryFilter = function()
		   {
				for(var x in $scope.productFilter)
				{
				  $scope.productFilter[x]=undefined;
				}
            };
					
            getProducts(); // Load all available products 			  
			function getProducts()
			{  
				$http.post("produkti.php").success(function(data)
					{
						$scope.products = data;
		      	    }
				);
			};	
			$scope.clearSearch = function() 
			{
				$scope.productFilter = "";
				getProducts();
			}
			
						
			$scope.addToCart = function(id) 
			{
				$http.post("add_to_cart.php?id="+id).success(function(data)
				{
					infoTime('<b>Product has been added to your cart!</b>');
					// getProducts();			
				});
			};
	
			// angular notifications functions
				// text can be anything, even html content
				
				// simple notifications				
				function primary(text) {
					Notification(text);
				};				
				function error(text) {
					Notification.error(text);
				};
				function success(text) {
					Notification.success(text);
				};
				function info(text) {
					Notification.info(text);
				};
				function warning(text) {
					Notification.warning(text);
				};
				
			// simple notifications + delay
				function primaryTime(text) {
					Notification.primary({message: text, delay: 1000});
				};
				function errorTime(text) {
					Notification.error({message: text, delay: 1000});
				};
				function successTime(text) {
					Notification.success({message: text, delay: 2000});
				};
				function infoTime(text) {
					Notification.info({message: text, delay: 1000});
				};
				function warningTime(text) {
					Notification.warning({message: text, delay: 1000});
				};		
				
			// simple notifications + title		
				function errorHtml(text, heading) {
					Notification.error({message: text, title: heading});
				};
				function successHtml(text,heading) {
					Notification.success({message: text, title: heading});
				};							
			// angular notifications functions	
		
		});	 
		

	    // Home View controller
	    app.controller("cartCtrl",function($scope,$http,Notification){
		
            getCart(); // Load all available products 			  
			function getCart()
			{  
				$http.post("cart.php").success(function(data)
					{
						$scope.cartproducts = data;
		      	    }
				);
			};			
			
			$scope.removeFromCart = function(id) 
			{
				$http.post("remove_from_cart.php?id="+id).success(function(data)
				{
					infoTime('<b>Product has been removed from your cart!</b>');
					getCart();				
				});
				
			// angular notifications functions
				// text can be anything, even html content
				
				// simple notifications				
				function primary(text) {
					Notification(text);
				};				
				function error(text) {
					Notification.error(text);
				};
				function success(text) {
					Notification.success(text);
				};
				function info(text) {
					Notification.info(text);
				};
				function warning(text) {
					Notification.warning(text);
				};
				
			// simple notifications + delay
				function primaryTime(text) {
					Notification.primary({message: text, delay: 1000});
				};
				function errorTime(text) {
					Notification.error({message: text, delay: 1000});
				};
				function successTime(text) {
					Notification.success({message: text, delay: 2000});
				};
				function infoTime(text) {
					Notification.info({message: text, delay: 1000});
				};
				function warningTime(text) {
					Notification.warning({message: text, delay: 1000});
				};				
			// simple notifications + title		
				function errorHtml(text, heading) {
					Notification.error({message: text, title: heading});
				};
				function successHtml(text,heading) {
					Notification.success({message: text, title: heading});
				};							
			// angular notifications functions					
				
				
				
			};
		
        });	 
		
		
		
		
		
		
		
		
		
		
		
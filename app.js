//'use strict';
(function(){
	var baseUrl = '/project/anwesha/';
	// Declare app level module which depends on views, and components
	var myApplication = angular.module("anwesha", [
	  'ngRoute',
	  'ngResource'
	]);/*.
	config(['$routeProvider', function($routeProvider) {
	  $routeProvider.otherwise({redirectTo: '/view1'});
	}]);*/
    //fetchData().then(bootstrapApplication);

    /**
     * Initial request made by application during bootstrap to fetch basic data about user and server
     * required for bootstrapping
     * @return
     */
    /*function fetchData() {
        var initInjector = angular.injector(["ng"]);
        var $http = initInjector.get("$http");

        return $http.get("init").then(function(response) {
            myApplication.constant('server', {'url': response.data.server});
        }, function(errorResponse) {
            // Handle error case
        });
    }*/

    /*function bootstrapApplication() {
        angular.element(document).ready(function() {
            angular.bootstrap(document, ["njath"]);
        });
    }*/
    //angular.bootstrap(document, ["anwesha"]);
    angular.element(document).ready(function() {
      angular.bootstrap(document, ['anwesha']);
    });

    function Status() {
    	this.error = false;
    	this.state = "";
    	this.success = false;
    }

    /**
     * User service to store user details and update scores
     */
    function User( $http ){
        var self = this,
            url = "userdata";
        this.init = function () {
            return $http.get( url ).then( function( response ) {
                    self.setDetails(response.data.username,response.data.level,response.data.t_score,response.data.l_score);
                },function(errorResponse){
                   //handle error
            });
        }

        /**
         * Set details of user on this object
         * @param string name of user
         * @param int level of user
         * @param int tscore total score of user
         * @param int lscore level score of user
         */
        this.setDetails = function(name,level,tscore,lscore ){
            self.username = name;
            self.level = level;
            self.tscore = tscore;
            self.lscore = lscore;
        }
    }

    myApplication.service( 'User', ['$http', User] );

    myApplication.controller( 'UserCtrl',['User','$scope','$http', function($user,$scope,$http){
		var self = this;

		this.init = function () {
			$user.init().then( function( response ) {
                /*$scope.username = $user.username;
                $scope.level = $user.level;
                $scope.tscore = $user.tscore;*/
                $scope.user = $user;
            },function(errorResponse){
			} );
		}

		this.refresh = function() {
			self.init();
		}

	    this.init();
	} ] );

	myApplication.controller( 'testCtrl', ['$scope', function($scope){
		this.x = "Hi there";
	} ] );

	/*myApplication.config(function($routeProvider) {
	$routeProvider

	    // route for the home page
	    .when('/', {
	        templateUrl : 'pages/questionlist.html',
	        controller  : 'QuestionListCtrl'
	    })

	    // route for question page
	    .when('/questions/:id', {
	    	templateUrl : 'pages/question.html',
	    	controller  : 'QuestionCtrl'
	    })
	});*/
})();


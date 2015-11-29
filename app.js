//'use strict';
(function(){
	var baseUrl = '/project/anwesha/';
	// Declare app level module which depends on views, and components
	var myApplication = angular.module("anwesha", [
	  'ngRoute',
	  'ngResource',
	  'ngSanitize'
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

    var globalErr = "";
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
            url = "userdata",
            userdata = {},
            register_url = "user/register/User";
        this.createUser = function( name, mobile, sex, college, email, dob, city ) {
        	self.userdata.name = name;
        	self.userdata.mobile = mobile;
        	self.userdata.sex = sex;
        	self.userdata.college = college;
        	self.userdata.email = email;
        	self.userdata.dob = dob;
        	self.userdata.city = city;
        }

        this.insertUser = function( userdata ) {

        }

        /**
         * Set details of user on this object
         * @param string name of user
         */
        this.setDetails = function(name,level,tscore,lscore ){
            self.username = name;
        }
    }

    myApplication.service( 'User', ['$http', User] );

	/**
	 * Defining the service for events
	 * @param {object} $http http servie
	 */
	function Events( $http ) {
		var self = this;

		var base_url = 'events/';
		self.events = {};
		this.init = function () {
			return $http.get( base_url ).then( function( response ){
				if ( response.data[0] == 1 ){
					self.events['sub'] = {};
					self.events['hasSub'] = 1;
					response.data[1].forEach(function(element,A,idx){
						self.events['sub'][element['eveName']] = element;
						var sub_url = base_url + element['eveName'];
						//console.log(self.events[element['eveName']]);
						self.events['sub'][element['eveName']]['sub'] = {};
						//self.events['sub'][element['eveName']]['sub_e'] = {};
						//self.events[element['eveName']]['curr'] = -1;
						self.events['sub'][element['eveName']]['hasSub'] = 0;
						self.getSubEvents_1( sub_url, self.events['sub'][element['eveName']] );
					});
					self.currEvent = {};
					self.path = [];
					//console.log(self.events);
				}else{
					globalErr = response.data[0];
				}
				//console.log(response.data);
			},function( errorResponse ) {
				globalErr = errorResponse;
				console.log(errorResponse);
			} );
		}

		this.getSubEvents_1 = function( url, cat ) {
			$http.get( url ).then( function( response ){
				if ( response.data[0] == 1 ){
					response.data[1].forEach(function(element,A,idx){
						element['details'] = element['details'].replace(/\"/g, "\"");
						element['hasSub'] = 0;
						var sub_url = base_url + element['eveName'];
						cat['sub'][element['eveName']] = element;
						//cat['sub_e'][element['eveName']] = element;
						//console.log(element['size']);
						if ( parseInt(element['size']) == 0 ) {
							cat['hasSub'] = 1;
							cat['sub'][element['eveName']]['sub'] = {};
							self.getSubEvents_2( sub_url, cat['sub'][element['eveName']] );
							//cat['curr'] = -1;
						}
					});
					//console.log(self.events);
				}else{
					globalErr = response.data[0];
				}
				//console.log(response.data);
			},function( errorResponse ) {
				globalErr = errorResponse;
				console.log(errorResponse);
			} );
		}

		this.getSubEvents_2 = function( url, cat ) {
			$http.get( url ).then( function( response ){
				if ( response.data[0] == 1 ){
					response.data[1].forEach(function(element,A,idx){
						element['details'] = element['details'].replace(/\"/g, "\"");
						element['hasSub'] = 0;
						cat['sub'][element['eveName']] = element;
					});
				}else{
					globalErr = response.data[0];
				}
				//console.log(response.data);
			},function( errorResponse ) {
				globalErr = errorResponse;
				console.log(errorResponse);
			} );
		}

		this.showEvent = function( name, level ) {
			if ( level == 0 ) {
				self.currEvent = self.events['sub'][name];
				console.log(self.currEvent);
			} else if ( level == 1 && self.currEvent['hasSub'] == 1 ) {
				self.currEvent = self.currEvent['sub'][name];
			}

		}
	}

	myApplication.service( 'Events', ['$http', Events] );

    myApplication.controller( 'UserCtrl',['User','$scope','$http', function($user,$scope,$http){
		var self = this;

		this.refresh = function() {
			self.init();
		}

	    this.init();
	} ] );

	myApplication.controller( 'DefaultCtrl', ['$scope', '$http', 'Events', function($scope,$http,$events){
		var self = this;
		this.isEvents = false;
		this.isTeam = false;
		this.isSponsors = false;
		this.isArchives = false;
		this.isWebTeam = false;
		this.showEvents = function() {
			self.isEvents = true;
			$events.init($http);
		}

		this.showTeam = function() {
			self.isTeam = true;
		}

		this.showSponsors = function() {
			self.isSponsors = true;
		}

		this.showArchives = function() {
			self.isArchives = true;
		}

		this.showWebTeam = function() {
			self.isWebTeam = true;
		}
	} ] );

	myApplication.controller( 'eventCtrl', ['$sce', '$http', 'Events', function($sce,$http,$events){
		var self = this;
		this.events = $events.events;
		this.sub_events = $events.currEvent;
		this.showEvent = function( name, level ) {
			$events.showEvent( name, level );
			self.sub_events = $events.currEvent;
			for ( var e in self.sub_events['sub'] ) {
				if ( self.sub_events['sub'][e]['details'] ) {
					var eve = self.sub_events['sub'][e];
					eve.details = $sce.trustAsHtml(eve.details);
				}
			}
		}
	} ] );
})();


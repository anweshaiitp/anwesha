//'use strict';
(function(){
	var baseUrl = '/project/anwesha/';
	// Declare app level module which depends on views, and components
	var myApplication = angular.module("anwesha", [
	  'ngResource',
	  'ngSanitize',
	  'ngAnimate'
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

    myApplication.factory(
        "transformRequestAsFormPost",
        function() {
            function transformRequest( data, getHeaders ) {
                var headers = getHeaders();
                //headers[ "Content-type" ] = "application/x-www-form-urlencoded; charset=utf-8";
                return( serializeData( data ) );
            }
            // Return the factory value.
            return( transformRequest );
            // ---
            // PRVIATE METHODS.
            // ---
            // serialize the given Object into a key-value pair string. This
            // method expects an object and will default to the toString() method.
            // --
            // NOTE: This is an atered version of the jQuery.param() method which
            // will serialize a data collection for Form posting.
            // --
            // https://github.com/jquery/jquery/blob/master/src/serialize.js#L45
            function serializeData( data ) {
                // If this is not an object, defer to native stringification.
                if ( ! angular.isObject( data ) ) {
                    return( ( data == null ) ? "" : data.toString() );
                }
                var buffer = [];
                // Serialize each key in the object.
                for ( var name in data ) {
                    if ( ! data.hasOwnProperty( name ) ) {
                        continue;
                    }
                    var value = data[ name ];
                    buffer.push(
                        encodeURIComponent( name ) +
                        "=" +
                        encodeURIComponent( ( value == null ) ? "" : value )
                    );
                }
                // Serialize the buffer and clean it up for transportation.
                var source = buffer
                    .join( "&" )
                    .replace( /%20/g, "+" )
                ;
                return( source );
            }
        }
    );

    var globalErr = "";
    function Status() {
    	this.error = false;
    	this.state = "";
    	this.success = false;
    }

	/**
	 * User service to store user details and update scores
	 */
	function User( $http, transformRequestAsFormPost ){
		var self = this,
			register_url = "user/register/User";
		this.userdata = {};
		this.createUser = function( name, mobile, sex, college, email, dob, city ) {
			self.userdata.name = name;
			self.userdata.mobile = mobile;
			self.userdata.sex = sex;
			self.userdata.college = college;
			self.userdata.email = email;
			self.userdata.dob = dob;
			self.userdata.city = city;
			self.userdata.anwId = "";
			return self.insertUser( self.userdata );
		}

		this.insertUser = function( userdata ) {
			return $http({
				method: "post",
				url: register_url,
				headers: {'Content-type': 'application/x-www-form-urlencoded;charset=utf-8'},
				transformRequest: transformRequestAsFormPost,
				data: {
					name:userdata.name,
					mobile: userdata.mobile,
					sex: userdata.sex,
					college: userdata.college,
					email: userdata.email,
					dob: userdata.dob,
					city: userdata.city
				}
			})/*.then( function( response ) {
				console.log(response);
				self.userdata.anwId = response.data[1].pId;
			}, function( errorResponse ) {
				console.log( errorResponse );
			} )*/;
		}
    }

    myApplication.service( 'User', ['$http', 'transformRequestAsFormPost',User] );

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
		this.fields = {"name":"Full Name","mobile":"Mobile","sex":"Sex","college":"College","email":"Email","dob":"D.O.B(YYYY-MM-DD)","city":"City"};
		this.inProgress = 0;
		this.success = 0;
		this.err = "";
		this.user = {};
		this.user.name = "Full Name";
		this.user.mobile = "Mobile";
		this.user.sex = "M";
		this.user.college = "College";
		this.user.email = "Email";
		this.user.dob = "D.O.B(YYYY-MM-DD)";
		this.user.city = "City";
		this.user.anwId = "";
		//this.success_msg = "You have successfully registered. Your anwesha ID is: " + this.user.anwId +". Now close this window";
		this.submit = function() {
			if ( this.inProgress == 0 ) {
				this.inProgress = 1;
				$user.createUser( self.user.name, self.user.mobile, self.user.sex, self.user.college, self.user.email, self.user.dob, self.user.city ).then(
					function( response ) {
						if ( response.data[0] == -1 ) {
							self.err = response.data[1];
						} else {
							self.err = "";
							self.success = 1;
							console.log(response);
							// set anwesha id
							$user.userdata.anwId = response.data[1].pId;
							self.user.anwId = response.data[1].pId;
						}
						self.inProgress = 0;
					}, function( errorResponse ) {
						console.log( errorResponse );
						self.inProgress = 0;
					}
				);
			}

		}

		this.hideDefault = function( field, defaultval ) {
			if ( self.user[field] == self.fields[field] ) {
				self.user[field] = '';
			}
		}

		this.showDefault = function( field, defaultva ) {
			if ( self.user[field] == '' ) {
				self.user[field] = self.fields[field];
			}
		}
	} ] );

	myApplication.controller( 'DefaultCtrl', ['$scope', '$http', 'Events', function($scope,$http,$events){
		var self = this;
		this.isEvents = false;
		this.isTeam = false;
		this.isSponsors = false;
		this.isArchives = false;
		this.isWebTeam = false;
		this.isRegForm = false;
		this.showEvents = function() {
			$events.init($http).then( function( response ) {
				self.isEvents = true;
			}, function( errorResponse ) {
				console.log(errorResponse);
			} );
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

		this.showRegForm = function() {
			self.isRegForm = true;
		}
	} ] );

	myApplication.controller( 'eventCtrl', ['$sce', '$http', 'Events', function($sce,$http,$events){
		var self = this;
		this.events = $events.events;
		this.sub_events = $events.currEvent;
		this.showEvent = function( name, level ) {
			$events.showEvent( name, level );

			for ( var e in self.sub_events['sub'] ) {
				if ( self.sub_events['sub'][e]['details'] ) {
					var eve = self.sub_events['sub'][e];
					if ( typeof ( eve.details ) === 'string' ) {
						eve.details = $sce.trustAsHtml(eve.details);
					}
				}
			}
			self.sub_events = $events.currEvent;
		}
	} ] );
})();


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
			register_url = "user/register/User",
			login_url = "login";
		self.userdata = {};
		self.user = {};
		self.username = false;
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
        /**
         * Set details of user on this object
         * @param string name of user
         */
        this.setDetails = function( name, data ){
            self.username = name;
            self.user = data;
        }

        this.loginUser = function( name, password ) {
        	return $http({
				method: "post",
				url: login_url,
				headers: {'Content-type': 'application/x-www-form-urlencoded;charset=utf-8'},
				transformRequest: transformRequestAsFormPost,
				data: {
					username: name,
					password: password
				}
			});
        }
    }

    myApplication.service( 'User', ['$http', 'transformRequestAsFormPost',User] );

	/**
	 * Defining the service for events
	 * @param {object} $http http servie
	 */
	function Events( $http, $user ) {
		var self = this;

		var base_url = 'events/';
		self.events = {};
		self.data = {'can_register':false};
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
						//console.log(element['eveName']);
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
				}else{
					//console.log(cat);
					if ( Object.keys( cat['sub'] ).length == 0 ) {
						delete self.events['sub'][cat['eveName']];
					}
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
				//console.log(self.currEvent);
			} else if ( level == 1 && self.currEvent['hasSub'] == 1 ) {
				self.currEvent = self.currEvent['sub'][name];
			}

		}

		this.refreshEvents = function() {
			if ( self.currEvent ) {
				for ( var e in self.currEvent['sub'] ) {
					if ( self.currEvent['sub'][e]['size'] > 0 ) {
						var eve = self.currEvent['sub'][e];
						if ( $user.username !== false && $user.user['event'].indexOf( e.eveName ) !== -1 ) {
							eve.isRegistered = true;
							eve.reg_status = "You have already registered for this event";
						} else {
							eve.isRegistered = false;
							eve.reg_status = "You have not registered for this event";
						}
						eve.gList ={};
						eve.gName = "";
						if ( eve.size > 1 ) {
							for ( var i = 0;i < eve['size'] - 1; i++ ) {
								eve.gList[i] = "ANW";
							}
						}
					}
				}
			}
			self.data.can_register = true;
		}
	}

	myApplication.service( 'Events', ['$http', 'User', Events] );

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

	myApplication.controller( 'LoginCtrl',['User','$scope','$http', 'Events', function($user,$scope,$http,$events){
		var self = this;
		this.fields = {"name":"Anwesha ID","password":"Password"};
		this.success_msg = "You have successfully LoggedIn. Now close this window";
		this.inProgress = 0;
		this.success = 0;
		this.err = "";
		this.user = {};
		this.user.name = "Anwesha ID";
		this.user.password = "Password";

		this.submit = function() {
			if ( self.inProgress == 0 ) {
				self.inProgress = 1;
				$user.loginUser( self.user.name, self.user.password ).then(
					function( response ) {
						if ( response.data['status'] == false ) {
							self.err = response.data['msg'];
						} else {
							self.err = "";
							self.success = 1;
							$user.setDetails( self.user.name, response.data );
							$events.refreshEvents();
						}
						self.inProgress = 0;
					}, function( errorResponse ) {
						console.log( errorResponse );
						self.inProgress = 0;
					}
				);
			}

		}

		this.sendEmail = function() {
			if ( self.inProgress == 0 ) {
				self.inProgress = 1;
				return $http({
					method: "get",
					url: 'resendEmail/' + self.user.name,
				}).then( function( response ) {
					self.err = response.data['msg'];
					self.inProgress = 0;
				}, function( errorResponse ) {
					console.log( errorResponse );
					self.err = "Cannot send email.";
					self.inProgress = 0;
				} );
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
			if ( Object.keys( $events.events ).length === 0 ) {
				$events.init($http).then( function( response ) {
					self.isEvents = true;
					document.body.style.overflow = 'hidden';
				}, function( errorResponse ) {
					console.log(errorResponse);
				} );
			} else {
				self.isEvents = true;
				document.body.style.overflow = 'hidden';
			}
		}

		this.showTeam = function() {
			document.body.style.overflow = 'hidden';
			self.isTeam = true;
		}

		this.showSponsors = function() {
			document.body.style.overflow = 'hidden';
			self.isSponsors = true;
		}

		this.showArchives = function() {
			document.body.style.overflow = 'hidden';
			self.isArchives = true;
		}

		this.showWebTeam = function() {
			document.body.style.overflow = 'hidden';
			self.isWebTeam = true;
		}

		this.showRegForm = function() {
			self.isRegForm = true;
		}

		this.showLogForm = function() {
			self.isLogForm = true;
		}

		this.closeOverlay = function( name ) {
			self[name] = false;
			document.body.style.overflow = 'visible';
		}

		$scope.$on( 'closeOverlay', function(event,name) {
			self.closeOverlay( name );
		} );
	} ] );

	myApplication.controller( 'eventCtrl', ['$sce', '$http', 'Events', 'User', '$scope', function($sce,$http,$events,$user,$scope){
		var self = this;
		this.events = $events.events;
		this.sub_events = $events.currEvent;
		this.data = $events.data;
		this.event_register_url = "register/";
		this.group_register_url = "register/group/";
		this.currCat = '';

		this.isCurrCat = function( ename ) {
			return ename == self.currCat;
		}
		this.showEvent = function( name, level ) {
			// a category event
			//console.log(self.sub_events);
			if ( self.sub_events.hasSub == 1 || level === 0 ) {
				if ( level == 0 ) {
					self.currCat = name;
				}
				$events.showEvent( name, level );
				self.sub_events = $events.currEvent;
				for ( var e in self.sub_events['sub'] ) {
					if ( self.sub_events['sub'][e]['details'] ) {
						var eve = self.sub_events['sub'][e];
						if ( typeof ( eve.details ) === 'string' ) {
							eve.details = $sce.trustAsHtml(eve.details);
							if ( $user.username !== false && $user.user['event'].indexOf( e.eveName ) !== -1 ) {
								eve.isRegistered = true;
								eve.reg_status = "You have already registered for this event";
							} else {
								eve.isRegistered = false;
								eve.reg_status = "You have not registered for this event";
							}
							eve.gList ={};
							eve.gName = "";
							if ( eve.size > 1 ) {
								for ( var i = 0;i < eve['size'] - 1; i++ ) {
									eve.gList[i] = "ANW";
								}
							}
						}
					}
				}
				// the logic below is to fade events in an animated manner
				setTimeout( function(){
					$( $( '.base-event-details' )[0] ).addClass( 'first-index' );
					$( '.base_event' ).each( function( index ) {
						$( this ).click( function() {
							var $front = $( $( '.base-event-details' )[index] );
							var t = $( '.first-index' ).addClass( 'second-index' ).removeClass( 'first-index' );
							$front.css( 'opacity', 0 ).addClass( 'first-index' ).animate( {opacity:1} , 300, function(){
								$( '.second-index' ).removeClass( 'second-index first-index' );
							} );
						//console.log(index);
						} );
					} );
				},10 );
			}
		}

		// very hacky!
		this.backEvent = function() {
			if ( self.sub_events['code'] == 'Technical' ) {
				$events.currEvent = $events.events['sub']['Technical'];
				self.sub_events = $events.currEvent;
			} else {
				$scope.$emit( 'closeOverlay', 'isEvents' );
			}
		}

		this.registerEvent = function( eveName, eveObj ) {
			if ( eveObj.size == 1 ) {
				return $http({
					method: "post",
					url: self.event_register_url + eveObj.eveId,
				}).then( function( response ) {
					console.log(response);
					eveObj.reg_status = response.data['msg'];
				}, function( errorResponse ) {
					console.log( errorResponse );
				} );
			} else {
				var list = [];
				for ( i in eveObj.gList ) {
					if ( eveObj.gList[i] !== 'ANW' ) {
						list.push( eveObj.gList[i] );
					}
				}
				return $http({
					method: "post",
					url: self.group_register_url + eveObj.eveId,
					// headers: {'Content-type': 'application/x-www-form-urlencoded;charset=utf-8'},
					// transformRequest: transformRequestAsFormPost,
					data: {
						IDs: list,
						name: eveObj.gName
					}
				}).then( function( response ) {
					console.log(response);
					eveObj.reg_status = response.data['msg'];
				}, function( errorResponse ) {
					console.log( errorResponse );
				} );
				console.log( eveObj.gList );
			}
		}
	} ] );
})();


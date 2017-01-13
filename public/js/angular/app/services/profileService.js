angular.module('profileService', [])

.factory('Profile', function($http) {

    return {
        update : function(profileData) {
            return $http({   
                method: 'POST',
                url: '/api/v1/profile',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(profileData)
            });
	    
        }
    }

});
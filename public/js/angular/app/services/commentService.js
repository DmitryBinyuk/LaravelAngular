angular.module('commentService', [])

.factory('Comment', function($http) {

    return {
        // get all the comments
        get : function(phoneId) {
            return $http.get('/api/v1/comment/'+phoneId);
        },

        // save a comment (pass in comment data)
        save : function(commentData) {
            return $http({   
                method: 'POST',
                url: '/api/v1/comment',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(commentData)
            });
	    
        },

        // destroy a comment
        destroy : function(id) {
            return $http.delete('/api/comments/' + id);
        }
    }

});
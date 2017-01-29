app.controller('PhoneDetailController', function($scope, $rootScope, $http, $stateParams, Comment) {
    
    var phoneId = $stateParams.phoneId;    

    $http.get('/api/v1/phone/'+phoneId).then(function(response){
	$scope.phoneDetailData = response.data;
    });
    
    $http.get('/api/v1/comment/'+phoneId).then(function(response){
	$scope.phoneComments = response.data;
    });
    
    $scope.commentData = {};
    
    $scope.loading = true;
    
    
    //Pagination params
    $scope.currentPage = 1;
    $scope.pageSize = 8;

    Comment.get(phoneId)
        .success(function(data) {
            $scope.comments = data;
            $scope.loading = false;
        });
    
    $scope.submitComment = function() {
	
        $scope.loading = true;

        // save the comment. pass in comment data from the form
        // use the function we created in our service
	
	$scope.commentData.phone_id = $scope.phoneDetailData.id;
	$scope.commentData.author = $rootScope.currentUserName;
	
        Comment.save($scope.commentData)
            .success(function(data) {

                // if successful, we'll need to refresh the comment list
                Comment.get(phoneId)
                    .success(function(getData) {
                        $scope.comments = getData;
                        $scope.loading = false;
                    });

            })
            .error(function(data) {
                console.log(data);
            });
    };

    // function to handle deleting a comment
    $scope.deleteComment = function(id) {
        $scope.loading = true; 

        // use the function we created in our service
        Comment.destroy(id)
            .success(function(data) {

                // if successful, we'll need to refresh the comment list
                Comment.get(phoneId)
                    .success(function(getData) {
                        $scope.comments = getData;
                        $scope.loading = false;
                    });

            });
    };
});
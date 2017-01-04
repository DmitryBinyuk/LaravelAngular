<div>
    Phone detail for: [[name]]<br>
    <div class="block">
	[[phoneDetailData.name]]
    </div>

    <div class="block">
	<img ng-src="[[phoneDetailData.image]]" class="phone_detail_image">
    </div>

	<h3 class="comment_title">Comments:</h3>

    <div class="block">
	<form ng-submit="submitComment()">

	    <div class="form-group">
		<textarea type="text" rows="4" class="form-control input-md comment_input" name="comment" ng-model="commentData.text" placeholder="Please write your comment"></textarea>
	    </div>

	    <div class="form-group text-right">
		<button type="submit" class="btn btn-primary btn-lg">Add comment</button>
	    </div>
	</form>
    </div>

    <div class="block comment">
	<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

<!--	<div class="comment" ng-hide="loading" ng-repeat="comment in comments.data">
	    <h3>Comment #[[comment.id]] <small>by {{ comment.author }}</h3>
	    <p>{{ comment.text }}</p>

	    <p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p>
	</div>-->
	<ul>
                <li dir-paginate="comment in comments.data | filter:q | itemsPerPage: pageSize" current-page="currentPage">{{ comment.author }}</li>

        </ul>
<dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="/js/angular/app/pagination.html"></dir-pagination-controls>
    </div>
</div>

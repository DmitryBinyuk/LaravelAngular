<div>
    <ul>
	<li ng-repeat="phone in laravelHttpResponse.data" class="phone_list_element">
	    [[phone.name]] <span style="color: green;">by [[phone.brand_name]] </span>
	</li>
    </ul>
</div>

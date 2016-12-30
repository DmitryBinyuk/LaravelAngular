<div>
    <div class="filtering_phones">
	<span class="block">Filtering:</span>
	<input ng-model="phone_search" class="block" name="phone_search">
	<!--<span class="block">Filtering by brand:</span>-->
	<select ng-model="brandFilter">
	    <option ng-repeat="(key, value) in brands" value="{{key}}">{{value.name}}</option>
	</select>
    </div>
    <ul>
	<li ng-repeat="phone in laravelHttpResponse.data | filter:phone_search | filter:brandFilter"  class="phone_list_element">

	    <a href="#phone/[[phone.id]]" class="phone_list_name">[[phone.name]]</a>
	    <a href="/phone/[[phone.id]]">
		<img ng-src="[[phone.image]]" class="phone_list_image">
	    </a>

	    <p style="color: green;">by [[phone.brand_name]] </p>
	</li>
    </ul>
</div>

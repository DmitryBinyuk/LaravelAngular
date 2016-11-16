<div>
    <ul>
	<li ng-repeat="phone in laravelHttpResponse.data" class="phone_list_element">

	    <a href="#phono/[[phone.id]]" class="phone_list_name">[[phone.name]]</a>
	    <a href="/phone/[[phone.id]]">
		<img ng-src="[[phone.image]]" class="phone_list_image">
	    </a>

	    <p style="color: green;">by [[phone.brand_name]] </p>
	</li>
    </ul>
</div>

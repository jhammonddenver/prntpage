var map;
var geocoder;

function loadMap() {
	var pune = {lat: 39.740616, lng: -105.032776};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: pune
    });
 
     var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        // Specify just the place data fields that you need.
        autocomplete.setFields(['place_id', 'geometry', 'name']);

       var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);

  

    var cdata = JSON.parse(document.getElementById('data').innerHTML);
    geocoder = new google.maps.Geocoder();  
    codeAddress(cdata);

    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    showAllColleges(allData);
    
    autocomplete.addListener('place_changed', function() {
          infowindow.close();

          var place = autocomplete.getPlace();

          if (!place.geometry) {
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }
    });
}

function showAllColleges(allData) {
	var infoWind = new google.maps.InfoWindow;
	Array.prototype.forEach.call(allData, function(data){
		var content = document.createElement('p');
		var strong = document.createElement('strong');
	var strong2 = document.createElement('strong2');

		
		

	
		if(data.monthly){
		    	strong.textContent = '$'
		
		+ data.monthly + ' a month.                                                 '
		
		;
		
		content.appendChild(strong);
		}
			if(data.price){
		    	strong.textContent = '$'
		
		+ data.price + ' to buy.                                                 '
		
		;
		
		content.appendChild(strong);
		}

 var img = document.createElement('img');
		img.src = 'items/photos/' + data.main_pic;
	
		
		img.title = data.name;
		img.style.width = '100px';
			img.style.height = '100px';
		img.onclick = function() {
    window.location.href = 'item.php?id=' + data.id;
};
		content.appendChild(img);
		

	

		var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.lat, data.lng),
	     
	      map: map
	    });

	    marker.addListener('mouseover', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    })
	})
}

function codeAddress(cdata) {
   Array.prototype.forEach.call(cdata, function(data){
    	var address = data.name + ' ' + data.address;
	    geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == 'OK') {
	        map.setCenter(results[0].geometry.location);
	        var points = {};
	        points.id = data.id;
	        points.lat = map.getCenter().lat();
	        points.lng = map.getCenter().lng();
	        updateCollegeWithLatLng(points);
	      } else {
	        alert('Geocode was not successful for the following reason: ' + status);
	      }
	    });
	});
}

function updateCollegeWithLatLng(points) {
	$.ajax({
		url:"action-item.php",
		method:"post",
		data: points,
		success: function(res) {
			console.log(res)
		}
	})
	
}
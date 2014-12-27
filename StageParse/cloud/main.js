
// Use Parse.Cloud.define to define as many cloud functions as you want.
// For example:


Number.prototype.toRadians = function() {
   return this * Math.PI / 180;
}

Parse.Cloud.define("hello", function(request, response) {
  response.success("Hello world!");
});

Parse.Cloud.define("isInVenue", function(request, response){
	var query = new Parse.Query("Event");
	var events = []
	var errors = []
	query.each(function(anEvent){
		if (testLocation(request.params.lat, request.params.lon, anEvent.get("Latitude"), anEvent.get("Longitude"), anEvent.get("Range"))) {
			 events.push(anEvent);
			 console.log("Added event: "+anEvent);
			// response.success(anEvent);
		}else{
		var thisError = anEvent+" "+anEvent.get("Latitude")+" "+anEvent.get("Longitude")+" "+anEvent.get("Range");
		errors.push(thisError);
      };
	}).then(
  function(object) {
    response.success(events);
  },
  function(error) {
    response.error(errors);
  });;

    // response.success(testLocation(request));
});


Parse.Cloud.define("getBands", function(request, response) {
	Parse.Cloud.useMasterKey();
	var query = new Parse.Query("BAND");


	query.containedIn("objectId",  request.params.idSet);
	query.find({
    success: function(results) {
    	console.log(results.length);
      response.success(results);
    },
    error: function(error) {
      response.error(error);
    }
  });

});

function testLocation(userLat, userLon, eventLat, eventLon, eventDistance){

    var R = 6371; // km
	var φ1 = userLat* Math.PI / 180;;
	var φ2 = eventLat* Math.PI / 180;;
	var Δφ = (eventLat-userLat) * Math.PI / 180;;
	var Δλ = (eventLon-userLon) * Math.PI / 180;;

	var a = Math.sin(Δφ/2) * Math.sin(Δφ/2) +
	        Math.cos(φ1) * Math.cos(φ2) *
	        Math.sin(Δλ/2) * Math.sin(Δλ/2);
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

	var d = R * c;

	if ((d*0.621371) <= eventDistance) {
		return true;
	}else{
		return false;
	};

};



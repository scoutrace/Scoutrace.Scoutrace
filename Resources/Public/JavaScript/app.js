// Set up paths for libraries
require.config({
	paths: {
		'jquery': 'Libraries/jquery',
		'ember': 'Libraries/ember',
		'bootstrap': 'Libraries/bootstrap',
		'handlebars': 'Libraries/handlebars',
		'leaflet': 'Libraries/leaflet'
	}
});

// Require libraries and run application
require(['jquery', 'ember', 'bootstrap', 'handlebars', 'leaflet'], function(jQuery, Ember, Bootstrap, Handlebars, Leaflet) {
	alert('yæi!');
});
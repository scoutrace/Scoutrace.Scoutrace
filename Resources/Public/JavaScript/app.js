// Set up paths for libraries
require.config({
	paths: {
		'jquery': '../Libraries/jQuery/jquery',
		'ember': '../Libraries/Ember/ember',
		'bootstrap': '../Libraries/bootstrap/js/bootstrap.min',
		'handlebars': '../Libraries/Handlebars/handlebars',
		'leaflet': '../Libraries/Leaflet/leaflet'
	},
	shim: {
		'bootstrap': {
			deps: ['jquery']
		},
		'ember': {
			deps: ['jquery', 'handlebars']
		}
	}
});

// Require libraries and run application
require(['jquery', 'ember', 'bootstrap', 'handlebars', 'leaflet'], function(jQuery, Ember, Bootstrap, Handlebars, Leaflet) {
	//alert('yæi!');
});
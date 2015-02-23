/*global angular */

angular.module('todo')
	.factory('todoStorage', function ($http) {
		'use strict';

		return {
			get: function (callback) {

				$http.get('/get-todos').
			  success(function(data, status, headers, config) {
					console.log(data)
			    // this callback will be called asynchronously
			    // when the response is available
					return callback(data);
			  }).
			  error(function(data, status, headers, config) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
					return callback(JSON.parse('[]'));
			  });

			},

			post: function (todo, callback) {

				$http.post('/create-todos', {todo:todo}).
				success(function(data, status, headers, config) {
					// this callback will be called asynchronously
					// when the response is available
					return callback(data);
				}).
				error(function(data, status, headers, config) {
					// called asynchronously if an error occurs
					// or server returns response with an error status.
					return callback(JSON.parse('[]'));
				});
			},

			put: function (todo, callback) {

				var id = todo._id ? '/' + todo._id : '';

				$http.put('/update-todos' + id, {todo:todo}).
				success(function(data, status, headers, config) {
					// this callback will be called asynchronously
					// when the response is available
					return callback(data);
				}).
				error(function(data, status, headers, config) {
					// called asynchronously if an error occurs
					// or server returns response with an error status.
					return callback(JSON.parse('[]'));
				});
			},

			delete: function (todo, callback) {

				var id = todo._id ? '/' + todo._id : '';

				console.log(id)

				$http.put('/delete-todos' + id, {todo:todo}).
				success(function(data, status, headers, config) {
					// this callback will be called asynchronously
					// when the response is available
					return callback(data);
				}).
				error(function(data, status, headers, config) {
					// called asynchronously if an error occurs
					// or server returns response with an error status.
					return callback(JSON.parse('[]'));
				});
			},

			email: function (email) {

				$http.post('/email', email).
				success(function(data, status, headers, config) {
					// this callback will be called asynchronously
					// when the response is available
					return callback(data);
				}).
				error(function(data, status, headers, config) {
					// called asynchronously if an error occurs
					// or server returns response with an error status.
					return callback(JSON.parse('[]'));
				});
			}

		};
	});

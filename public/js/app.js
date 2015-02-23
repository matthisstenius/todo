/*global angular */

angular.module('todo', ['ngRoute'])
	.config(function ($routeProvider) {
		'use strict';

		$routeProvider.when('/', {
			controller: 'TodoCtrl',
			templateUrl: 'todo-index.html'
		}).when('/:status', {
			controller: 'TodoCtrl',
			templateUrl: 'todo-index.html'
		}).otherwise({
			redirectTo: '/'
		});
	});

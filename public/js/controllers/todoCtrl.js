/*global angular */

/**
 * The main controller for the app. The controller:
 * - retrieves and persists the model via the todoStorage service
 * - exposes the model to the template and provides event handlers
 */
angular.module('todo')
	.controller('TodoCtrl', function TodoCtrl($scope, $routeParams, $filter, todoStorage) {
		'use strict';

		var todos;

		todoStorage.get(function(todo) {
				todos = $scope.todos = todo;
		});

		$scope.newTodo = '';
		$scope.editedTodo = null;

		$scope.$watch('todos', function (newValue, oldValue) {
			if (!newValue) return;
			$scope.remainingCount = $filter('filter')(todos, { completed: false }).length;
			$scope.completedCount = todos.length - $scope.remainingCount;
			$scope.allChecked = !$scope.remainingCount;
		}, true);

		// Monitor the current route for changes and adjust the filter accordingly.
		$scope.$on('$routeChangeSuccess', function () {
			var status = $scope.status = $routeParams.status || '';

			$scope.statusFilter = (status === 'active') ?
				{ completed: false } : (status === 'completed') ?
				{ completed: true } : null;
		});

		$scope.addTodo = function () {
			var newTodo = $scope.newTodo.trim();
			if (!newTodo.length) {
				return;
			}

			todoStorage.post({
				title: newTodo,
				completed: false
			}, function(todo) {
				todos.push(todo);
				$scope.newTodo = '';
			});


		};

		$scope.flipCompleted = function (todo) {
			todo.completed = !todo.completed;
			todoStorage.put(todo, function() {});
		};

		$scope.editTodo = function (todo) {
			$scope.editedTodo = todo;
			// Clone the original todo to restore it on demand.
			$scope.originalTodo = angular.extend({}, todo);
		};

		$scope.doneEditing = function (todo) {
			$scope.editedTodo = null;


			if (!todo.title) {
				todoStorage.delete(todo, function(todo) {
					$scope.removeTodo(todo);
				});
			} else {
				todoStorage.put(todo, function() {
					todo.title = todo.title.trim();
				});
			}
		};

		$scope.revertEditing = function (todo) {
			todos[todos.indexOf(todo)] = $scope.originalTodo;
			$scope.doneEditing($scope.originalTodo);
		};

		$scope.removeTodo = function (todo) {

			var t = todo
			todoStorage.delete(todo, function(todo) {
				todos.splice(todos.indexOf(t), 1);
			});

		};

		$scope.clearCompletedTodos = function () {


			var itemsToRemove = todos.filter(function (val) {
				return val.completed;
			});

			todoStorage.delete(itemsToRemove, function() {

					$scope.todos = todos = todos.filter(function (val) {
						return !val.completed;
					});

			});

		};

		$scope.sendEmail = function() {
			var email = prompt("Please enter your email", "");
			todoStorage.email({email:email}, function(ok) {
				if (ok.status === 200) {
					alert('email sent')
				}
			});
		}

		$scope.markAll = function (completed) {

			todos.forEach(function (todo) {
				todo.completed = !completed;
			});

			todoStorage.put(todos, function() {

			});

		};
	});

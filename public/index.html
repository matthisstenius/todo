<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Todo</title>
		<link rel="stylesheet" href="style/main.css">
		<style>[ng-cloak] { display: none; }</style>
	</head>
	<body ng-app="todo">

		<ng-view />

		<script type="text/ng-template" id="todo-index.html">
			<section id="todoapp">
				<header id="header">
					<h1>todos</h1>
					<form id="todo-form" ng-submit="addTodo()">
						<input id="new-todo" placeholder="What needs to be done?" ng-model="newTodo" autofocus>
					</form>
				</header>
				<section id="main" ng-show="todos.length" ng-cloak>
					<input id="toggle-all" type="checkbox" ng-model="allChecked" ng-click="markAll(allChecked)">
					<label for="toggle-all">Mark all as complete</label>
					<ul id="todo-list">
						<li ng-repeat="todo in todos | filter:statusFilter track by $index" ng-class="{completed: todo.completed, editing: todo == editedTodo}">
							<div class="view">
								<input class="toggle" type="checkbox" ng-model="todo.completed" ng-click="flipCompleted(todo)">
								<label ng-dblclick="editTodo(todo)">{{todo.title}}</label>
								<button class="destroy" ng-click="removeTodo(todo)"></button>
							</div>
							<form ng-submit="doneEditing(todo)">
								<input class="edit" ng-trim="false" ng-model="todo.title" todo-escape="revertEditing(todo)" ng-blur="doneEditing(todo)" todo-focus="todo == editedTodo">
							</form>
						</li>
					</ul>
				</section>
				<footer id="footer" ng-show="todos.length" ng-cloak>
					<span id="todo-count"><strong>{{remainingCount}}</strong>
						<ng-pluralize count="remainingCount" when="{ one: 'item left', other: 'items left' }"></ng-pluralize>
					</span>
					<ul id="filters">
						<li>
							<a ng-class="{selected: status == ''} " href="#/">All</a>
						</li>
						<li>
							<a ng-class="{selected: status == 'active'}" href="#/active">Active</a>
						</li>
						<li>
							<a ng-class="{selected: status == 'completed'}" href="#/completed">Completed</a>
						</li>
					</ul>
					<button id="clear-completed" ng-click="clearCompletedTodos()" ng-show="completedCount">Clear completed ({{completedCount}})</button>
					<button id="" ng-click="sendEmail()" >send email</button>

				</footer>
			</section>
		</script>
		<script src="bower_components/todomvc-common/base.js"></script>
		<script src="bower_components/angular/angular.js"></script>
		<script src="bower_components/angular-route/angular-route.js"></script>
		<script src="js/app.js"></script>
		<script src="js/controllers/todoCtrl.js"></script>
		<script src="js/services/todoStorage.js"></script>
		<script src="js/directives/todoFocus.js"></script>
		<script src="js/directives/todoEscape.js"></script>
	</body>
</html>

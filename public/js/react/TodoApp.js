var app = app || {};

var TodoFooter = app.todoFooter;
var Item = app.Item;

app.ALL_TODOS = 'all';
app.ACTIVE_TODOS = 'active';
app.COMPLETED_TODOS = 'completed';

var TodoApp = React.createClass({
    getInitialState: function() {
        return {data: [], editing: null};
    },

    componentDidMount: function() {
        this.state.nowShowing = app.ALL_TODOS;

        this.props.model.all(function(items) {
            this.setState({data: items});
        }.bind(this))
    },

    handleItemSubmit: function(item) {
        var items = this.state.data;

        items.push(item);

        this.setState({data: items, editing: null});
        this.props.model.create(item, function(result) {
            items.map(function(item) {
                if (!item.hasOwnProperty('_id')) {
                    item._id = result._id;
                }
            })

            this.forceUpdate();
        }.bind(this));

    },

    handleItemChange: function(todoItem) {
        var items = this.state.data;

        items.map(function(item, index) {
            if (item._id == todoItem._id) {
                items[index] = todoItem;
            }
        })

        this.setState({data: items});

        this.props.model.update(todoItem, function(result) {

        });
    },

    handleItemRemoval: function(todoItem) {
        var items = this.state.data;

        items.map(function(item, index) {
           if (item._id == todoItem._id) {
               items.splice(index, 1);
               this.setState({data: items})
           }
        }.bind(this));

        this.props.model.remove(todoItem);
    },

    handleTabSwitch: function(tab) {
        this.setState({nowShowing: tab});
    },
    
    handleMarkAll: function() {
        var items = this.state.data;

        var checked = this.refs.markAll.getDOMNode().checked;

        items.map(function(item) {
            if (checked) {
                item.completed = true;
            } else {
                item.completed = false;
            }
        });

        this.setState({data: items});
        this.props.model.updateAll(items);
    },

    handleClearCompleted: function() {
        var items = this.state.data;
        var toRemove = [];

        items.map(function(item, index) {
            if (item.completed) {
                toRemove.push(item);
                delete items[index]
            }
        });

        this.setState({data: items});
        this.props.model.removeCompleted(toRemove);
    },

    handleSendEmail: function() {
        var email = window.prompt('Enter your email');

        this.props.model.sendEmail(email, function() {
            alert('email sent');
        });
    },

    handleEditTodo: function(item, callback) {
        this.setState({editing: item._id}, function() {
            callback();
        })
    },

    handleCancelEdit: function() {
        this.setState({editing: null});
    },

    render: function() {
        var items = this.state.data;
        var nowShowing = this.state.nowShowing;
        var remaining = 0;
        var completed = 0;

        var showTodos = items.filter(function(item) {
            if (nowShowing == app.COMPLETED_TODOS) {
                return item.completed
            } else if (nowShowing == app.ACTIVE_TODOS) {
                return !item.completed;
            }
            return true
        });

        var commentNodes = showTodos.map(function (item) {
            if (!item.completed) {
                remaining++
            } else {
                completed++
            }

            return (
                <Item
                    key={item._id}
                    remove={this.handleItemRemoval.bind(this, item)}
                    update={this.handleItemChange}
                    editTodo={this.handleEditTodo.bind(this, item)}
                    cancelEdit={this.handleCancelEdit}
                    editing={this.state.editing}
                    item={item} />
            );
        }.bind(this));

        return(
            <section id="todoapp">
                <header id="header">
                    <h1>Todos</h1>
                    <TodoForm onItemSubmit={this.handleItemSubmit}/>
                </header>
                <section id="main">
                    <input id="toggle-all" ref="markAll" type="checkbox" onChange={this.handleMarkAll} />
                    <ul id="todo-list">
                        {commentNodes}
                    </ul>
                </section>
                <TodoFooter
                    nowShowing={this.state.nowShowing}
                    onTabSwitch={this.handleTabSwitch}
                    onClearCompleted={this.handleClearCompleted}
                    onSendEmail={this.handleSendEmail}
                    remaining={remaining}
                    completedCount={completed}
                />
            </section>
        );
    }
});

var model = new app.Todo();
React.render(<TodoApp model={model} />, document.getElementById('content'));
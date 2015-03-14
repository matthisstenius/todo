var TodoForm = React.createClass({
    handleSubmit: function(e) {
        e.preventDefault();

        var title = this.refs.title.getDOMNode().value.trim();

        if (!title) {
            return;
        }

        this.props.onItemSubmit({title: title, completed: false});

        this.refs.title.getDOMNode().value = '';
    },

    render: function() {
        return (
            <form id="todo-form" onSubmit={this.handleSubmit}>
                <input id="new-todo" placeholder="What needs to be done?" ref="title" autofocus />
            </form>
        );
    }
});
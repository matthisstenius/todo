var app = app || {};

app.Item = React.createClass({
    saveTodo: function() {
        var completed = this.refs.completed.getDOMNode().checked;

        this.props.update({_id: this.props.item._id, title: this.props.item.title, completed: completed})
    },

    editTodo: function() {
        this.props.editTodo(function() {
            var node = this.refs.editField.getDOMNode();
            node.focus();
            node.setSelectionRange(node.value.length, node.value.length);
        }.bind(this));
    },

    doneEditing: function() {
        var node = this.refs.editField.getDOMNode();

        if (this.props.editing) {
            this.props.update({_id: this.props.item._id, title: node.value, completed: this.props.item.completed})
        }

        this.cancelEditing();
    },

    cancelEditing: function() {
        this.props.cancelEdit();
    },

    handleKeyDown: function(e) {
        if (e.keyCode == 13) {
            this.doneEditing();
        } else if (e.keyCode == 27) {
            this.cancelEditing();
        }
    },

    render: function() {
        return (
            <li key={this.props.key} ref="id" className={this.props.item.completed ? 'completed' : ''} className={ this.props.editing === this.props.item._id ? 'editing' : ''}>
                <div className="view">
                    <input className="toggle" type="checkbox" checked={this.props.item.completed ? true : false} ref="completed" onChange={this.saveTodo} />
                    <label onDoubleClick={this.editTodo}>{this.props.item.title}</label>
                    <button className="destroy" onClick={this.props.remove}></button>
                </div>

                <input className="edit" ref="editField" type="text" defaultValue={this.props.item.title} onKeyDown={this.handleKeyDown} onBlur={this.doneEditing} />
            </li>
        )
    }
});
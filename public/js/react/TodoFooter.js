var app = app || {};

app.todoFooter = React.createClass({
       render: function() {
           var remainingLabel = this.props.remaining == 1 ? 'item' : 'items';

           if (this.props.completedCount > 0) {
               var clearCompleted = <button id="clear-completed" onClick={this.props.onClearCompleted}>Clear completed ({this.props.completedCount})</button>
           }

           return (
               <footer id="footer">
                   <span id="todo-count"><strong>{this.props.remaining}</strong> {remainingLabel} left
                   </span>
                   <ul id="filters">
                       <li>
                           <a className={this.props.nowShowing == app.ALL_TODOS ? 'selected': ''} onClick={this.props.onTabSwitch.bind(this, app.ALL_TODOS)}>All</a>
                       </li>
                       <li>
                           <a className={this.props.nowShowing == app.ACTIVE_TODOS ? 'selected': ''} href="#/active" onClick={this.props.onTabSwitch.bind(this, app.ACTIVE_TODOS)}>
                                Active
                           </a>
                       </li>
                       <li>
                           <a className={this.props.nowShowing == app.COMPLETED_TODOS ? 'selected': ''} href="#/completed" onClick={this.props.onTabSwitch.bind(this, app.COMPLETED_TODOS)}>Completed</a>
                       </li>
                   </ul>

                    {clearCompleted}
                   <button id="send-email" onClick={this.props.onSendEmail} >send email</button>
               </footer>
           );
       }
});
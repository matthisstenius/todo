var app = app || {};

app.Todo = function() {
    return {
        all: function(callback) {
            $.ajax({
                url: '/get-todos',
                dataType: 'json',
                success: function(result) {
                    callback(result);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        },

        update: function(item, callback) {
            $.ajax({
                url: '/update-todos/' + item._id,
                type: 'put',
                contentType: 'application/json',
                data: JSON.stringify({todo: item}),
                success: function(result) {
                    callback(result);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        },

        updateAll: function(items) {
            $.ajax({
               url: '/update-todos',
                type: 'put',
                contentType: 'application/json',
                data: JSON.stringify({todo: items}),
                success: function(result) {

                },
                error: function(err) {
                    console.log(err);
                }
            });
        },

        create: function(item, callback) {
            $.ajax({
                url: '/create-todos',
                type: 'post',
                contentType: 'application/json',
                data: JSON.stringify({todo: item}),
                success: function(result) {
                    callback(result);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        },

        remove: function(item) {
            $.ajax({
                url: '/delete-todos/' + item._id,
                type: 'put',
                contentType: 'application/json',
                success: function(result) {

                },
                error: function(err) {
                    console.log(err);
                }
            });
        },
        
        removeCompleted: function(items) {
            $.ajax({
                url: '/delete-todos',
                type: 'put',
                contentType: 'application/json',
                data: JSON.stringify({todo: items}),
                success: function() {
                    
                },
                error: function(err) {
                    console.log(err);
                }
            });
        },
        
        sendEmail: function(email, callback) {
            $.ajax({
                url: '/email',
                type: 'post',
                contentType: 'application/json',
                data: JSON.stringify({email: email}),
                success: function() {
                    callback()
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    }
};
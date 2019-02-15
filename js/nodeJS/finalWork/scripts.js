window.reqToServer = {
    getAllItems: function (callback) {
        $.ajax({
            type: "GET",
            url: '/',
            success: function (data) {
                callback(null, data);
            },
            error: function (err) {
                callback(err);
            }
        });
    }
};
var mysql = require('mysql');
var connection = mysql.createConnection({
    host : 'localhost',
    user : 'root',
    password : 'DobaGI49',
    database : 'cs04501_gl'
});

connection.connect();


/*connection.query('SELECT * FROM tovary WHERE tovar_week = ? AND product_availability = ? LIMIT 4', [1, 1],  function (error, results, fields){
    //var tovar_week ="";
    if (error) throw error;
    console.log('The fields is: ',  fields);
    for (var i in results) {
        //console.log('The results is: ', results[i]);
        //document.write('results[i]');
        tovar_week=results[i];
    }
    connection.end();
})*/

exports.read = function(callback){
    connection.query('SELECT * FROM tovary WHERE tovar_week = ? AND product_availability = ? LIMIT 4', [1, 1],  function (error, results, fields){
        if (error) return callback(error);
        //console.log('The fields is: ',  fields);
        for (var i in results) {
            console.log('The results is: ', results[i]);
        }
        callback(null, results);
    });
};

/*var tovar_day ="";
connection.query('SELECT * FROM tovary WHERE tovar_day = ? AND product_availability = ? LIMIT 4', [1, 1],  function (error, results, fields){

    if (error) throw error;
    console.log('The fields is: ',  fields);
    for (var i in results) {
        //console.log('The results is: ', results[i]);
        //document.write('results[i]');
        tovar_day;
    }
    connection.end();
});*/

/*var tovar_new ="";
connection.query('SELECT * FROM tovary WHERE new = ? AND product_availability = ? LIMIT 12', [1, 1],  function (error, results, fields){

    if (error) throw error;
    console.log('The fields is: ',  fields);
    for (var i in results) {
        //console.log('The results is: ', results[i]);
        //document.write('results[i]');
        tovar_new;
    }
    connection.end();
});*/


/*var tovar_popular="";
connection.query('SELECT * FROM tovary WHERE popular = ? AND product_availability = ? LIMIT 12', [1, 1],  function (error, results, fields){

    if (error) throw error;
    console.log('The fields is: ',  fields);
    for (var i in results) {
        //console.log('The results is: ', results[i]);
        //document.write('results[i]');
        tovar_popular;
    }
    connection.end();
});*/
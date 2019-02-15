const http = require('http'); // подключение модуля
const fs = require('fs'); // подключение модуля для работы с файлом const filename = "index.html";
let path = require('path'); // подключение модуля для работы с путями в файловой системее

var express = require('express');
let bodyParser = require('body-parser'); /*подключаем модуль для обработки содержимого тела post запроса */
var app = express();

//let model = require('./model.js');

//let routerItems = require('./gymland/router/items.js');

//app.use(express.static('public'));
//app.use(bodyParser.json());
//app.use('/', routerItems);

let mimeTypes = {
    '.js': 'text/javascript',
    '.html': 'text/html',
    '.css': 'text/css',
    '.jpg': 'image/jpeg',
    '.gif': 'image/gif',
    '.png': 'image/png',
    '.jpeg': 'image/jpeg',
    '.php': 'text/php',
    '.ico': 'image/x-icon',
    '.svg': 'image/svg+xm',
    '.woff': 'application/font-woff',
    '.woff2': 'application/font-woff2',
    '.ttf':'application/font-ttf'
};

var mysql = require('mysql');
var connection = mysql.createConnection({
    host : 'localhost',
    user : 'root',
    password : 'DobaGI49',
    database : 'cs04501_gl'
});

connection.connect();

var tovar_week ="";
connection.query('SELECT * FROM tovary WHERE tovar_week = ? AND product_availability = ? LIMIT 4', [1, 1],  function (error, results, fields){

    if (error) throw error;
    console.log('The fields is: ',  fields);
    for (var i in results) {
        console.log('The results is: ', results[i]);
        //document.write('results[i]');
        //tovar_week;
    }
    connection.end();
});

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


http.createServer((request, response) => {
    let pathname, extname, mimeType;
    console.log("Request: " + request.url);
    if (request.url === '/')
        pathname = 'gymland/index.html';
    else
        pathname = 'gymland' + request.url;
    extname = path.extname(pathname);
    mimeType = mimeTypes[extname];

    if (extname === ".jpg" || extname === ".gif" || extname === ".png" || extname === ".jpeg") {
        try {
            let img = fs.readFileSync(pathname);
            console.log(`The file ${pathname} is read and sent to the client\n`);
            response.writeHead(200, {'Content-Type': mimeType});
            response.end(img);
        } catch (e) {
            console.log('Could not find or open file for reading\n');
            response.statusCode = 404;
            response.end();
        }
    } else {
        fs.readFile(pathname, 'utf8', (err, data) => {
            if (err) {
                console.log('Could not find or open file for reading\n');
                response.statusCode = 404;
                response.end();
            } else {
                console.log(`The file ${pathname} is read and sent to the client\n`);
                response.writeHead(200, {'Content-Type': mimeType});
                //res.send(data)
                response.end(data);
            }
        });
    }
}).listen(8080, ()=>{
    console.log("HTTP server works in 8080 port!\n");
});




/*
Задача 1.

const http = require('http'); // подключение модуля
const server = http.createServer((request, response) => { // вызов метода создания http сервера
     console.log("HTTP works!");
});
server.listen(8080);
*/


/*
Задача 2.

const http = require('http'); // подключение модуля
http.createServer((request, response) => { // вызов метода создания
http сервера console.log("HTTP works!");
response.writeHead(404, {'Content-Type':'text/html'});
response.write('<h1>404 Not Found</h1>');
response.end();
}).listen(8080);
*/

/* Задача 3 */

/*const http = require('http'); // подключение модуля http
const fs = require('fs'); // подключение модуля для работы с файлом
const filename = "../header.html";
http.createServer((request, response) => {// вызов метода создания http сервера
    fs.readFile(filename, 'utf8', (err, data) => {
    if (err) {
        console.log('Could not find or open file for reading\n');
        response.statusCode = 404;
        response.end();
    } else {
        console.log(`The file ${filename} is read and sent to the client\n`);
        response.writeHead(200, {'Content-Type':'text/html'});
        response.end(data);
    } });
console.log("Request accepted!"); }).listen(8080, ()=>{
    console.log("HTTP server works in 8080 port!\n"); });
*/
const http = require('http'); // подключение модуля http
const FS = require('fs');

function FS_readFiles (paths, cb) {
    var result = [], errors = [], l = paths.length;
    paths.forEach(function (path, k) {

        FS.readFile(path, function (err, data) {
            --l;
            err && (errors[k] = err);
            !err && (result[k] = data);
            !l && cb (errors.length? errors : undef, result);
        });

    });
}

var htmlFiles = [
    '../header.html',
    '../body.html',
    '../footer.html'
];


http.createServer((request, response) => {// вызов метода создания http сервера
    FS_readFiles(htmlFiles, function (errors, data) {
        if (err) {
            console.log('Could not find or open file for reading\n');
            response.statusCode = 404;
            response.end();
        } else {
            console.log(`The file is read and sent to the client\n`);
            response.writeHead(200, {'Content-Type':'text/html'});
            response.end(data);
        } });
    console.log("Request accepted!"); }).listen(8080, ()=>{
    console.log("HTTP server works in 8080 port!\n"); });

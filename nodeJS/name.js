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

let http = require('http');
let fs = require('fs');

http.createServer(response).listen(8080);

function response(req, res){
    fs.readFile('header.html', 'utf8', (err, data1)=>{
        if (err) {
            console.log('File error');
            res.statusCode = 404;
            res.end();
        } else {
            fs.readFile('body.html', 'utf8', (err, data2)=>{
                if (err){
                    console.log('File error');
                    res.statusCode = 404;
                    res.end();
                } else {
                    fs.readFile('footer.html', 'utf8', (err, data3)=> {
                        if (err) {
                            console.log('File error');
                            res.statusCode = 404;
                            res.end();
                        } else {
                            res.writeHead(200, {
                                'Content-Type': 'text/html'
                            });
                            res.write(data1 + data2 + data3);
                            res.end();
                        }
                    });
                }
            });
        }
    });
}}


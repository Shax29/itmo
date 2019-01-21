
/* Задание 1 */
/* const http = require('http');
const fs = require('fs');
const lang = process.argv[2];

// для версии b -  const lang = process.argv[LANG];

const server = http.createServer(function(req, res){
    if(lang === 'ru'){
        fs.readFile('ru.html', 'utf8', (err, data)=>{
            if (err) {
                console.log('Error file ru.html');
                res.statusCode = 500;
                res.end();
                return;
            }

            res.writeHead(200, {
                'Content-Type':'text/html'
            });
            res.write(data);
            res.end();
        });
    } else {
        fs.readFile('en.html', 'utf8', (err, data)=>{
            if (err) {
                console.log('Error file ru.html');
                res.statusCode = 500;
                res.end();
                return;
            }

            res.writeHead(200, {
                'Content-Type':'text/html'
            });
            res.write(data);
            res.end();
        });
    }
});

server.listen(8080);
*/


/* Задание 2 */

/* const http = require('http');
const cp = require('child_process');
const child = cp.fork('./child.js');


http.createServer((request, response)=>{
    child.send({ //методу send передается объект, который будет передан дочернему процессу
        method: request.method, //свойство хранит http метод присланного запроса
        params: request.url //свойство хранит url присланного запроса
    });

    response.statusCode = 200;
    response.end();
}).listen(8080, ()=>{
    console.log('Server run in 8080 port!');
}); */

/* Задание 3 */

const http = require('http');
const cp = require('child_process');
const url = require('url');

const child = cp.fork('./child.js');

let childReady = false; // false – дочерний процесс не готов к использованию

function childSaidReady(status){
    if (status === 'ready') { childReady = true;
        child.off('message', childSaidReady); //Удаляет ранее прикреплённого слушателя console.log('Server ready');
    } }
child.on('message', childSaidReady);


http.createServer((request, response)=>{
//код обработки http запроса
    let _get = url.parse(request.url, true).query;
    console.log('Parametrs of request: ' + JSON.stringify(_get));
    if(!(_get.num1 && _get.num2)){
        console.log('Bad Request');
        response.statusCode = 400;
        response.end();
        return;
    }
    if (!childReady){
        console.log('Service Unavailable');
        response.statusCode = 503;
        response.end();
        return;
    }
    let expression = `${_get.num1}+${_get.num2}=`;

    function responseFromChild(data){
        if (data.expression === expression){
            response.writeHead(200, {'Content-Type':'text/html'});
            response.write(`<h1>${data.result}</h1>`);
            response.end();
            child.off('message', responseFromChild);
        }
    }
    child.on('message', responseFromChild);

    child.send({
        expression
    });


}).listen(8080, ()=>{
    console.log('Server run in 8080 port!');
});


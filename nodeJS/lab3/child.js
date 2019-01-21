
/* 2 Задание */
/*const fs = require('fs');
const settings = require('./config.json');

process.on('message', (obj) => { // obj – переменная содержащая объект отправленный родителем
    let logData = `Date ${(new Date()).toString()}` +
        ` Request method ${obj.method}` +
        ` Request params ${obj.params}\n`;

    fs.writeFile(settings.logFile, logData, {
        encoding:'utf8',
        flag:'a'
    }, (err)=>{
        if(err){
            console.log('Child: Can`t save log');
        } else {
            console.log('Child: Log save');
        }
    });

}); */

/* 3 Задание */
const brain = require('brain.js/dist/index').default;
const mathProblems = require('./mathData.json');

const LSTM = brain.recurrent.LSTM;
const net = new LSTM();
console.log('Neural network training has begun');
net.train(mathProblems, { log: true, errorThresh: 0.03 });
console.log('Neural network ready');

process.on('message', (obj) => { // obj – переменная содержащая объект отправленный родителем
    const input = obj.expression; /* Свойство expression содержит строку, которую будем передавать на вход в нейронную сеть */
    const output = net.run(input); /* метод run позволяет передать на вход в нейронную сеть строку и получить результат работы нейронной сети */
    console.log('Child: ' + input + output);
    obj.result = input + output;
    process.send(obj); /*методу send передается объект, который будет передан родительскому
процессу */
});
process.send('ready');
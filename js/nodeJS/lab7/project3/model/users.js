let crypto = require('crypto'); //подключаем нативный NodeJS модуль для шифрования /*Переменная users хранит в себе массив пользователей с тестовым наполнением. Каждый пользователь представляется объектов с тремя свойствами: id – уникальный идентификатор пользователя, login – логин для входа пользователя, password – пароль для входа пользователя */
let users = [{
id:1,
    login:'ivan', password:crypto
    .createHash('sha512') .update('salt' + 'root') .digest('hex')
}];


/*
Экспортируем из модуля функцию findUser – позволяющую искать пользователя в массиве users по переданному в функцию логину пользователя (в переменной login), и возвращать найденный результат в качестве второго аргумента переданной callback функции.
*/
exports.findUser = function(login, callback) {
    for (let i = 0; i < users.length; i++){
        if (login === users[i].login)
         return callback(null, users[i]); return callback(null, null);
    }
};
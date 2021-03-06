let express = require('express');
let crypto = require('crypto'); //подключаем нативный NodeJS модуль для шифрования
let route = express.Router();
//Подключаем модуль для работы с хранилищем пользователей
let db = require('../model/users.js');
/* Объект используется для хранения в виде полей cookies пользователей, которые прошли авторизовались и имеют доступ к панели администратора */
let authCookies = {};
/*Данный обработчик будет запускаться всякий раз когда пользователь будет делать запрос начинающийся с /admin. Обработчик проверяет, если пользователь запрашивает панель администратора, то он его пропускает, иначе проверяет доступ, и если его нет перенаправляет пользователя на путь /admin. */


route.use((req, res, next)=>{
//Проверяем запрашивает ли пользователь панель администратора '/admin'
    if(req.originalUrl === '/admin'){
        next(); //Передаём управление следующим обработчикам
    } else {
    /*Пользователь не запрашивает панель администратора, поэтому проверяем есть ли cookies разрешающая доступ к этой части сайта*/
    let sid = req.cookies.sid; //sid – название cookies отвечающей за доступ на нашем сайте
        if (sid && authCookies[sid]){ //проверяем наличие cookies и наличие разрешения
            next(); //разрешение есть, пропускаем запрос дальше
        } else {
    res.redirect('/admin'); /*в случае не знакомого пользователя перенаправляем клиента на страницу /admin */
        }
    }
});

route.get('/', (req, res, next)=>{
    let sid = req.cookies.sid;
    if (sid && authCookies[sid]){ //проверяем наличие cookies и наличие разрешения
        /*Разрешение есть. Функция рендер наполняет шаблон (файл admin_panel.mustache) данными указанными вторым аргументом*/
        res.render('admin_panel', {});
    } else {
        /*функция рендер наполняет шаблон (файл auth.mustache) данными указанными вторым аргументом*/
        res.render('auth', {});
    }
});

/*Роут организующий прием данных со странички аутентификации. Полный путь: /admin/. Внутри осуществляется проверка логина и пароля. Если проверка пройдена, в ответном запросе устанавливаем специальную cookies и перенаправляем на страницу /admin. Если проверка не пройдена возвращаем страницу аутентификации с сообщением об ошибке */
route.post('/', (req, res, next)=>{ //Проверяем наличие логина
    if (!req.body.login){
//Не указан логин
        /*функция рендер наполняет шаблон (файл auth.mustache) данными указанными вторым аргументом (вернется сообщение об ошибке)*/
        res.render('auth', {message:true});
        return;
    }
    /*Запрашиваем в хранилище пользователей конкретного пользователя по присланному логину, в функцию обратного вызова вернёться ошибка или объект описывающий пользователя (переменная user) */
    db.findUser(req.body.login, (err, user)=>{
//Проверяем наличие в хранилище пользователя
        if (!user)
//Нет такого пользователя
        /*функция рендер наполняет шаблон (файл auth.mustache) данными указанными вторым аргументом (вернется сообщение об ошибке)*/
            return res.render('auth', {message:true});
//Шифруем присланный пароль
            let passwordFromClient = crypto
            .createHash('sha512') .update('salt' + req.body.pass) .digest('hex');
//Сравниваем шифрованный присланный пароль с хранящемся на сервере
                if (user.password !== passwordFromClient)
//Неверный пароль
        /*функция рендер наполняет шаблон (файл auth.mustache) данными указанными вторым аргументом (вернется сообщение об ошибке)*/ return res.render('auth', {message:true});
//Авторизация пройдена ставим cookie. Она формируется через алгоритм md5.
                let token = crypto
                .createHash('md5') .update(user.login) .update(user.password) .digest('hex');

                authCookies[token] = true; /*сохраняем себе пометку, что с этим cookie есть разрешение на доступ к этой части сайта */
                res.cookie('sid', token, {path: '/admin', httpOnly: true}); //выставляем cookie в ответ
                res.redirect('/admin'); //перенаправляем клиента на: /admin
    });
});

/*Роут организующий прием запрос о выходе текущего пользователя из системы. Полный путь: /admin/out. Внутри осуществляется удаление ранее установленной cookie и удаление пометки, разрешающей пользователям с этой cookie иметь доступ к этой части сайта*/
route.post('/out', (req, res, next)=>{
    let sid = req.cookies.sid;
    res.clearCookie('sid', {path: '/admin', httpOnly: true});
    delete authCookies[sid];
    res.redirect('/admin'); //перенаправляем клиента на: /admin
});
/*Роут организующий отдачу секретной информации. Полный путь: /admin/secret */
route.get('/secret', (req, res, next)=>{
//Отдаём секретную информацию
    res.send('Секретная информация');
});
module.exports = route; //Экспортируем роутер из модуля

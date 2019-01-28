const express = require('express');
const passport = require('passport'); //Подключаем модуль passport
const route = express.Router();
/* Подключаем промежуточный обработчик, который проверяет авторизован ли пользователь, если авторизован передает управление в другой обработчик, если нет то перенаправляем на путь /admin */
const authenticationMiddleware = require('../authentication/middleware.js');
/*Роут организующий отдачу странички аутентификации (если незнакомый пользователь) или непосредственно панель администратора. Полный путь: /admin/ */
route.get('/', (req, res, next)=>{
    /* Проверяем авторизован пользователь или нет, функция isAuthenticated появляется благодаря модулю passport */
    if(req.isAuthenticated()){
        /*Разрешение есть. Функция рендер наполняет шаблон (файл admin_panel.mustache) данными указанными вторым аргументом*/
        res.render('admin_panel', {});
    } else {
        /*функция рендер наполняет шаблон (файл auth.mustache) данными указанными вторым аргументом*/
        res.render('auth', {});
    }
});

/*Роут организующий прием данных со странички аутентификации. Полный путь: /admin/. Внутри осуществляется проверка логина и пароля c помощью passport. Если проверка пройдена, в функцию
обратного вызова придёт объект пользователя (user) и перенаправляем на страницу /admin. Если проверка не пройдена возвращаем страницу аутентификации с сообщением об ошибке */

route.post('/', (req, res, next)=> {
    passport.authenticate('local', (err, user, info)=> {
        if (err) { return next(err);} //если ошибка вызываем обработчик ошибок
        /* если пользователь не найдено, отдаем страницу аутентификации с сообщением об ошибке */
        if (!user) { return res.render('auth', {message:true});}
//даём сигнал модулю passport, что пользователь авторизовался
        req.logIn(user, (err)=> {
            if (err) { return next(err); }
            return res.redirect('/admin'); //перенаправляем на /admin
        });
    })(req, res, next);
});

/*Роут организующий прием запрос о выходе текущего пользователя из системы.
 Полный путь: /admin/out. Внутри осуществляется посыл сигналу модулю passport, что пользователь выходит из системы и перенаправление пользователя на /admin */
route.post('/out', (req, res, next)=>{
    req.logout();
    res.redirect('/admin');
});

/*Роут организующий отдачу секретной информации. Вторым аргументов передается промежуточный обработчик, который проверяет авторизован ли пользователь или нет. Полный путь: /admin/secret */
route.get('/secret', authenticationMiddleware(), (req, res, next)=>{
//Секретная информация
    res.send('Секретная информация');
});
module.exports = route;
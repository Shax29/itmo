let express = require('express');
let route = express.Router();
//Подключаем модуль для работы с хранилищем виджетов
let db = require('../model/model_widgets.js');
//Роут организующий отдачу странички со всеми виджетами. Полный путь: /widgets/
route.get('/', (req, res, next)=>{
//запрашиваем у хранилища все виджеты
    db.findAll((err, data)=>{
        if(err)
            return res.send('Error all widget!');
/*функция рендер наполняет шаблон (файл all.mustache) данными указанными вторым аргументом */
        res.render('all', {

            title:"All Widgets", //Используемый на странице заглавная надпись route_url:"/widgets", //Основная часть пути URL используется в href arrData:data //Непосредственно массив с виджетами
            route_url:"/widgets",
            arrData:data
        });
    });
});

//Роут организующий отдачу странички для добавления нового виджета. Полный путь: /widgets/add
route.get('/add', (req, res, next)=>{
/*функция рендер наполняет шаблон (файл add.mustache) данными указанными вторым аргументом */
    res.render('add', {
        title:"New Widget", //Используемый на странице заглавная надпись
        route_url:"/widgets" //Основная часть пути URL используется в href
    });
});

/*Роут организующий приём данных от клиента для сохранения нового виджета. Полный путь: /widgets/add */
route.post('/add', (req, res, next)=>{
//передаём присланные в теле POST запроса информацию о новом виджете в хранилище
  db.add(req.body, (err, data)=>{
    if(err)
        return res.send('Error add widget!');

    res.redirect('/widgets/'); /*В случае успешного добавления виджета перенаправляем
клиента на страницу со всеми виджетами, а именно на путь: /widgets/ */
  });
});



/*Роут организующий отдачу страницу для удаления конкретного виджета. Идентификатор виджета задаётся в пути. Полный путь: /delete/:id Например, страница удаления виджета с id=1 путь будет: /delete/1 */
route.get('/delete/:id', (req, res, next)=>{
    /*Просим хранилище виджетов вернуть объект, описывающий виджет с конретным id который прислан в последней части пути */
    db.find(parseInt(req.params.id), (err, data)=>{
        if (err || !data)
            return res.send('Error delete widget!');
        /* функция рендер наполняет шаблон (файл delete.mustache) данными указанными вторым аргументом */
        res.render('delete', {
            title:"Delete widget",
            route_url:"/widgets",
            data:data
        });
    });
});

/*Роут организующий получение подтверждения на удадение и удаление конкретного виджета. Идентификатор виджета задаётся в пути. Полный путь: /delete/:id */
route.post('/delete/:id', (req, res, next)=>{
    /*просим хранилище удалить конкретный виджет с id, который прислан в последней части пути */
    db.delete(parseInt(req.params.id), (err, data)=>{
        if (err || !data)
            return res.send('Error delete widget!');
        res.redirect('/widgets/'); /*В случае успешного удаления виджета перенаправляем
клиента на страницу со всеми виджетами, а именно на путь: /widgets/ */
    });
});
module.exports = route; //Экспортируем роутер из модуля


/*Роут организующий отдачу страницу для редактирования конкретного виджета. Идентификатор виджета задаётся в пути. Полный путь: /edit/:id Например, страница отредоктирована виджета с id=1 путь будет: /edit/1 */
route.get('/edit/:id', (req, res, next)=>{
    /*Просим хранилище виджетов вернуть объект, описывающий виджет с конретным id который прислан в последней части пути */
    db.find(parseInt(req.params.id), (err, data)=>{
        if (err || !data)
            return res.send('Error edit widget!');
        /* функция рендер наполняет шаблон (файл edit.mustache) данными указанными вторым аргументом */
        res.render('edit', {
            title:"Edit widget",
            route_url:"/widgets",
            data:data
        });
    });
});
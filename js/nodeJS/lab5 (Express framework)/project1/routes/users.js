let express = require('express'); //подключаем модуль express
let router = express.Router(); //создаем новый роутер
router.post('/:name/:email/:pwd', (req, res, next)=>{ //вешаем на роут обработчик зщые запросов //Выводим параметры из маршрута
    console.log(`Параметры url: name ${req.params.name}` +
        ` email ${req.params.email}` +
        ` pwd ${req.params.pwd}`);
    res.send('Ok!'); //Отправляем клиенту, строчку 'Ok!'
});
module.exports = router; //Экспортируем роутер из модуля
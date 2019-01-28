function authenticationMiddleware () {
    return function (req, res, next) {
//Проверяем авторизован пользователь или нет
        if (req.isAuthenticated()) {
            //Если авторизован пропускаем запрос в следующий обработчик
            return next();
        }
        //пользователь не авторизован перенаправляем на страницу /admin
        res.redirect('/admin');
    }
}
//Подменяем экспортируемый объект полностью функцией
module.exports = authenticationMiddleware;
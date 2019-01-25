/*let express = require('express'); //подключаем модуль express
let app = express(); //создаем приложение express
let route = require('./routes/products.js'); //подключаем файл с роутом
app.use('/products', route); /*регистрируем роут, все url начинающиеся с /products будут передаваться в обработку в этот роут*/

/*app.use(bodyParser.urlencoded({ extended: false }));
app.set('views', __dirname + '/views');
app.engine('mustache', mustacheExpress());
app.set('view engine', 'mustache');

app.use(express.static('public'));

app.post('/reg', (req, res, next)=>{
    res.render('index', {
        name: `${JSON.stringify(req.body.name).slice(1,JSON.stringify(req.body.name).length-1)}`,
        pwd: `${JSON.stringify(req.body.pwd).slice(1,JSON.stringify(req.body.pwd).length-1)}`,
        email: `${JSON.stringify(req.body.email).slice(1,JSON.stringify(req.body.email).length-1)}`
    });
});
app.listen(3000); //Настраиваем express приложение слушать запросы на 3000 порту
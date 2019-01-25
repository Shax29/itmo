let express = require('express');
let mustacheExpress = require('mustache-express');
let app = express();
// Регистрируем '.mustache' расширение как шаблоны Mustache Express
app.set('views', __dirname + '/views'); //указываем расположение папки с шаблонами
app.engine('mustache', mustacheExpress()); //регистрируем шаблонизатор Mustache в Express
app.set('view engine', 'mustache'); //указываем использовать Mustache в качестве шаблонизатора

app.use(bodyParser.urlencoded({ extended: false }));
app.use(express.static('public'));ß

app.post('/reg', (req, res, next)=> {
    console.log('POST: ' + JSON.stringify(req.body));
    /*render – наполняем данными шаблон и отправляет полученный таким образом файл вёрстки клиенту: index – это файл шаблона index.mustache; { title: 'First experence with mustache!' } – объект из которого берутся данные в шаблон*/
    res.render('/index', { title: 'Registration complete!' });
});

/*app.route('/reg').post((req, res) => {
    console.log('POST: ' + JSON.stringify(req.body));
    res.render('/index', { title: 'Registration complete!' });
});*/
app.listen(3000); //Настраиваем express приложение слушать запросы на 3000 порту
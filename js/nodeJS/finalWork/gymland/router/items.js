let express = require('express');
let route = express.Router();

let model = require('../../model.js');

route.get('/', (req, res, next)=>{
    model.read((err, data)=>{
        if(err) return res.sendStatus(500);
        res.send(data);
    });
});

module.exports = route;
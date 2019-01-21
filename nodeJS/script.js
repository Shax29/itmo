/* ;!function () {

    function clone(obj) {
        let obj2 = Object.assign([], obj);
        return obj2;
    }

    window.superMegaLib = {
        cloneFirstLevel: clone
    };
} ();*/


/* ;window.superMegaLib = function() {

       let obj2 = Object.assign([], obj);
       return obj2;
    }

    window.superMegaLib = {
        cloneFirstLevel: clone
    };
} (); */


/* Разработать библиотеку включающую методы:
- метод remove(array, index) – возвращает
массив array без удаленного элемента;
- метод repeat(str, count) – возвращает
строку str повторенную count раз;
- метод pluck(array, property_name) –
получает массив объектов array и возвращает массив значений определенного поля property_name. */



;!function () {

    function remove(array, index) {
        array.splice(index, 1);
        return array;
    }
    function repeat (str, count) {
        let resultStr = "";
        for (let i = 0; i < count; i++) {
            resultStr = resultStr + str;
        }
        return resultStr;
    }
    function pluck(array, property_name) {
        let arr = [];
        for(let i = 0; i < array.length; i++) {
            arr.push(array[i][property_name]);
        }
        return arr;

    }

    window.removeLib = {
        remove: remove,
        repeat: repeat,
        pluck: pluck,
    };
    /*window.methodLib = {
        remove: function () {

            var array = [];
            var index;
        },

        repeat: function () {
            str;
        },
        pluck: function () {

        }

    } */

}();
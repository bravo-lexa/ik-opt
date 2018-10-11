
var CORE = {
    // Переменные
    appWight: null, // Ширина окна сайта

    // * * * * * * * * * * *
    init: function () {
        // Обнавляем переменные
        this.update();
        // Загружаем классы
        this._loadPlugin(jsForm);
        this._loadPlugin(jsBasketAdd);
    },
    update: function() {
        this.appWight = $(window).width() + 15;

        $(window).resize(function () {
            CORE.appWight = $(window).width() + 15;
        });
    },

    // * * * * * * * * * * *
    // Меняем
    json_to_array: function (data) {
        data = $.parseJSON(data);
        data = $.makeArray(data);
        data = data[0];
        return data;
    },

    // Получаем
    get_size: function ($size) {
        if(!this.is_number($size)) {
            if($size === 'xl') return '1200';
            if($size === 'lg') return '992';
            if($size === 'md') return '768';
            if($size === 'sm') return '576';
            if($size === 'xs') return '360';
        }else{
            return $size;
        }
    },

    // Замена
    put: function ($element,$to) {
        $element.detach();
        $to.append($element);
    },

    // Проверки
    is_number: function (n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    },
    is_json: function(json){
        try {
            JSON.parse(json);
        } catch (e) {
            return false;
        }
        return true;
    },
    is_array: function(array){
        if( $.isArray(array) ){
            return true
        }else {
            return false
        }
    },
    is_empty: function(array){
       if(array.length < 1){
           return true
       }else {
           return false
       }
    },

    // Формы
    formData: function ($this){
        var formData = new FormData();

        // * Переберам все data переменные
        // * Для отправки
        // $.each($this.data(), function(key, value) {
        //     formData.append(key, value);
        // });

        // * Присоединяем все файлы
        if($this.find('[type=file]').is('input')){ // Если нашки хоть один
            $.each($('[type=file]'), function(key, file) {
                formData.append($(file).attr('name'), $(file)[0].files[0]);
            });
        }

        // * Перебираем все поля
        $this.find('input, textarea, select').each(function() {
            formData.append(this.name, $(this).val());

            if($($this).is('[type=file]')) {
                formData.append(this.name, $(this).attr('value'));
            }
            if($(this).is('[type=checkbox]')){
                formData.append(this.name, $(this).is(':checked'));
            }
        });

        return formData;
    },
    get_form_data: function($this){
        var formData = new FormData();
            formData.append('form', null);


        // * Переберам все data переменные
        // * Для отправки
        $.each($this.data(), function(key, value) {
            formData.append(key, value);
        });

        // * Перебираем все поля
        $this.find('input, textarea, select').each(function() {
            formData.form.append(this.name, $(this).val());

            if($($this).is('[type=file]')) {
                formData.form.append(this.name, $(this).attr('value'));
            }
            if($(this).is('[type=checkbox]')){
                formData.form.append(this.name, $(this).is(':checked'));
            }
        });
        // * Присоединяем все файлы
        if($this.find('[type=file]').is('input')){ // Если нашки хоть один
            $.each($('[type=file]'), function(key, file) {
                formData.form.append($(file).attr('name'), $(file)[0].files[0]);
            });
        }

        return formData;
    },
    formValid: function ($this , data) {
        // Удаляем все
        $this.find('[name]')
            .removeClass('is-error')
            .siblings('.form-input-error')
            .remove();

        if(!CORE.is_empty(data['data'])){
            $.each(data['data'], function(key, value) {
                var $input = $this.find('[name='+key+']');

                $input.addClass('is-error');

                if($input.siblings('.form-input-error').length === 0){
                    $input.after('<div class="form-input-error">'+value+'</div>');
                }else{
                    $input.siblings('.form-input-error').html(value);
                }
            });
        }

        // Удалить все, если все удачно
        if(data['result'] === 'success'){
            $this.find('[name]').val('');
        }
    },

    text_to_up_all: function($value){
        return $value.split(/\s+/).map(word => word[0].toUpperCase() + word.substring(1)).join(' ');
    },
    // Плагины
    _loadPlugin( $class ){
        // Считываем все переменные
        $class._constructor();
        // Добавяем класс в работу
        var arElements = $('[data-js-' + $class.code + ']');

        if(arElements.length >= 1) {
            // Пребираем элементы
            arElements.each(function () {
                var $this   = $(this),
                    fn      = $class; // Функиции для выполнения

                // Получаем добавочные поля
                $class.data = {};
                $class._data($this);
                // Соединяем дата данные - DATA
                var $data = $.merge($class.data, $this.data());

                // Сохраняем дата
                $this.data($data);

                // Удаляем ненудные элементы
                // И добляем поле this
                var name_code = 'js'+CORE.text_to_up_all($class.code.replace(/-/g, ' ')).replace(/\s/g, '');
                       $this.data('this', $this.data(name_code));
                delete $this.removeData(name_code);
                delete $this.removeData(['length']);


                // Запускаем функицию
                $class._init(fn , $this);

                // Выводим все данные по плагину
                // console.log('%c Плагин: ' + name + ' загружен ' , 'background: #222; color: #bada55');
                // console.log($this);
                // console.log($this.data());
                // console.log('- - - - - - - - - - - - ');
            });
        }else{
            console.log('Плагин: ' + $class + ' пустой');
        }
    },
},
    jsForm = {
        /*
            * Настройки и код обращения
        */
        _constructor: function () {
            this.code   = 'form-valid'; // data код
            this.option = {
                'wight': '50',
                'height': '20',
            };
        },
        /*
            * Добавочные свойство data
            * Чтобы все работало нужно дотавить все в массив this.data.(Ваша переменная)
        */
        _data: function ($this) {
            this.data.ajax   = $this.data('js-form-valid');
            this.data.button = $this.find('button[data-btn]');
        },
        // Запуск функии от элемента
        _init: function (fn, $this) {

            // * При нажатии ничего не происходит, только отравка
            $this.data('button').on('click', function (e) {
                e.preventDefault();
                fn.click(fn, $this);
            });
        },

        // *
        // Добавочные функии
        // *
        click: function (fn, $this) {
            this.ajax(fn, $this);
        },
        // Отправка данных
        ajax: function (fn, $this) {
            // * Создаем экземпляр, тут будем хранить всю информацию для отправки
            var this_class = this,
                formData = CORE.formData($this);

            $.ajax({
                url: '/local/ajax/' + $this.data('ajax') + '.php',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    // Если нет ошибки и пришел json
                    if (CORE.is_json(data)) {
                        //  Переводим json в массив
                        data = CORE.json_to_array(data);

                        CORE.formValid($this, data);
                        console.log($this);
                        console.log(data);

                        if (data['result'] === 'success') {
                            this_class.returnSuccess($this, data);
                        } else {
                            this_class.returnError($this, data);
                        }
                    } else {
                        $this.html(data);
                    }
                }
            });
        },

        // Положительный ответ
        returnSuccess: function ($this, data) {
            // $this.submit();

            $.fancybox.open($('#feedback-success'));
        },
        // Отрицательный ответ
        returnError: function ($this, data) {

        }
    };
    jsBasketAdd = {
    /*
        * Настройки и код обращения
    */
    _constructor: function () {
        this.code   = 'basket-add'; // data код
        this.option = {
            'id': 'null',
            'code': 'null',
        };
    },
    /*
        * Добавочные свойство data
        * Чтобы все работало нужно дотавить все в массив this.data.(Ваша переменная)
    */
    _data: function ($this) {
        this.data.ajax    = '/catalog/basket/add';
        this.data.id      = $this.data('id');
        this.data.param   = $this.data('param');
    },

    // Запуск функии от элемента
    _init: function (fn, $this) {
        // * При нажатии ничего не происходит, только отравка
        $this.on('click', function (e) {
            e.preventDefault();
            fn.click(fn, $this);
        });
    },
    // *
    // Добавочные функии
    // *
    click: function (fn, $this)     {
        this.ajax(fn, $this);
    },
    // Отправка данных
    ajax: function (fn, $this) {
        // * Создаем экземпляр, тут будем хранить всю информацию для отправки
        var this_class = this;

        $.ajax({
            url: '/local/ajax/' + $this.data('ajax') + '.php',
            type: 'post',
            data: CORE.get_form_data($this),
            processData: false,
            contentType: false,
            success: function (data) {
                // Если нет ошибки и пришел json
                if (CORE.is_json(data)) {
                    //  Переводим json в массив
                    data = CORE.json_to_array(data);

                    CORE.formValid($this, data);
                    // LOG
                    console.log($this);
                    console.log(data);
                    // END

                    if (data['result'] === 'success') {
                        this_class.returnSuccess($this, data);
                    } else {
                        this_class.returnError($this, data);
                    }
                } else {
                    $this.html(data);
                }
            }
        });
    },

    // Положительный ответ
    returnSuccess: function ($this, data) {
        BX.onCustomEvent('OnBasketChange');
        $.fancybox.open($('#feedback-success'));
    },
    // Отрицательный ответ
    returnError: function ($this, data) {

    }
};

// * * * * * * Запуск
$(function () {
    CORE.init();

    $("[data-popup]").fancybox({
        baseClass: "is-open",
    });

    $('.index__top-img .slider').owlCarousel({
        items:1,
        lazyLoad:true,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
    });

    $('.index__partners__list').owlCarousel({
        items: 6,
        lazyLoad:true,
        loop:true,
        margin: 0,
        dots: false,
        nav: true,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:3
            },
            992:{
                items:5
            },
            1000:{
                items:5
            }
        }
    });
});


// var jsBtnHidden = {
//     // * Елементы
//     $arElements : [],
//
//     init: function () {
//         this.load();
//     },
//     load: function () {
//         // * Загружаем все переменные
//         this.$arElements = $('[data-js-btn-hidden]');
//
//         this.$arElements.each(function () {
//             // * Данные с формы
//             var $this   = $(this),
//                 $class  = $this.data('js-btn-hidden'),
//                 $text_1   = $this.text(),
//                 $text_2   = $this.data('text');
//
//             // * Записываем все в DATA
//             $this.data({
//                 class:         $class,
//                 text_1:        $text_1,
//                 text_2:        $text_2
//             });
//         });
//         // Обновляем
//         this.update();
//     },
//     update: function () {
//         this.$arElements.each(function () {
//             var $this = $(this);
//             // * Кнопка отправки
//             // * console.log($this.find('button[name=formButton]'));
//             $this.on('click', function(e){
//                 e.preventDefault();
//
//                 // * При нажатии ничего не происходит, только отравка
//                 jsBtnHidden.click($this);
//             });
//         });
//     },
//     // Нажатие на кнопку
//     click: function ($this) {
//         var $element = $('.'+$this.data('class'));
//
//         if($element.hasClass('is-hidden')){
//             if($this.find('span')){
//                 $this.find('span').text($this.data('text_2'));
//             }else{
//                 $this.text($this.data('text_2'));
//             }
//
//
//             $this.addClass('is-on');
//             $element.removeClass('is-hidden');
//             //$element.children().removeClass('is-hidden');
//         }else{
//             if($this.find('span')){
//                 $this.find('span').text($this.data('text_1'));
//             }else{
//                 $this.text($this.data('text_1'));
//             }
//
//
//             $this.removeClass('is-on');
//             $element.addClass('is-hidden');
//            // $element.children().addClass('is-hidden');
//         }
//     }
// };
// var jsResize = {
//     // * Переменные
//     $arElements : [],
//     dataCode    : 'data-js-resize', // Код обращения
//
//     // ...
//     init: function () {
//         this.$arElements = jsCore.arElements(this.dataCode);
//         this.$arElements.each(function () {
//             // * Данные элементов
//             var $this = $(this),
//                 $name = $this.data('js-resize'),
//                 $size = $this.data('width');
//
//             $this.data({
//                 status: false,
//                 name:   $name,
//                 size:   $size,
//                 before: $('[data-js-resize=' + $name + ']'),
//                 after:  $('[data-js-resize-after=' + $name + ']'),
//             });
//         });
//         this.resize();
//         $(window).resize(this.resize);
//     },
//     resize: function() {
//         jsResize.$arElements.each(function () {
//             var $this = $(this);
//
//             // * Получаем размер
//             $this.data().size = jsCore.get_size($this.data('size'));
//
//             if(jsCore.appWight < $this.data('size') && $this.data('status') === false){
//                 // * log
//                 console.log('Перенос блока : ' + $this.data('name') + ' < ' + $this.data('size'));
//                 // * ...
//
//                 $this.wrap('<div data-js-resize-before="' + $this.data().name + '"></div>');
//                 $this.data().before = $('[data-js-resize-before=' + $this.data().name + ']');
//                 $this.data().before.css('display','none');
//                 jsCore.put(
//                     $this,
//                     $this.data().after
//                 );
//
//                 $this.data().status = true;
//             } else if(jsCore.appWight >= $this.data('size') && $this.data('status') === true){
//                 // * log
//                 console.log('Возврат блока : ' + $this.data('name') + ' > ' + $this.data('size'));
//                 // * ...
//
//                 jsCore.put(
//                     $this.data().after.find('[data-js-resize=' + $this.data().name + ']'),
//                     $this.data().before
//                 );
//                 $this.unwrap();
//
//                 $this.data().status = false;
//             }
//         });
//     }
// };
// var jsMobBtb = {
//     // * Переменные
//     $body :    null,
//     $menu :    null,
//     $buttonX : null,
//
//     init: function () {
//         this.$body =    $('body.app');
//         this.$menu =    $('.mob-menu');
//         this.$button  = $('.mob-btn');
//
//         $(this.$button).on('click', this.button_click);
//     },
//     button_click: function (e){
//         e.preventDefault();
//         console.log('1');
//         jsMobBtb.$body.toggleClass('js-mob-menu-open');
//         jsMobBtb.$button.toggleClass('active');
//     },
//     exit: function () {
//         jsMobBtb.$body.removeClass('js-mob-menu-open');
//         jsMobBtb.$button.removeClass('active');
//     },
//     open: function () {
//         jsMobBtb.$body.addClass('js-mob-menu-open');
//         jsMobBtb.$button.addClass('active');
//     }
// };
// var jsBtnCount = {
//     // * Переменные
//     $arElements : [],
//     dataCode    : 'data-js-btn-count', // Код обращения
//
//     // ...
//     init: function () {
//         this.$arElements = jsCore.arElements(this.dataCode);
//         this.$arElements.each(function () {
//             // * Данные элементов
//             var $this = $(this),
//                 $input      = $this.find('input'),
//                 $input_up   = $this.find('button[data-btn="up"]'),
//                 $input_down = $this.find('button[data-btn="down"]'),
//                 $max = $input.attr('max'),
//                 $min = $input.attr('min');
//
//             $this.data({
//                 input : $input,
//                 input_up : $input_up,
//                 input_down : $input_down,
//                 max : $max,
//                 min : $min,
//             });
//
//             $input_up.on('click', function(e){
//                 e.preventDefault();
//                 // * При нажатии ничего не происходит, только отравка
//                 jsBtnCount.click($this, +1);
//             });
//             $input_down.on('click', function(e){
//                 e.preventDefault();
//                 // * При нажатии ничего не происходит, только отравка
//                 jsBtnCount.click($this, -1);
//             });
//         });
//
//     },
//     click: function ($this, number) {
//         $input     = $this.data('input');
//         $input_val = $input.val();
//
//         if($input_val === '') {
//             $input_val = 0;
//         }
//         $input_val = parseInt($input_val);
//
//         if($input_val + number <= $this.data('max') && $input_val + number >= $this.data('min')) {
//             $input.val($input_val + number);
//         }
//     },
// };
// var jsFormValid = {
//     $arElements : [],                   // Массив элементов
//     $dataCode   : 'data-js-form-valid', // Код обращения
//
//     init: function () {
//         this.$arElements = jsCore.arElements(this.$dataCode);
//         this.$arElements.each(function () {
//             // * Данные с формы
//             var $this   = $(this),
//                 $ajax   = $this.data('js-form-valid'),
//                 $button = $this.find('button[data-btn]');
//
//             console.log($this);
//             // * Записываем все в DATA
//             $this.data({
//                 ajax:       $ajax,
//                 button:     $button
//             });
//         });
//
//         // Обновляем
//         this.update();
//     },
//     update: function () {
//         this.$arElements.each(function () {
//             var $this = $(this);
//             // * Кнопка отправки
//             $this.data('button').on('click', function(e){
//                 e.preventDefault();
//
//                 // * При нажатии ничего не происходит, только отравка
//                 jsFormValid.click($this);
//             });
//         });
//     },
//     // * Нажатие на кнопку
//     click: function ($this) {
//         this.ajax($this);
//     },
//     // * Получаем значение
//     ajax: function ($this) {
//         // * Создаем экземпляр, тут будем хранить всю информацию для отправки
//         var formData = jsCore.formData($this);
//
//         $.ajax({
//             url: '/local/ajax/'+$this.data('ajax')+'.php',
//             type: 'post',
//             data: formData,
//             processData: false,
//             contentType: false,
//             success: function(data) {
//                 // Если нет ошибки и пришел json
//                 if(jsCore.is_json(data)){
//                     //  Переводим json в массив
//                     data = jsCore.json_to_array(data);
//
//                     jsCore.formValid($this, data);
//                     console.log(data);
//
//                     if(data['result'] === 'success'){
//                         parent.returnSuccess($this, data);
//                     }else {
//                         parent.returnError($this, data);
//                     }
//                 }else{
//                     $this.html(data);
//                 }
//             }
//         });
//     },
//     returnSuccess: function ($this, data) {
//         // $this.submit();
//     },
//     returnError: function ($this, data ) {
//
//     }
// };

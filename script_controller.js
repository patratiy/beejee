$.when($.ready).then(function() {
    $('[data-action="login"]').on('click', function() {
        window.location = '/auth';
    });

    $('[data-toggle="tooltip"]').tooltip()

    $('[data-action="authorize"]').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            url: '//' + location.hostname + '/controller.php',
            data: {'login' : $('[name="name"]').val(), 'password' : $('[name="pass"]').val()},
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == 'ok') {
                    window.location = '/main';
                } else {
                    $('[data-action="massage"]').html(data.status);
                    $('[data-action="massage"]').show();
                }
            }
        })
    });

    $('[data-action="return"]').on('click', function(e) {
        e.preventDefault();
        window.location = '/main';
    });

    $('[data-action="logout"]').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            url: '//' + location.hostname + '/controller.php',
            data: {'logout' : $(this).data('user')},
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                window.location.reload();
            }
        });
    });

    $('[data-action="addtask"]').on('click', function(e) {
        e.preventDefault();
        window.location = '/addtask';
    });

    $('[data-action="add"]').on('click', function(e) {
        e.preventDefault();
        let data = {'add' : 'true', 'name' : $('[name="name"]').val(), 'email' : $('[name="email"]').val(), 'description' : $('[name="description"]').val()};
        $.ajax({
            url: '//' + location.hostname + '/controller.php',
            data: data,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == 'ok') {
                    $('[data-action="massage"]').html('Data successefully added');
                    $('[data-action="massage"]').removeClass('alert-danger');
                    $('[data-action="massage"]').addClass('alert-success');
                    $('[data-action="massage"]').show();

                    let redirect = function() { 
                        window.location = '/main'; 
                    };

                    $('[data-action="add"]').css({'pointer-events' : 'none', 'opacity' : '0.5'});

                    setTimeout(redirect, 1500);
                } else {
                    $('[data-action="massage"]').html(data.status);
                    $('[data-action="massage"]').show();
                }
            }
        });
    });

    $('[data-action="do_edit"]').on('click', function(e) {
        e.preventDefault();

        let data = {'edit' : 'true', 'name' : $('[name="name"]').val(), 'email' : $('[name="email"]').val(), 'description' : $('[name="description"]').val(), 'id' : $('[name="id"]').val()};
        data['fulfilled'] = $('[name="fulfilled"]').prop('checked') ? 'true' : 'false';
        
        $.ajax({
            url: '//' + location.hostname + '/controller.php',
            data: data,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status == 'ok') {
                    window.location = '/main';
                } else {
                    $('[data-action="massage"]').html(data.status);
                    $('[data-action="massage"]').show();
                    if ( data.status == 'You didn\'t have rights for edit' ) {
                        setTimeout(function() { window.location = '/auth'; }, 1500);
                    }
                }
            }
        });
    });

    $('[data-action="edit"]').on('click', function(e) {
        e.preventDefault();
        window.location = '/edittask/' + $(this).parents('.row').data('id');
    });

    $('.pagination > button').on('click', function() {
        if ($(this).data('action') != 'next' && $(this).data('action') != 'prev') {
            window.location = '/page/' + $(this).html().trim() + window.location.search;
        } else {
            let page = parseInt(window.location.pathname.split('/')[2]);
            if ($(this).data('action') == 'next')
                page++;
            if ($(this).data('action') == 'prev')
                page--;

            window.location = '/page/' + page + window.location.search;
        }
    });

    $('.sort').on('click', function() {
        let sort_field = $(this).text().trim().toLowerCase();
        switch($(this).hasClass('sort-asc')) {
            case true:
                $(this).removeClass('sort-asc');
                $(this).addClass('sort-desc');
                window.location = window.location.pathname + '?sort=desc&field=' + sort_field;
                break;
            case false:
                $(this).removeClass('sort-desc');
                $(this).addClass('sort-asc');
                window.location = window.location.pathname + '?sort=asc&field=' + sort_field;;
                break;
            default:
                $(this).addClass('sort-asc');
                window.location = window.location.pathname + '?sort=asc&field=' + sort_field;;
                break;
        }
    });
});
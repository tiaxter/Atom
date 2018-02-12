$(document).ready(function () {
    alertify.genericDialog || alertify.dialog('genericDialog', function () {
        return {
            main: function (content) {
                this.setContent(content);
            },
            setup: function () {
                return {
                    focus: {
                        element: function () {
                            return this.elements.body.querySelector(this.get('selector'));
                        },
                        select: true
                    },
                    options: {
                        basic: true,
                        maximizable: false,
                        resizable: false,
                        padding: false
                    }
                };
            },
            settings: {
                selector: undefined
            }
        };
    });
    $('.edit-row').on('click', function () {
        var id = $(this).data('id');
        $.ajax({
            url: '../static/edit-account.php',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                $('#edit-account').html(data);
            }
        });
        alertify.genericDialog($('#edit-account')[0]);
    });
    $(document).on('click', '#edit-btn', function () {
        var error = 0;
        $(".form-control:not(input[name='password'])").each(function () {
            if ($(this).val() == '') {
                error++;
            }
        });
        if (error > 0) {
            alertify.alert('Atom', 'Completa tutti i campi');
        } else {
            $.ajax({
                url: '../php/changesetting.php',
                type: 'POST',
                data: {
                    id_n: $("input[name='ID']").val(),
                    username: $("input[name='username']").val(),
                    password: $("input[name='password']").val(),
                    nome: $("input[name='nome']").val(),
                    cognome: $("input[name='cognome']").val(),
                    email: $("input[name='email']").val(),
                    ruolo: $("select[name='ruolo']").val()
                },
                success: function (data) {
                    alertify.closeAll();
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.alert('Atom', 'Modifiche effettuate');
                }
            });
        };
    });
});
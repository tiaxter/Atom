$(document).ready(function () {
    $('.loginbtn').click(function () {
        $('#Signup-div').hide();
        $('#Login-div').slideToggle();
    });
    $('.signupbtn').click(function () {
        $('#Login-div').hide();
        $('#Signup-div').slideToggle();
    });
    $('#login-btn').click(function () {
        var error = 0;
        $('form#log-in input').each(function () {
            if ($(this).val() == ''){
                error++;
            }
        });
        if (error > 0) {
            alertify.alert('Atom','Completa tutti i campi');
        }else{
            $.ajax({
                url: '/php/login.php',
                type: 'POST',
                data:{username : $("input[name='username']").val(), password : $("input[name='password']").val()},
                success: function (data) {
                    if (data == 'Login NON Eseguito'){
                        alertify.alert('Atom','Credenziali non corrette');
                    }else{
                        location.reload();
                    }
                }
            });
        }
    });
    $('#signup-btn').click(function () {
        var error = 0;
        $('form#sign-up input').each(function () {
            if ($(this).val() == ''){
                error++;
            }
        });
        if (error > 0) {
            alertify.alert('Atom','Completa tutti i campi');
        }else{
            $.ajax({
                url:'/php/signup.php',
                type:'POST',
                data:{username:$("form#sign-up input[name='username']").val(), password:$("form#sign-up input[name='password']").val(), nome:$("form#sign-up input[name='nome']").val(), cognome:$("form#sign-up input[name='cognome']").val(), email:$("form#sign-up input[name='email']").val()},
                success: function (data) {
                    if (data == "Registrazione Effettuata"){
                        alertify.alert('Atom', "Registrazione Eseguita, Esegui l'accesso");
                    }
                }
            });
        }
    });
    $("form#sign-up input[name='username']").on('keyup', function () {
        var username_chosen = $("form#sign-up input[name='username']").val();
        $.ajax({
            url:'/php/choose_username.php',
            type:'POST',
            data:{username : username_chosen},
            success: function (data) {
                if (data === "Username non disponibile"){
                    alertify.dismissAll();
                    alertify.set('notifier','position', 'top-center');
                    alertify.error('Username non disponibile');
                }else if(data === "Spazio Vuoto"){
                    alertify.dismissAll();
                    alertify.set('notifier','position', 'top-center');
                    alertify.warning('Inserisci lo username');
                }else if(data === 'Username disponibile'){
                    alertify.dismissAll();
                    alertify.set('notifier','position', 'top-center');
                    alertify.success('Username disponibile');
                }
            }
        });
    });
    $("form#sign-up input[name='email']").on('keyup', function () {
        var email_chosen = $("form#sign-up input[name='email']").val();
        $.ajax({
            url:'/php/choose_username.php',
            type:'POST',
            data:{email : email_chosen},
            success: function (data) {
                if (data === "Usata"){
                    alertify.dismissAll();
                    alertify.set('notifier','position', 'top-center');
                    alertify.error('Un utente è già stato registrato con la seguente Email');
                }
            }
        });
    });
});
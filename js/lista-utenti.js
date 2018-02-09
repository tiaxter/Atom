$(document).ready(function () {
    alertify.genericDialog || alertify.dialog('genericDialog',function(){
        return {
            main:function(content){
                this.setContent(content);
            },
            setup:function(){
                return {
                    focus:{
                        element:function(){
                            return this.elements.body.querySelector(this.get('selector'));
                        },
                        select:true
                    },
                    options:{
                        basic:true,
                        maximizable:false,
                        resizable:false,
                        padding:false
                    }
                };
            },
            settings:{
                selector:undefined
            }
        };
    });
    $('.edit-row').on('click', function () {
        $('#loginForm').css({'display':'block'});
        alertify.genericDialog($('#loginForm')[0]);
        $("#loginForm input[name='ID']").attr('value',$(this).data('id'));
    })
});
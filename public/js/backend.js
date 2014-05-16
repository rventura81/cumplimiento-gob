/**
 * Created by nsilva on 13-05-14.
 */

$(document).ready(function(){

    $(".ajaxForm :submit").attr("disabled",false);
    $(document).on("submit",".ajaxForm",function(){
        var form=this;
        if(!form.submitting){
            form.submitting=true;
            $(form).find(":submit").attr("disabled",true);
            //$(form).append("<div class='ajaxLoader'>Cargando</div>");
            //var ajaxLoader=$(form).find(".ajaxLoader");
            //$(ajaxLoader).css({
            //    left: ($(form).width()/2 - $(ajaxLoader).width()/2)+"px",
            //    top: ($(form).height()/2 - $(ajaxLoader).height()/2)+"px"
            //});
            $.ajax({
                url: form.action,
                data: $(form).serialize(),
                type: form.method,
                dataType: "json",
                success: function(response){
                    console.log(response);
                        if(response.redirect){
                            window.location=response.redirect;
                        }else{
                            var f=window[$(form).data("onsuccess")];
                            f(form);
                        }

                },
                error: function(response){
                    console.log(response.responseJSON);
                    form.submitting=false;
                    //$(ajaxLoader).remove();
                    $(form).find(":submit").attr("disabled",false);

                    var html="";
                    for(var i in response.responseJSON.errors)
                        html+="<div class='alert alert-danger'>"+response.responseJSON.errors[i]+"</div>";

                    $(form).find(".validacion").html(html);
                    $('html, body').animate({
                        scrollTop: $(".validacion").offset().top-10
                    });
                }
            });
        }
        return false;
    });

    var formUsuario = $('.form-usuario');
    if(formUsuario.length){
        formUsuario.find('.btn-cambiar-password').on('click', toggleCambioPassword);
    }

    $('.form-control-select2').select2();
});

function toggleCambioPassword(e){
    var btn = $(this),
        disabled = btn.data('disabled'),
        contPassword = $('.cont-password'),
        contCambiarPassword = $('.cont-cambiar-password');

    disabled = !disabled;

    contCambiarPassword.css('display', disabled ? 'none' : 'block');
    contCambiarPassword.find('#password').attr('disabled', disabled);
    contCambiarPassword.find('#password_confirmation').attr('disabled', disabled);
    contPassword.css('display', disabled ? 'block' : 'none');
}
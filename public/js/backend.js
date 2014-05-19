/**
 * Created by nsilva on 13-05-14.
 */

$(document).ready(function(){

    $('.form-control-select2').select2();

    initAjaxForm();

    initFormUsuario();

    initFormMediosDeVerificacion();

});

function initAjaxForm(){
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
}

function initFormUsuario(){
    var formUsuario = $('.form-usuario');
    if(formUsuario.length){
        formUsuario.find('.btn-cambiar-password').on('click', function (e){
            var btn = $(this),
                disabled = btn.data('disabled'),
                contPassword = $('.cont-password'),
                contCambiarPassword = $('.cont-cambiar-password');

            disabled = !disabled;

            contCambiarPassword.css('display', disabled ? 'none' : 'block');
            contCambiarPassword.find('#password').attr('disabled', disabled);
            contCambiarPassword.find('#password_confirmation').attr('disabled', disabled);
            contPassword.css('display', disabled ? 'block' : 'none');
        });
    }
}

function initFormMediosDeVerificacion(){
    var $formMedios= $('.form-medios');
    $formMedios.find('.form-medios-table tbody tr').length?$formMedios.find('.form-medios-table').show():$formMedios.find('.form-medios-table').hide();
    $formMedios.data('maxid',$formMedios.find('.form-medios-table tbody tr').length);
    $formMedios.find('.form-medios-agregar button').on('click',function(){
        var descripcion=$formMedios.find('.medio-descripcion').val();
        var tipo=$formMedios.find('.medio-tipo').val();
        var url=$formMedios.find('.medio-url').val();

        if(!descripcion || !tipo || !url){
            alert('Faltan campos por ingresar.');
            return;
        }

        var maxid=$formMedios.data('maxid');
        var row='<tr>' +
            '<td>'+descripcion+'</td>' +
            '<td>'+tipo+'</td>' +
            '<td>'+url+'</td>' +
            '<td>' +
            '<input type="hidden" name="medios-de-verificacion['+maxid+'][descripcion]" value="'+descripcion+'"/>' +
            '<input type="hidden" name="medios-de-verificacion['+maxid+'][tipo]" value="'+tipo+'"/>' +
            '<input type="hidden" name="medios-de-verificacion['+maxid+'][url]" value="'+url+'"/>' +
            '<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>' +
            '</td>' +
            '</tr>';
        $formMedios.find('.form-medios-table').append(row);
        $formMedios.data('maxid',++maxid);
        $formMedios.find('.form-medios-table tbody tr').length?$formMedios.find('.form-medios-table').show():$formMedios.find('.form-medios-table').hide();
    });
    $formMedios.find('.form-medios-table').on('click','button',function(){
        $(this).closest('tr').remove();
        $formMedios.find('.form-medios-table tbody tr').length?$formMedios.find('.form-medios-table').show():$formMedios.find('.form-medios-table').hide();
    });
}
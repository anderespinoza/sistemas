<?php
Yii::app()->clientScript->registerScript('refresh', "
    $('#fileupload-form').submit(function() {
    $('#adjunto-grid').yiiGridView('update');
    });
");
?>

<script language="javascript">


    function ValidarTipo() {
        jQuery(
                $('#Btn-star').click(function() {
            $(".mensaje").css("display", "none");
            
            if ($('#TipoIdentificacion').val() == '') {
                bootbox.alert('Debe seleccionar un tipo de Documento');
                return false;
            } else {
                setTimeout(function() {
                    $('#adjunto-grid').yiiGridView('update');
                }, 5000);
                //setTimeout( $('#adjunto-grid').yiiGridView('update'),1500000,true);                       

            }
            var importe_total = 0;
            $(".CantidadFoto").each(
                    function(index, value) {
                        importe_total = importe_total + 1;
                    }
            );
            if (importe_total > 0) {
                bootbox.alert('Solo se puede agregar una Firma');
                return false;
            }

        })
                )
    }
</script>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">

    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
    <td class="preview"><span class="fade"></span></td>
    <td class="name">Tipo de Documento
    <select name="TipoIdentificacion" id="TipoIdentificacion">

    <option value ='1712'>Firma Digital</option>
    </select>
    <span>{%=file.name%}</span></td>
    <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
    {% if (file.error) { %}
    <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
    {% } else if (o.files.valid && !i) { %}
    <td>
    <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
    </td>
    <td id ="Btn-star" class="start">{% if (!o.options.autoUpload) { %}
    <button class="btn btn-primary2" onclick=ValidarTipo();>
    <i class="icon-upload icon-white2"></i>
    <span>Iniciar</span>
    </button> 
    {% } %}</td>
    {% } else { %}
    <td colspan="2"></td>
    {% } %}
    <td class="cancel">{% if (!i) { %}
    <button class="btn btn-warning2">
    <i class="icon-ban-circle icon-white2"></i>
    <span>Cancelar</span>
    </button>
    {% } %}</td>
    </tr>
    {% } %}
</script>


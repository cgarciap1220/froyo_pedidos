(function ($) {
    "use strict";
    $(document).ready(function () {
        $("#categoria").change(function ()
        {
           var dir = url;
            var dptoId = $(this).val();
            $.ajax({
                url: dir + "/Subcategoria_controller/obtener_subcategoria_categoria/" + dptoId,
                //url: "obtener_municipio_dpto/" + dptoId,
                type: "POST",
                success: function (data) {
                    $("#subcategoria").html("");
                    $("#subcategoria").html(data);
                }
            });
        });
    });
    
    
})(jQuery);


(function ($) {
    "use strict";
    $(document).ready(function () {
        $("#categoria").change(function ()
        {
           var dir = url;
            var catId = $(this).val();
            $.ajax({
                url: dir + "Subcategoria_controller/obtener_subcategoria_categoria/" + catId,
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


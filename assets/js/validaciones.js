function confirmCaracteristicas()
{
    var dir = url;
    var agree = confirm("Desea agregarle mas presentaciones a este producto");
    if (agree)
    {
       /*$.ajax({
            url: dir + "/caracteristicas_controller/agregar_producto_caracteristicas/"+agree,
            //url: "obtener_municipio_dpto/" + dptoId,
            type: "POST"

        });*/
        //return true;
        var codigo_producto = document.getElementById("codigo_producto").value;
        var obj = {
            codigo_producto: codigo_producto,
            
        };
        sessionStorage.setItem('caratprod', JSON.stringify(obj));
    } 
    else
    {
       /* var no = 'hola';
        alert(no);*/
        $.ajax({
            url: dir + "/caracteristicas_controller/agregar_producto_caracteristicas/"+agree,
            //url: "obtener_municipio_dpto/" + dptoId,
            type: "POST"

        });
    }
}

function loadCaracteristicas() {
    var caratprod = JSON.parse(sessionStorage.caratprod);
    if (caratprod != null) {
        document.getElementById("codigo_producto").value = caratprod.codigo_producto;
        sessionStorage.setItem('caratprod', null);
    }
}


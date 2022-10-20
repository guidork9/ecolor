    $('#documento').keyup(function(e){
     if(e.keyCode == 13)
     {
       $('#buscar').click();
     }
   });
    $('#buscar').click(function(){
        dni=$('#documento').val();
        $.ajax({
           url:'../Controlador/consultaDNI.php',
           type:'post',
           data: 'dni='+dni,
           dataType:'json',
           success:function(r){
            if(r.numeroDocumento==dni){
                $('#apellidoPaterno').val(r.apellidoPaterno);
                $('#apellidoMaterno').val(r.apellidoMaterno);
                $('#nombre').val(r.nombres);
                $("#nom_completo").val(r.apellidoPaterno+" "+r.apellidoMaterno+", "+r.nombres);
            }else{
                alert(r.error);
            }
            console.log(r)
           }
        });
    });
$( document ).ready(function() {


  // process the form
    $('#form').submit(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'nombre'              : $('input[name=nombre]').val(),
            'correo'             : $('input[name=correo]').val(),
            'Asunto'    : $('input[name=telefono]').val(),

        };
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'send.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'html', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {
            	if (data.indexOf("exito") >= 0) {
            	swal("Mensaje enviado exitosamente", "Nos comunicaremos muy pronto contigo.","success");
               
	           setTimeout(redirigir, 3000)
            	}else {
            		swal("Error", "Ocurrio un error vuelve a intentarlo", "error")
            	}
                // log data to the console so we can see
                console.log("data"); 
                 return data;
                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
    function redirigir () {
         window.location.assign('./gracias.html');
    }
});
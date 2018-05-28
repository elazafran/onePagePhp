<?php
    ob_start();
    echo "asdfas"; 
    echo 'hola mundo';
    if (!file_exists('chao.txt')) header('Location: http://www.google.com/');
    
    //ob_end_clean();

   
    $contenido = ob_get_contents();
    include('cabecera.php');
    echo $contenido;
    include('footer.php');
   
?>

<div class="container containerLogin">
        
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Registrate</h2>
                    <hr>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="nickname">Nombre or Nickname</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user" aria-hidden="true"></i></div>
                            <input type="text" name="nickname" class="form-control" id="nickname"
                                   placeholder="elazafran" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback-email">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"></i> Example error message
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">E-Mail Address</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="you@example.com" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback-email">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"></i> Example error message
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback-password">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button  class="btn btn-success" id="registro"><i class="fa fa-sign-in"></i> Registrate</button>
                    <button class="btn btn-link" id="login" ><i class="fa fa-sign-in"></i>Entrar</button>
                </div>
            </div>
           
        
    </div>
    <div class="container">
        <div class="row" class="btnInsertar ">
                <div class="col-md-6"><div class="saludo pt-2 pb-4"></div>     </div>
                <div class="col-md-6">
                   
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="nombre">nombre</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-address-card"></i></div>
                            <input type="text" name="nombre" class="form-control" id="nombre"
                                   placeholder="Nombre" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="mensaje">mensaje</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-comments mt-2"></i></div>
                            <input type="text" name="mensaje" class="form-control" id="mensaje"
                                   placeholder="mensaje" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="pt-2 pb-4 text-right">
                        <button  type="button" class="btn btn-outline-success" id="insertar"><i class="fa fa-sign-in"></i> insertar</button>
                    </div>
                </div>
                <div class="col-12">
                    <table id="usuarioTable" class="table table-hover table-bordered table-striped mt-3">
                    <thead>
                        <tr class="info">
                            <th><strong>Nombre</strong></th>
                            <!-- <th>Correo</th> -->
                            <th><strong>Mensaje</strong></th>
                            <th colspan="2"><strong>Acciones</strong></th>
                        </tr>
                    </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 ">
                <h5 class="text-underline"><ins>Chats de usuarios en la BBDD</ins></h5>
                <div id="chatsEnBBDD"></div>
            </div>
        </div>
    </div>
    
    

    <script>
        
        
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyCHG9ERhArWsRxniRteeXE2WIw-n6twRK4",
            authDomain: "fluted-sentry-141618.firebaseapp.com",
            databaseURL: "https://fluted-sentry-141618.firebaseio.com",
            projectId: "fluted-sentry-141618",
            storageBucket: "fluted-sentry-141618.appspot.com",
            messagingSenderId: "707587662647"
        };
        firebase.initializeApp(config);


        var password;
        var email;
        var error = $('.form-control-feedback-email').hide();
        
        $( "#registro" ).on( "click", function() {
            password=$('#password').val();
            email=$('#email').val();
            console.log("registramos a =>" +password+" ---" +email );
            
            createUser(email,password);
        });


        
        
        
        
        function createUser(email,password){
            
            firebase.auth().createUserWithEmailAndPassword(email, password).then(function(user) {
                // [END createwithemail]
                // callSomeFunction(); Optional
                // var user = firebase.auth().currentUser;
                console.log("todo va bien");
                $('.containerLogin').hide("fast");
                
                
                       
            }, function(error) {
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;
                // [START_EXCLUDE]
                if (errorCode == 'auth/weak-password') {
                    alert('The password is too weak.');
                } else {
                    console.error(error);
                }
                // [END_EXCLUDE]
            })
         
        }

        function login(){
            password=$('#password').val();
            email=$('#email').val();
            firebase.auth().signInWithEmailAndPassword(email, password).then(function(user) {
                console.log("todo va bien");
                console.log("login a =>" +password+" ---" +email );
                $('.containerLogin').hide("fast");
                $('.btnInsertar').show("fast");
                
                
                       
            }, function(error) {
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;
                // [START_EXCLUDE]
              
                    console.error(error);
            }
                // [END_EXCLUDE]
        )};

         $( "#login" ).on( "click", function() {
            
            login();
            crearRegistro();
            

        });
        
        function logout(){
            
            closeNav();
            firebase.auth().signOut().then(function() {
                // Sign-out successful.
                $('.containerLogin').show('fast');
                $('.saludo').html('No hay usuario</b>');
                
            
            }).catch(function(error) {
                // An error happened.
                console.log(error);
            
            });    
        };

        var getUser = function () {
            firebase.auth().onAuthStateChanged(function (user) {
                if (user) {
                    console.log(user);
                  
                  $('.saludo').html('Tu usuario es:<b> ' + user.email + '</b>');
                    $('.containerLogin').hide();

                    
                } else {
                    $('.containerLogin').show();
                    
                }
            });
        }

        getUser();

        var crearRegistro = function (){
            console.log('hola caracola');
            // Get a reference to the database service
            var database = firebase.database();
            var nickname = $('#nickname').val();
            var userId="123";
            var name="ihor";
            var email="asd@asd.com";
            console.log(nickname);
            firebase.database().ref(nickname).push({
                email: email,
                nombre: nickname
                
                });
            

        }
      
        $('#insertar').on('click',function(){
            console.log("insertamos");
            var nombre=$('#nombre').val();
            var mensaje=$('#mensaje').val();
            firebase.database().ref("usuario").push({
                name: nombre,
                message: mensaje
                
                });
        });

    var db = firebase.database().ref('usuario/');
	// cuando escuche algo realizara una funciona anomina y recibe como un objeto snapshot
	// snapshot , es como el bloque de la informacion uqe ya trajo, y cuando esta escruchando "on" algún cambio
	// aunque sea en lo más profundo de la bbdd

	db.on('value', function (snapshot) {
        console.log("snapshot");
        console.log(snapshot);
		//metodo val firebase parsea la información para poder trabajar con ella
		var usuarios = snapshot.val();
		$("#usuarioTable tbody").empty();

		var row = "";

		for (usuario in usuarios) {
			row += '<tr id="' + usuario + '">' +
				'<td class="nombre">' + usuarios[usuario].name + '</td>' +
				'<td class="email">' + usuarios[usuario].message + '</td>' +
				// '<td class="position">' + usuarios[usuario].surname + '</td>' +
				'<td class="text-center"> <div class="btnEdit btn btn-warning fa fa-edit" class="text-center"></div> </td>' +
				'<td class="text-center"> <div class="btnDelete btn btn-danger fa fa-trash" class="text-center"></div> </td>' +
				'</tr>'
		}

		$("#usuarioTable tbody").append(row);
		row = "";
		

		$(".btnDelete").click(function () {
			// nos traemos el id del usuario y procedemos a borrar
			var usuarioId = $(this).closest('tr').attr('id');

			db.child(usuarioId).remove();

			// Si dejas db.remove() son parametros se borra toda la base de datos ¡CUIDADO!
			// db.remove();
		})

		$(".btnEdit").click(function () {
			//Asign data to form fields
			var usuarioId = $(this).closest('tr').attr('id');

			$("#name").val($('#' + usuarioId).find(".name").text());
			$("#mail").val($('#' + usuarioId).find(".mail").text());
			$("#number").val($('#' + usuarioId).find(".number").text());
			$("#position").val($('#' + usuarioId).find(".position").text());

			//Update button behaviour, quitamos el btn click y cambiamos por lo uqe necesitamos
			$("#btnSend").text("Actualizar").removeClass("btn-primary").addClass("btn-warning").unbind("click").click(function () {
				db.child(usuarioId).update({
					name: $("#name").val(),
					mail: $("#mail").val(),
					number: $("#number").val(),
					position: $("#position option:selected").text()
				}, function () {
					//limpiamos el formulario
					$("#name").val("");
					$("#mail").val("");
					$("#number").val("");
					$("#position").val("");
					$("#btnSend").text("Enviar").removeClass("btn-warning").addClass("btn-primary").unbind("click").click(savePlayer);
				})
			})

		})
	}, function (errorObject) {
		console.log("The read failed: " + errorObject.code);
    })

    //sacamos los chats que tenemos en la bbdd

    var chatUl=document.getElementById("chatsEnBBDD");
       firebase.app().database().ref().on('value',(function (snapshot) {
            var html="";
            var arNom=[];
            snapshot.forEach(function(e){
              var referencia=e.key;
              html+=referencia+"<br>";
              var referenciaValor=e.val();
              chatUl.innerHTML=html;
            
            })
          }));

             var ruta
          var a;
          function abrir(ref,id2,nombre2,fecha){
            ruta="https://pwa.desarrollando-web.es/FireBoot/chatAdmin.php?referencia="+ref;
            a="window.open('"+ruta+"', 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;";
            return html="<tr><td><div id="+id2+" class='text-center'><a href='"+ruta+"'><p>"+nombre2+"</p></a></div></td><td>"+id2+"</td><td>"+fecha+"</td></tr>";
          }
        

    </script>
<?php

    //$variableSwitch = $_REQUEST['variableSwitch'];
    //echo $variableSwitch;


?>
<!DOCTYPE html>
<html lang="pt_Br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>FATEC ARARAS</title>

    <link href="arquivos/animate.min.css" rel="stylesheet">
    <link href="arquivos/owl.carousel.css" rel="stylesheet">
    <!-- <link href="../../fonts.googleapis.com/csse8fe.css?family=Lato:400,400i,700,700i,900,900i|Zilla+Slab:400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Zilla+Slab" rel="stylesheet">
    <link href="arquivos/font-awesome.min.css" rel="stylesheet">
    <link href="arquivos/bootstrap.min.css" rel="stylesheet">
    <link href="arquivos/css/style.css" rel="stylesheet">
    <link href="arquivos/style.css" rel="stylesheet">
    <link href="arquivos/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>




    <div class="preloader-area">
        <div class="rotate">
            <div class="rotating-plane"></div>
        </div>
    </div>

    <header id="home">
    </header>

    <section class="intro">
        <div class="overlay"></div>
        <div class="display-table">
            <div class="display-table-cell">
                <div class="container">





                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="intro-left">
                           <div id="my_camera"></div>

  <canvas id="viewport" width="320" height="240"></canvas>
                            </div>
                        

                        </div>
                        <div class="col-md-9 col-sm-12">
                            <div class="intro-right">
                                <h2>Bem Vindos a FATEC Araras</h2>
                                    <div id="typed-strings">
                                        <span>Venha fazer parte desse time</span>
                                        <span>Vestibular 2º Semestre</span>
                                        <span>Inscrição de 08 de Maio ...</span>
                                        <span>... à 08 de Junho</span>
                                        <span>Exame 01 de Julho</span>
                                    </div>
                                <span id="typed"></span>


                        <div class="form-group">
                            <div class="input-group">
                      <div class="col-md-9 col-sm-12" >
                     <input type="text" class="form-control ct-newsletter-seunome" name='name' id="name" placeholder="Seu Nome">
                     </div>
                      <div class="col-md-3 col-sm-12" >  
                               <input type=button class="btn btn-primary tirarfoto" value="Descobrir">
                         </div>    
                                                         

                            </div>
                        </div>


                                <div class="col-md-12 col-sm-12 " id="resultado" >
                                </div>
                           
                           
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"><br></div>
                    <div class="row">
                    <div class="col-md-12 col-sm-12">
                <div class="ct-u-displayTable">
            <div class="ct-mediaSection-inner">
                <div class="container">
                    <form class="form-inline ct-newsletter"  action="email.php" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control ct-newsletter-name" name='nome' id="nome" placeholder="Seu Nome">
                                <input type="text" class="form-control ct-newsletter-email" name='email' id="email" placeholder="Seu Email">
                                <input type="text" class="form-control ct-newsletter-celular" name='telefone' placeholder="Celular">
                                <button type="button"   id="enviar" class="btn ct-newsletter-button">Receba Novidades</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
</div>




                </div>
            </div>
        </div>
    </section>
    <!-- End Intro -->


    <!-- JAVASCRIPT ================================================== -->
    <script src="arquivos/jquery-1.12.4.min.js"></script>
    <script src="arquivos/bootstrap.min.js"></script>
    <script src="arquivos/active.js"></script>
    <script src="arquivos/jquery.easing.min.js"></script>
    <script src="arquivos/typed.min.js"></script>
    <script src="arquivos/gmap3.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoF0VZ0bzb8BpGJCwKrm3t4R5dmc-27kE"></script>
    <script src="arquivos/waypoints.min.js"></script>
    <script src="arquivos/jquery.counterup.min.js"></script>
    <script src="arquivos/wow.min.js"></script>
    <script src="arquivos/bootstrap-dropdownhover.min.js"></script>
    <script src="arquivos/owl.carousel.min.js"></script>


    <script src="webcam.min.js"></script>

<script src="face.js"></script> 

   
</body>


<script src="jarvis/build/artyom.window.js"></script>





<script>


$("#my_camera").hide();
$(".tirarfoto").hide();

  $(".resultado").hide();


    var Jarvis = new Artyom();


var config = {
    lang: "pt-PT", // GreatBritain english
    continuous: true, // Listen forever
    soundex: true,// Use the soundex algorithm to increase accuracy
    debug: true, // Show messages in the console
    listen: true, // Start to listen commands !
    name: "Jarvis" 
}
// Start the commands !
Jarvis.initialize(config);

Jarvis.sayRandom([
    "Olá",
    "Oie, tudo bom?",
    "Olha quem está aqui",
    "Preparado?"
]);

    Jarvis.say("Vamos brincar de descobrir quem é você?");
    Jarvis.say("Escreva seu nome primeiro e clique no botão descobrir para indentificar suas caracteristicas !");


  $(".tirarfoto").show();


    $("#enviar").on("click", function(){


        if($("#nome").val() == ""){
            Jarvis.say("Preencha seu nome");
            return false;
        }

        if($("#email").val() == ""){
            Jarvis.say("Preencha seu email");
            return false;
        }




    });


     Webcam.set({
                width: 258,
            height: 258,
                image_format: 'jpeg',
                jpeg_quality: 90
            });
            Webcam.attach('#my_camera');
            



        $( ".tirarfoto" ).click(function() {

        
        if($("#name").val() == ""){
            Jarvis.say("Preencha seu nome primeiro");
            return false;
        }


        
       
            var canvas = document.getElementById('viewport'),
                context = canvas.getContext('2d');

                

    /*************************************************************** */

 
    var uriBase = "https://westcentralus.api.cognitive.microsoft.com/face/v1.0/detect";

    // Request parameters.
    var params = {
      "returnFaceId": "true",
      "returnFaceLandmarks": "false",
      "returnFaceAttributes": "age,gender,smile,glasses,emotion",
    };

    // take snapshot and get image data
    Webcam.snap(function(data_uri) {
      base_image = new Image();
      base_image.src = data_uri;
      base_image.onload = function() {
        context.drawImage(base_image, 0, 0, 258, 258);
  
        let data = canvas.toDataURL('image/jpeg');
  
        fetch(data)
          .then(res => res.blob())
          .then(blobData => {
            $.post({
             
                url: uriBase + "?" + $.param(params),
              contentType: "application/octet-stream; charset=ISO-8859-1",
                headers: {
                  'Ocp-Apim-Subscription-Key': 'ea041bd96b1a4aa3a34b05ed8c962f02'
                },
                processData: false,
                data: blobData
              })
              .done(function(data) {


              
               resultado = '';
                $.each(data, function (index, objeto) {

                  switch (objeto.faceAttributes.gender) {
                    case 'male':
                       var tipo  = 'Homem';
                       var tipo_nome = 'cara';
                      break;
                    case 'female':
                      var tipo  = 'Mulher';
                      var tipo_nome = 'mina';
                      break;
                                      default:
                    var tipo    = 'Não Binario';
                      break;
                  }


                  var obj = objeto.faceAttributes.emotion;
                  var maior = -Infinity;
                  var chave;
                  for (var prop in obj) {
            
                    
                    if (obj.hasOwnProperty(prop)) {
                      if (obj[prop] > maior) {
                        maior = obj[prop];
                        chave = prop;
                      }
                    }
                  }
                 
                  
                  
                  switch (chave) {
                    case 'anger':
                      var imagem = tipo_nome+"1.png";
                      var emocao = 'Porque você esta com raiva?';
                      break;
                
                    case 'contempt':
                      var imagem = tipo_nome + "7.png";
                      var emocao = 'Que jeitão de desprezo';
                      break;
                    case 'disgust':
                      var imagem = tipo_nome + "2.png";
                      var emocao = 'Porque você esta desgostoso?';
                      break;
                    case 'fear':
                      var imagem = tipo_nome + "4.png";
                      var emocao = 'Não precisa ter medo!';
                      break;
                    case 'happiness':
                      var imagem = tipo_nome + "5.png";
                      var emocao = 'Assim que eu gosto... ter felicidade é o que precisamos ter';
                      break;
                    
                    case 'neutral':
                      var imagem = tipo_nome + "6.png";
                      var emocao = 'Poxa se anima ai, você esta muito neutro';
                      break;
                    case 'sadness':
                      var imagem = tipo_nome + "3.png";
                      var emocao = 'Porque tanta tristeza assim?';
                      break;
                    case 'surprise':
                      var imagem = tipo_nome + "7.png";
                      var emocao = 'Está surpresa né';
                      break;
                    default:
                      var emocao = '';
                      break;
                  }


                var nome = $("#name").val();

            Jarvis.say(nome + "Achamos que você pode ser "+tipo);
            Jarvis.say("Aparentemente você tem "+ objeto.faceAttributes.age +" anos");
            Jarvis.say(emocao);
            Jarvis.say(" "+ nome + "Isso é uma brincadeira somente. Não fique bravo.");

            

            resultado += ' <ul class="list-inline">';
            resultado += '       <li>Achamos que você pode ser '+ tipo +' </li><br>';
            resultado += '       <li>Aparentemente você tem  '+  objeto.faceAttributes.age  +'  anos </li><br>';
            resultado += '       <li>'+ emocao +'</li><br>';
            resultado += '   </ul>';

 

                });

                $('#imagem').empty().html('<img src="imagem3.jpeg" max-widht="300px"  width="300px">');
                $('#resultado').empty().append(resultado);
                $("#botao").show();
                $("#results").text(JSON.stringify(data));
                 return false;

  
              })
              .fail(function(err) {
                $("#results").text(JSON.stringify(err));
                $("#botao").show();


              })
          });
      }
    });



    /**************************************************************** */
        
        
        $(".resultado").show();
      //  $("#name").hide();
      //  $(".foto").html('').html('<img class="img-responsive" src="arquivos/amigoni/amigoni.png" alt="my-photo">');

     
    });





</script>

  <link rel="stylesheet" href="estilo.css">  
</html>
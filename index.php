<!DOCTYPE html>
<html lang="en">
<head>
  <title>index </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
  <link rel="stylesheet" href="estilos/estilos.css">
  <script>

function hola(){

var resultado = window.confirm('Política de seguridad.                                                                     Nuestro software reconoce y protege el derecho que tienen todas las personas a conocer, actualizar y rectificar las informaciones que se hayan recogido sobre ellas en bases de datos o archivos que sean susceptibles de tratamiento por entidades de naturaleza pública o privada respaldado por la Ley de Protección de Datos Personales. Ley 1581 de 2012. ');
if (resultado === true) {
    window.location.href= 'login.php';
} else { 
    window.alert('Pareces indeciso');
}
}

</script>

 <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
<br>

<nav class="navbar navbar-expand-sm bg-success navbar-dark fixed-top">
  <div class="container-fluid">
    <ul class="navbar-nav">
    </li>
      <li class="nav-item">
        <a class="nav-link active" href="#inicio">Inicio</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link active" href="#mision">Misión</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#vision">Visión</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#contactanos">Contáctanos</a>
   
    </ul>
  </div>
</nav>
<!--Fin nav-->




<div class="p-5  text-center  " id="inicio">

  <img src="images/logo.jpg" alt="No pudimos cargar la imagen">
 <!-- <button type="button" class="btn btn-outline-dark" >Ingresar</button> -->
  <a onclick=" return hola()"><button type="button" class="btn btn-success" style="float: right;" >Ingresar</button></a>

 
</div>




<!--Inicio carrusel-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/cafe2.jpg" class="d-block w-100" height="300px" width="100%" style="object-fit: cover;" alt="ITEM 1">
       
      </div>
      <div class="carousel-item h-300">
        <img src="images/cafe2.jpg" class="d-block w-200" height="300px" width="100%" style="object-fit: cover;" alt="ITEM 2">
     
      </div>
      <div class="carousel-item  h-300">
        <img src="images/cafe2.jpg" class="d-block w-200" height="300px" width="100%" style="object-fit: cover;" alt="ITEM 3">
        
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br><br>
<!--Fin caroiusel-->

<center><span>¿Quiénes Somos?</span></center>

<section id="mision" class="vh-100 bg-white" >
  <!-- <div class="container py-5 h-100 bg-primary" > -->
    <div class="row d-flex justify-content-center align-items-center h-100 bg-white"  >
      <!-- <div class="col col-xl-10" > -->
        <!-- <div class="card bg-dark " style="width:100%;" > -->
          <div class="row g-0 bg-white " style="width: 90%;">
            <div class="col-md-6 d-none d-md-block"  style="width: 50%;">
            <div id="parrafo">
            <h2 id="mision">Misión</h2>
            <br>
            <p  id="parrafo-mision">
              
            Es una empresa familiar dedicada a la recolección 
              y producción de café, abriendo caminos a un estándar 
              alto de calidad; contribuyendo de forma explicita  en poner valor al trabajo de todos los miembros de la finca y expandiendo conocimientos.
              
          
          
          </p>
          </div>
            </div>





            <div  class="col-md-6 col-lg-7 d-flex align-items-center"  style="width: 50%;">
              <!-- <div class="card-body p-4 p-lg-5 text-black" > -->
                
              <img src="images/img_log.jpg" id="img"
                alt="login form" class="img-fluid"  style="height: 100% ;  width: 100%; border-radius:59% 41% 48% 52% / 41% 46% 54% 59% ;" />
       
                
              </div>
            </div>
          </div>
        </div>
      </div>
 
    </div>
  </div>
  
</section>


<!--Inicio mision -->


<section id="vision" class="vh-100 bg-white" >
  <!-- <div class="container py-5 h-100 bg-primary" > -->
    <div class="row d-flex justify-content-center align-items-center h-100 bg-white "  >
      <!-- <div class="col col-xl-10" > -->
        <!-- <div class="card bg-dark " style="width:100%;" > -->
          <div class="row g-0 bg-white"  style="width: 90%;">
            <div class="col-md-6 d-none d-md-block "  style="width: 50%;">
            <img src="images/img_log.jpg" id="img"
                alt="login form" class="img-fluid"  style="height: 100% ;  width: 100%; border-radius:19% 24% 21% 14% / 17% 16% 20% 34%  ;" />
    
            </div>





            <div  class="col-md-6 col-lg-7 d-flex align-items-center "  style="width: 50%;">
              <!-- <div class="card-body p-4 p-lg-5 text-black" > -->

              <div  class=" "  id="parrafo" style="border: 20px solid white;">
            <h2  id="mision" style="
            
            font-size:45px;
    font-weight: bold; 
    font-style: italic;
    text-align: center;
    color: #057c15c7;
    font-family: Arial, Helvetica, sans-serif;">Visión</h2>
            
            <p   style="
            
    color:black;
    font-weight: bold; 
    font-family:  Arial, Helvetica, sans-serif;
    font-style: monospace;
    text-align: center;
    text-align: justify;
    font-size:30px;
  
            
            ">
              
            Lograr el reconocimiento y valor al trabajo cafetero, mostrando la realidad de 
            la producción y recolección del café de la planta a la taza. Ayudando en el crecimiento económico,
             pagando precios 
            justos para el café de manera que los caficultores puedan seguir compartiendo y preservando la diversidad y
             belleza natural de la región.
              
          
          
          </p>
          </div>












                
             
       
                
              </div>
            </div>
          </div>
        </div>
      </div>
 
    </div>
  </div>
  
</section>


<section id="contactanos" class="vh-100 bg-white" >
  <!-- <div class="container py-5 h-100 bg-primary" > -->
    <div class="row d-flex justify-content-center align-items-center h-100 bg-white"  >
      <!-- <div class="col col-xl-10" > -->
        <!-- <div class="card bg-dark " style="width:100%;" > -->
          <div class="row g-0 bg-white " style="width: 90%;">
            <div class="col-md-6 d-none d-md-block"  style="width: 50%;">
            <div class="row d-flex justify-content-center h-100 bg-white" style="text-align: center;" >
            <h2 id="mision">Contáctanos</h2>
            <br>
            

                

          <div class="col-12">
           
                </div>
                <div class="col-12" style="width:89%;">
                    <form method="POST" action="#">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" required type="text" id="nombre"
                                class="form-control" placeholder="Tu nombre">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo electrónico</label>
                            <input name="correo" required type="email" id="correo"
                                class="form-control" placeholder="Tu correo electrónico">
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea required placeholder="Escribe tu mensaje"
                                class="form-control" name="mensaje" id="mensaje"
                                cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn-success btn" type="submit">
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>

            
            </p>
            





          </div>
            </div>





            <div  class="col-md-6 col-lg-7 d-flex align-items-center"  style="width: 50%;">
              <!-- <div class="card-body p-4 p-lg-5 text-black" > -->
                
              <iframe
            width="600"
            height="450"
            style="border:0"
            loading="lazy"
            allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCcLBDfMzkQfb0Rc4gSX2LSsQrt2eRgfzU
                &q=El Silencio+Concordia+Antioquia+Colombia&maptype=satellite">
                

              
        </iframe>
       
                
              </div>
            </div>
          </div>
        </div>
      </div>
 
    </div>
  </div>
  
</section>






<div class="mt-5 p-4 bg-dark text-white text-center">
  <p>      Jesús María Martinez<br>
                      3207112711<br>
          Vereda Majagual - Concordia Antioquia</p>
</div>

</body>
</html>

<?php
include("admin/bd.php");
//Seleccionar registros de servicios
$sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia-> execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//Seleccionar registros de portafolio
$sentencia = $conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia-> execute();
$lista_portfolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//Seleccionar registros de team
$sentencia = $conexion->prepare("SELECT * FROM `tbl_equipo`");
$sentencia-> execute();
$lista_team=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <title>Maderas-Pani | Venta de Equipos de Palmas de Madera de Alta Calidad</title>
        <meta name="description" content="Descubre equipos de madera de alta calidad en Maderas-Pani. Ofrecemos una amplia variedad de tamaños perfectos para uso profesional y personal, garantizando durabilidad y rendimiento superior. ¡Encuentra el equipo ideal para tus necesidades hoy mismo!">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/logo1.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles2.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/estilosProducto.css">
        <!-- email-->
        <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

        <script type="text/javascript">
        emailjs.init('2IovDsFN41NUSebg_')
        </script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        

        
    </head>
    <body id="page-top">
        
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            
            <div class="container">
           <a class="" href="#page-top"><img class="logo-pani2" src="assets/img/logo1.png" alt="..." /></a> 
            <a class="navbar-brand" href="#page-top"><span class="logo-pani">MADERAS-PANI</span></a>
              
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Producto</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portafolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Sobre Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                    </ul>
                </div>

            </div>
 
        </nav>
              
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">¡BIENVENIDO A MADERAS PANI!</div>
                <div class="masthead-heading text-uppercase">TE INVITAMOS A CONOCERNOS</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">DIME MÁS</a> 
                
           
            </div>
              
        </header>
       
        <!-- Services-->
        
        <section class="page-section" id="services">
            <!-- bton de wssp-->
            <div class="wssp wssp-container">
              <a href="https://api.whatsapp.com/send?phone=5493718455334" class="wsspss">
                <img class="wsspp-img" src="assets/img/wssp.png" alt="Contactar por whatsapp"  width="55" height="55">
              </a>
              </div>
                <!-- bton de wssp-->
            <div class="container">
                 
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">maderas destacadas</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>

                    <div class="row text-center">
                    <?php foreach($lista_servicios as $registros){ ?>
                    <div class="col-md-4">
                    <img src="assets/img/servicios/<?php echo $registros['icono'] ?>" class="d-block w-100" alt="...">
                        <h4 class="my-3"><?php echo $registros['titulo'] ?></h4>
                        <p class="text-muted"><?php echo $registros['descripcion'] ?></p>
                    </div>
                    <?php }?>
                </div>
                
            </div> 
                   
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nuestro trabajo</h2>
                    <h3 class="section-subheading text-muted"><b>Somos una empresa líder en la zona, dedicada a la comercialización de palmas coloradas, postes de quebracho colorado, postes, medio postes y rodrigones para viñedos. Estamos en General Manuel Belgrano, interior de Formosa. Nos destacamos por ser responsables y  brindar   calidad y los mejores precios.</b></h3>
                <div class="row">
                <?php foreach($lista_portfolio as $registro){ ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1<?php echo $registro['ID'] ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/<?php echo $registro['imagen'] ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $registro['titulo'] ?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $registro['subtitulo'] ?></div>
                            </div>
                        </div>
                    </div>
                    <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1<?php echo $registro['ID'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase"><?php echo $registro['titulo']; ?></h2>
                                    <p class="item-intro text-muted"><?php echo $registro['subtitulo']; ?></p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/<?php echo $registro['imagen']; ?>" alt="..." />
                                    <p style="font-size: 14px;"><?php echo $registro['descripcion']; ?></p>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <?php }?>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nosotros</h2>
                    <h3 class="section-subheading text-muted">Líderes en <b>maderas</b> de calidad</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2008</h4>
                                <h4 class="subheading">Inicios</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">La empresa nació en los últimos meses de 2008 como un emprendimiento visionario de su fundador, Pani. Desde el principio, Pani supo que lanzar una empresa no sería tarea fácil. Con determinación y mucho esfuerzo, comenzó a vender varillas para viñedos, atendiendo la demanda local de los viticultores que necesitaban soportes de calidad para sus plantas. Los primeros meses estuvieron llenos de sacrificios, pero también de pequeñas recompensas que mantenían viva la esperanza de un futuro próspero.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>March 2011</h4>
                                <h4 class="subheading">An Agency is Born</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>December 2015</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>July 2020</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                !Sé parte
                                <br />
                                de
                                <br />
                                Nuestra historia!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nuestro Asombroso Equipo</h2>
                    <h3 class="section-subheading text-muted">Un grupo dedicado a la excelencia y colaboración.</h3>
                </div>
                <div class="row">
                    <?php foreach($lista_team as $registros){ ?>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/<?php echo $registros['imagen'] ?>" alt="..." />
                            <h4><?php echo $registros['nombrecompleto'] ?></h4>
                            <p class="text-muted"><?php echo $registros['puesto'] ?></p>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['twitter'] ?>" target="_blank" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['facebook'] ?>" target="_blank" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['linkedin'] ?>" target="_blank" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Nuestro equipo está compuesto por profesionales apasionados y dedicados a brindar soluciones innovadoras y eficaces. Trabajamos juntos para lograr metas comunes y ofrecer resultados excepcionales a nuestros clientes.</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">CONTÁCTENOS</h2>
                    <h3 class="section-subheading text-muted">Su consulta nos interesa</h3>
                </div>
                <form id="contactForm">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" name="from_name" id="from_name" type="text" placeholder="Nombre *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email_id" name="email_id" type="email" placeholder="Tu Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" name="phone" type="tel" placeholder="Tu teléfono (opcional)" data-sb-validations="required" />
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" name="message" placeholder="Tu mensaje *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button-->
                    <div class="text-center">          
                        <input class="btn btn-primary btn-xl text-uppercase " id="button" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; MADERAS-PANI <script>document.write(new Date().getFullYear());</script></div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
                                 
        </footer>
 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- contact JS-->
        <script src="https://smtpjs.com/v3/smtp.js"></script>
        <script src="js/contact.js"></script>
    </body>
</html>

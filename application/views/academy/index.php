<!DOCTYPE html>
<html lang="en">

<head>
   <title>Academy</title>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="Course Project">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/academy/'); ?>styles/bootstrap4/bootstrap.min.css">
   <link href="<?= base_url('assets/academy/'); ?>plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/academy/'); ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/academy/'); ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/academy/'); ?>plugins/OwlCarousel2-2.2.1/animate.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/academy/'); ?>styles/main_styles.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/academy/'); ?>styles/responsive.css">
</head>

<body>
   <div class="super_container">
      <!-- Header -->
      <header class="header d-flex flex-row">
         <div class="header_content d-flex flex-row align-items-center">
            <!-- Logo -->
            <div class="logo_container">
               <div class="logo">
                  <img src="<?= base_url('assets/academy/'); ?>images/logo.png" alt="">
                  <span>Connection Academy</span>
               </div>
            </div>
            <!-- Main Navigation -->
            <nav class="main_nav_container">
               <div class="main_nav">
                  <ul class="main_nav_list">
                     <li class="main_nav_item"><a href="#">home</a></li>
                     <li class="main_nav_item"><a href="#instituicao">Instituições</a></li>
                     <li class="main_nav_item"><a href="#problemas">Problemas</a></li>
                  </ul>
               </div>
            </nav>
         </div>
         <div class="header_side d-flex flex-row justify-content-center align-items-center">
            <img src="<?= base_url('assets/academy/'); ?>images/phone-call.svg" alt="">
            <span>+55 41 98817-1275</span>
         </div>
         <!-- Hamburger -->
         <div class="hamburger_container">
            <i class="fas fa-bars trans_200"></i>
         </div>
      </header>
      <!-- Menu -->
      <div class="menu_container menu_mm">
         <!-- Menu Close Button -->
         <div class="menu_close_container">
            <div class="menu_close"></div>
         </div>
         <!-- Menu Items -->
         <div class="menu_inner menu_mm">
            <div class="menu menu_mm">
               <ul class="menu_list menu_mm">
                 <li class="menu_item menu_mm"><a href="#">home</a></li>
                 <li class="menu_item menu_mm"><a href="#instituicao">Instituições</a></li>
                 <li class="menu_item menu_mm"><a href="#problemas">Problemas</a></li>
                 <li class="menu_item menu_mm"><a href="#contato">Contato</a></li>
               </ul>
               <!-- Menu Social -->
               <div class="menu_social_container menu_mm">
                  <ul class="menu_social menu_mm">
                     <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                     <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                     <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
                     <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                     <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- Home -->
      <div class="home">
         <!-- Hero Slider -->
         <div class="hero_slider_container">
            <div class="hero_slider owl-carousel">
               <!-- Hero Slide -->
               <div class="hero_slide">
                  <div class="hero_slide_background" style="background-image:url(<?= base_url(''); ?>assets/academy/images/slider_background.jpg)"></div>
                  <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                     <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Sua Instituiçao rumo ao <span>Futuro! </span>Connection!</h1>
                     </div>
                  </div>
               </div>
               <!-- Hero Slide -->
               <div class="hero_slide">
                  <div class="hero_slide_background" style="background-image:url(<?= base_url(''); ?>assets/academy/images/slider_background.jpg)"></div>
                  <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                     <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Sua Empresa connectada com a<span> Educação</span> !</h1>
                     </div>
                  </div>
               </div>
               <!-- Hero Slide -->
               <div class="hero_slide">
                  <div class="hero_slide_background" style="background-image:url<?= base_url(''); ?>assets/academy/images/slider_background.jpg)"></div>
                  <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                     <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Seu TCC é na <span>Connection</span> Academic!</h1>
                     </div>
                  </div>
               </div>
            </div>
            <div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">voltar</span></div>
            <div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">ir</span></div>
         </div>
      </div>
      <div aria-hidden="false" role="dialog" tabindex="-1" id="login-form" class="modal leread-modal fade in">
         <div class="modal-dialog">
            <div id="login-content" class="modal-content">
               <div class="modal-header">
                  <h3><i class="fa fa-unlock-alt"></i>&nbsp;Login</h3>
                  <button aria-label="Close" data-dismiss="modal" class="close" type="button" style="cursor: pointer"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                  <form method="post" action="<?= base_url('acesso/acessoUsuario/logar'); ?>">
                     <div class="form-group">
                        <input type="text" name="email" placeholder="Digite seu email" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="password" name="senha" placeholder="Sua senha" class="form-control">
                     </div>
                     <div class="loginbox">
                        <button class="btn" type="submit" name="" value="Logar" type="button" style="cursor: pointer; background-color: #ffb606; font-weight: bold;">Entrar</button>
                        <label style="float: right; margin: 9px;"><input type="checkbox"><span style="font-size: 15px">&nbsp;Lembrar-me</span></label>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="hero_boxes">
         <div class="hero_boxes_inner">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 hero_box_col">
                     <a href="<?= base_url('academy/empresa/Login/index'); ?>">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                           <img src="<?= base_url('assets/academy/'); ?>images/earth-globe.svg" class="svg" alt="">
                           <div class="hero_box_content">
                              <h2 class="hero_box_title">Lançar Problema</h2>
                              <a href="<?= base_url('academy/empresa/Login/index'); ?>" class="hero_box_link">Indústria</a>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-lg-4 hero_box_col">
                     <a href="<?= base_url('academy/empresa/Login/academia'); ?>">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                           <img src="<?= base_url('assets/academy/'); ?>images/books.svg" class="svg" alt="">
                           <div class="hero_box_content">
                              <h2 class="hero_box_title">Lançar Soluções</h2>
                              <a href="<?= base_url('academy/empresa/Login/academia'); ?>" class="hero_box_link">Universidade</a>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-lg-4 hero_box_col">
                     <a href="#" data-target="#login-form" data-toggle="modal">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                           <img src="<?= base_url('assets/academy/'); ?>images/professor.svg" class="svg" alt="">
                           <div class="hero_box_content">
                              <h2 class="hero_box_title">Procurar Problemas</h2>
                              <a href="#" data-target="#login-form" class="hero_box_link" data-toggle="modal">Acadêmicos</a>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Popular -->
      <div class="popular page_section" id="instituicao">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="section_title text-center">
                     <h1>Problemas Solucionados com o Connection Academy</h1>
                  </div>
               </div>
            </div>
            <div class="row course_boxes">
               <!-- Popular Course Item -->
               <div class="col-lg-4 course_box">
                  <div class="card">
                     <img class="card-img-top" src="<?= base_url('assets/academy/'); ?>images/course_1.jpg" alt="https://unsplash.com/@kellybrito">
                     <div class="card-body text-center">
                        <div class="card-title"><a href="courses.html">Company Copacol LTDA</a></div>
                        <div class="card-text">Problema relacionado ao RH...</div>
                     </div>
                     <div class="price_box d-flex flex-row align-items-center">
                        <div class="course_author_image">
                           <img src="<?= base_url('assets/academy/'); ?>images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                        </div>
                        <div class="course_author_name">Rafael Nogueira, <span>Gerente de RH</span></div>
                        <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>GR</span></div>
                     </div>
                  </div>
               </div>
               <!-- Popular Course Item -->
               <div class="col-lg-4 course_box">
                  <div class="card">
                     <img class="card-img-top" src="<?= base_url('assets/academy/'); ?>images/course_2.jpg" alt="https://unsplash.com/@cikstefan">
                     <div class="card-body text-center">
                        <div class="card-title"><a href="courses.html">Brado Logísitica LTDA</a></div>
                        <div class="card-text">Problema relacionado à gestao...</div>
                     </div>
                     <div class="price_box d-flex flex-row align-items-center">
                        <div class="course_author_image">
                           <img src="<?= base_url('assets/academy/'); ?>images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                        </div>
                        <div class="course_author_name">Michele Oliveira, <span>Diretora</span></div>
                        <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>DR</span></div>
                     </div>
                  </div>
               </div>
               <!-- Popular Course Item -->
               <div class="col-lg-4 course_box">
                  <div class="card">
                     <img class="card-img-top" src="<?= base_url('assets/academy/'); ?>images/course_3.jpg" alt="https://unsplash.com/@dsmacinnes">
                     <div class="card-body text-center">
                        <div class="card-title"><a href="courses.html">Cassol S.A</a></div>
                        <div class="card-text">Problema Relacionado à Infraestrutura...</div>
                     </div>
                     <div class="price_box d-flex flex-row align-items-center">
                        <div class="course_author_image">
                           <img src="<?= base_url('assets/academy/'); ?>images/author.jpg" alt="https://unsplash.com/@mehdizadeh">
                        </div>
                        <div class="course_author_name">Michael Smith, <span>Técnica em Gestao</span></div>
                        <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>TC</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Register -->
      <div class="register" id="problemas">
         <div class="container-fluid">
            <div class="row row-eq-height">
               <div class="col-lg-6 nopadding">
                  <!-- Register -->
                  <div class="register_section d-flex flex-column align-items-center justify-content-center">
                     <div class="register_content text-center">
                        <h1 class="register_title">Aprendizado</h1>
                        <p class="register_text">Treine suas competências empreendedoras e sua capacidade criativa solucionando problemas reais de empresas.</p>
                        <div class="button button_1 register_button mx-auto trans_200"><a href="#">Registre-se Agora</a></div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 nopadding">
                  <!-- Search -->
                  <div class="search_section d-flex flex-column align-items-center justify-content-center">
                     <div class="search_background" style="background-image:url(<?= base_url(''); ?>assets/academy/images/search_background.jpg);"></div>
                     <div class="search_content text-center">
                        <h1 class="search_title">Procure seu curso</h1>
                        <form id="search_form" class="search_form" action="post">
                           <input id="search_form_name" class="input_field search_form_name" type="text" placeholder="Nome do Curso" required="required" data-error="Course name is required.">
                           <input id="search_form_category" class="input_field search_form_category" type="text" placeholder="Categoria">
                           <input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Grau">
                           <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Buscar Curso</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Services -->
      <div class="services page_section">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="section_title text-center">
                     <h1>Nossas Vantagens</h1>
                  </div>
               </div>
            </div>
            <div class="row services_row">
               <div class="col-lg-3 service_item text-left d-flex flex-column align-items-start justify-content-start">
                  <div class="icon_container d-flex flex-column justify-content-end">
                     <img src="<?= base_url('assets/academy/'); ?>images/blackboard.svg" alt="">
                  </div>
                  <h3>Encontre Problemas</h3>
                  <p>O problema da sua empresa é solucionado aqui. Encontre aqui um problema real para fazer o seu TCC.</p>
               </div>
               <div class="col-lg-3 service_item text-left d-flex flex-column align-items-start justify-content-start">
                  <div class="icon_container d-flex flex-column justify-content-end">
                     <img src="<?= base_url('assets/academy/'); ?>images/mortarboard.svg" alt="">
                  </div>
                  <h3>Encontre Criatividade</h3>
                  <p>Que tal  aproveitar a capacidade criativa dos estudantes para  solucionar o problema da sua organização?</p>
               </div>
               <div class="col-lg-3 service_item text-left d-flex flex-column align-items-start justify-content-start">
                  <div class="icon_container d-flex flex-column justify-content-end">
                     <img src="<?= base_url('assets/academy/'); ?>images/earth-globe.svg" alt="">
                  </div>
                  <h3>Soluções Colaborativas</h3>
                  <p>Encontre e crie soluções de forma colaborativa.</p>
               </div>
               <div class="col-lg-3 service_item text-left d-flex flex-column align-items-start justify-content-start">
                  <div class="icon_container d-flex flex-column justify-content-end">
                     <img src="<?= base_url('assets/academy/'); ?>images/professor.svg" alt="">
                  </div>
                  <h3>Aprendizado</h3>
                  <p>Empreendedorismo intraorganizacional, networking, inovação, inteligência competitiva.</p>
               </div>
            </div>
         </div>
      </div>
      <!-- Testimonials -->
      <div class="testimonials page_section">
         <!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
         <div class="testimonials_background_container prlx_parent">
            <div class="testimonials_background prlx" style="background-image:url(<?= base_url(''); ?>assets/academy/images/testimonials_background.jpg)"></div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="section_title text-center">
                     <h1>Encontre Problemas</h1>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-10 offset-lg-1">
                  <div class="testimonials_slider_container">
                     <!-- Testimonials Slider -->
                     <div class="owl-carousel owl-theme testimonials_slider">
                        <!-- Testimonials Item -->
                        <div class="owl-item">
                           <div class="testimonials_item text-center">
                              <div class="quote">“</div>
                              <p class="testimonials_text">O problema da sua empresa é solucionado aqui. Encontre aqui um problema real para fazer o seu TCC.</p>
                              <div class="testimonial_user">
                                 <div class="testimonial_image mx-auto">
                                    <img src="<?= base_url('assets/academy/'); ?>images/testimonials_user.jpg" alt="">
                                 </div>
                                 <div class="testimonial_name">james cooper</div>
                                 <div class="testimonial_title">Graduate Student</div>
                              </div>
                           </div>
                        </div>
                        <!-- Testimonials Item -->
                        <div class="owl-item">
                           <div class="testimonials_item text-center">
                              <div class="quote">“</div>
                              <p class="testimonials_text">O problema da sua empresa é solucionado aqui. Encontre aqui um problema real para fazer o seu TCC.</p>
                              <div class="testimonial_user">
                                 <div class="testimonial_image mx-auto">
                                    <img src="<?= base_url('assets/academy/'); ?>images/testimonials_user.jpg" alt="">
                                 </div>
                                 <div class="testimonial_name">james cooper</div>
                                 <div class="testimonial_title">Graduate Student</div>
                              </div>
                           </div>
                        </div>
                        <!-- Testimonials Item -->
                        <div class="owl-item">
                           <div class="testimonials_item text-center">
                              <div class="quote">“</div>
                              <p class="testimonials_text">O problema da sua empresa é solucionado aqui. Encontre aqui um problema real para fazer o seu TCC.</p>
                              <div class="testimonial_user">
                                 <div class="testimonial_image mx-auto">
                                    <img src="<?= base_url('assets/academy/'); ?>images/testimonials_user.jpg" alt="">
                                 </div>
                                 <div class="testimonial_name">james cooper</div>
                                 <div class="testimonial_title">Graduate Student</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Events -->
      <!--<div class="events page_section">
         <div class="container">
            <div class="row">
               <div class="col">
                  <div class="section_title text-center">
                     <h1>Upcoming Events</h1>
                  </div>
               </div>
            </div>
            <div class="event_items">
               <div class="row event_item">
                  <div class="col">
                     <div class="row d-flex flex-row align-items-end">
                        <div class="col-lg-2 order-lg-1 order-2">
                           <div class="event_date d-flex flex-column align-items-center justify-content-center">
                              <div class="event_day">07</div>
                              <div class="event_month">January</div>
                           </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-3">
                           <div class="event_content">
                              <div class="event_name"><a class="trans_200" href="#">Student Festival</a></div>
                              <div class="event_location">Grand Central Park</div>
                              <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
                           </div>
                        </div>
                        <div class="col-lg-4 order-lg-3 order-1">
                           <div class="event_image">
                              <img src="<?= base_url('assets/academy/'); ?>images/event_1.jpg" alt="https://unsplash.com/@theunsteady5">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row event_item">
                  <div class="col">
                     <div class="row d-flex flex-row align-items-end">
                        <div class="col-lg-2 order-lg-1 order-2">
                           <div class="event_date d-flex flex-column align-items-center justify-content-center">
                              <div class="event_day">07</div>
                              <div class="event_month">January</div>
                           </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-3">
                           <div class="event_content">
                              <div class="event_name"><a class="trans_200" href="#">Open day in the Univesrsity campus</a></div>
                              <div class="event_location">Grand Central Park</div>
                              <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
                           </div>
                        </div>
                        <div class="col-lg-4 order-lg-3 order-1">
                           <div class="event_image">
                              <img src="<?= base_url('assets/academy/'); ?>images/event_2.jpg" alt="https://unsplash.com/@claybanks1989">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row event_item">
                  <div class="col">
                     <div class="row d-flex flex-row align-items-end">
                        <div class="col-lg-2 order-lg-1 order-2">
                           <div class="event_date d-flex flex-column align-items-center justify-content-center">
                              <div class="event_day">07</div>
                              <div class="event_month">January</div>
                           </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-3">
                           <div class="event_content">
                              <div class="event_name"><a class="trans_200" href="#">Student Graduation Ceremony</a></div>
                              <div class="event_location">Grand Central Park</div>
                              <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor.</p>
                           </div>
                        </div>
                        <div class="col-lg-4 order-lg-3 order-1">
                           <div class="event_image">
                              <img src="<?= base_url('assets/academy/'); ?>images/event_3.jpg" alt="https://unsplash.com/@juanmramosjr">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>-->
      <!-- Footer -->
      <footer class="footer">
         <div class="container">
            <!-- Newsletter -->
            <div class="newsletter">
               <div class="row">
                  <div class="col">
                     <div class="section_title text-center">
                        <h1>Cadastre-se na newsletter</h1>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col text-center">
                     <div class="newsletter_form_container mx-auto">
                        <form action="post">
                           <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
                              <input id="newsletter_email" class="newsletter_email" type="email" placeholder="Endereço de E-mail" required="required" data-error="Valid email is required.">
                              <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Cadastrar</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Footer Content -->
            <div class="footer_content" id="contato">
               <div class="row">
                  <!-- Footer Column - About -->
                  <div class="col-lg-6 footer_col">
                     <!-- Logo -->
                     <div class="logo_container">
                        <div class="logo">
                           <img src="<?= base_url('assets/academy/'); ?>images/logo.png" alt="">
                           <span>Academy</span>
                        </div>
                     </div>
                     <p class="footer_about_text">Sua instituição rumo ao fututo! <br> Sua empresa conectada com a educação.</p>
                  </div>
                  <!-- Footer Column - Menu -->
                  <!--<div class="col-lg-3 footer_col">
                     <div class="footer_column_title">Menu</div>
                     <div class="footer_column_content">
                        <ul>
                           <li class="footer_list_item"><a href="#">Home</a></li>
                           <li class="footer_list_item"><a href="#">About Us</a></li>
                           <li class="footer_list_item"><a href="courses.html">Courses</a></li>
                           <li class="footer_list_item"><a href="news.html">News</a></li>
                           <li class="footer_list_item"><a href="contact.html">Contact</a></li>
                        </ul>
                     </div>
                  </div>-->
                  <!-- Footer Column - Usefull Links -->
                  <!--<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Usefull Links</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="#">Testimonials</a></li>
								<li class="footer_list_item"><a href="#">FAQ</a></li>
								<li class="footer_list_item"><a href="#">Community</a></li>
								<li class="footer_list_item"><a href="#">Campus Pictures</a></li>
								<li class="footer_list_item"><a href="#">Tuitions</a></li>
							</ul>
						</div>
					   </div>-->
                  <!-- Footer Column - Contact -->
                  <div class="col-lg-6 footer_col">
                     <div class="footer_column_title">Contato</div>
                     <div class="footer_column_content">
                        <ul>
                           <li class="footer_contact_item">
                              <div class="footer_contact_icon">
                                 <img src="<?= base_url('assets/academy/'); ?>images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
                              </div>
                              Curitiba - PR
                           </li>
                           <li class="footer_contact_item">
                              <div class="footer_contact_icon">
                                 <img src="<?= base_url('assets/academy/'); ?>images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
                              </div>
                              +55 41 98817-1275
                           </li>
                           <li class="footer_contact_item">
                              <div class="footer_contact_icon">
                                 <img src="<?= base_url('assets/academy/'); ?>images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
                              </div>connectionrh@connection.com.br
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Footer Copyright -->
            <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
               <div class="footer_copyright">
                  <span>
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                     </script> All rights reserved - Connection RH
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
               </div>
               <div class="footer_social ml-sm-auto">
                  <ul class="menu_social">
                     <li class="menu_social_item"><a href="https://www.linkedin.com/company/connection-rh/"><i class="fab fa-linkedin-in"></i></a></li>
                     <li class="menu_social_item"><a href="https://www.instagram.com/connectionrh/"><i class="fab fa-instagram"></i></a></li>
                     <li class="menu_social_item"><a href="https://www.facebook.com/connection.startup/"><i class="fab fa-facebook-f"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </footer>
   </div>

   <script>
     $('.nav a[href^="#"]').on('click', function(e) {
       e.preventDefault();
       var id = $(this).attr('href'),
         targetOffset = $(id).offset().top;

       $('html, body').animate({
         scrollTop: targetOffset - 100
       }, 500);
     });
   </script>
   <script src="<?= base_url('assets/academy/'); ?>js/jquery-3.2.1.min.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>styles/bootstrap4/popper.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>styles/bootstrap4/bootstrap.min.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>plugins/greensock/TweenMax.min.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>plugins/greensock/TimelineMax.min.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>plugins/scrollmagic/ScrollMagic.min.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>plugins/greensock/animation.gsap.min.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>plugins/greensock/ScrollToPlugin.min.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>plugins/scrollTo/jquery.scrollTo.min.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>plugins/easing/easing.js"></script>
   <script src="<?= base_url('assets/academy/'); ?>js/custom.js"></script>

</body>

</html>

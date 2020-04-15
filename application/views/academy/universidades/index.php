<!DOCTYPE html>
<html lang="en">
<head>
<title>Academy - Universidades</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?= base_url(''); ?>assets/academy/styles/bootstrap4/bootstrap.min.css">
<link href="<?= base_url(''); ?>assets/academy/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?= base_url(''); ?>assets/academy/styles/teachers_styles.css">
<link rel="stylesheet" type="text/css" href="<?= base_url(''); ?>assets/academy/styles/teachers_responsive.css">
<link rel="stylesheet" type="text/css" href="<?= base_url(''); ?>assets/academy/styles/elements_styles.css">
<link rel="stylesheet" type="text/css" href="<?= base_url(''); ?>assets/academy/styles/elements_responsive.css">
<link rel="stylesheet" type="text/css" href="<?= base_url(''); ?>assets/academy/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="<?= base_url(''); ?>assets/academy/styles/contact_responsive.css">
<script src="<?= base_url(''); ?>assest/academy/js/contact_custom.js"></script>
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="<?= base_url(''); ?>assets/academy/images/logo.png" alt="">
					<span>University</span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="<?= base_url('academy'); ?>">Home</a></li>
						<li class="main_nav_item"><a href="<?= base_url(''); ?>">Issue Problem</a></li>
						<li class="main_nav_item"><a href="<?= base_url(''); ?>">Create Account</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<img src="<?= base_url(''); ?>assets/academy/images/phone-call.svg" alt="">
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
					<li class="menu_item menu_mm"><a href="">Home</a></li>
					<li class="menu_item menu_mm"><a href="">Issue Problem</a></li>
					<li class="menu_item menu_mm"><a href="">Create Account</a></li>
				</ul>

				<!-- Menu Social -->

				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href=""><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href=""><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href=""><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href=""><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href=""><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Connection_RH 2019</div>
			</div>

		</div>

	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(<?= base_url(''); ?>assets/academy/images/teachers_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>Welcome !</h1>
		</div>
	</div>


	<!-- Become -->

	<div class="become">
		<div class="container">
			<div class="row row-eq-height">

				<div class="col-lg-6 order-2 order-lg-1">
					<div class="become_title">
						<h1>Submit solutions</h1>
					</div>
					<p class="become_text">Enviar uma soluçao no Connection Academy é simples e prático.
						Basta está cadastrado e fazer registros dos departamentos. Estes vao enviar os problemas para os seus
						 melhores alunos proporem soluçoes.
					</p>
							<div class="elements_accordions">
								<div class="accordion_container">
									<div class="accordion d-flex flex-row align-items-center">Entrar</div>
									<div class="accordion_panel">
										<div class="contact_form_container">
												<form action="<?= base_url('academy/empresa/login/logar'); ?>" method="post" enctype="multipart/form-data">
													<input name="email" id="contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Informe um e-mail válido.">
													<input name="senha" id="contact_form_email" class="input_field contact_form_email" type="password" placeholder="Senha *********" required="required" data-error="Campo Requerido.">
													<button id="contact_send_btn" type="submit" class="contact_send_btn trans_200" >Entrar!</button><br><br><br><br>
												</form>
											</div>
									</div>
								</div>
							</div>
							<div class="elements_accordions">
									<div class="accordion_container">
										<div class="accordion d-flex flex-row align-items-center"><?= $result ?></div>
										<div class="accordion_panel">


										<div class="contact_form_container">
											<form action="<?= base_url('academy/empresa/login/cadastro'); ?>" method="post" enctype="multipart/form-data">
											<input name="email" id="contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Informe um e-mail válido.">
											<input name="cnpj" id="contact_form_email" class="input_field contact_form_email" type="text" placeholder="CNPJ " required="required" data-error="Somente números.">

											<select name="empresa"  class="input_field contact_form_email">
												<option value="01" disabled selected>Instituiçoes</option>
												<?php foreach ($univer as $value): ?>
												<option value="<?= $value->univer; ?>">
												<?= $value->cidade; ?> - <?= $value->univer; ?>
												</option>
												<?php endforeach; ?>
											</select>
											<select name="ramo"  class="input_field contact_form_email">
													<option value="" >Ramo</option>
													<?php foreach ($area as $area_): ?>
													<option value="<?= $area_->id; ?>">
														<?= $area_->area_nome; ?>
													</option>
													<?php endforeach; ?>
											</select>
											<input name="cep" id="contact_form_email" class="input_field contact_form_email" type="text" placeholder="CEP" required="required" data-error="Campo Requerido.">
											<input name="telefone" id="contact_form_email" class="input_field contact_form_email" type="text" placeholder="Contato Telefonico" required="required" data-error="Campo Requerido.">
											<input name="senha" id="contact_form_email" class="input_field contact_form_email" type="password" placeholder="Senha *********" required="required" data-error="Campo Requerido.">
											<input id="contact_form_email" class="input_field contact_form_email" type="password" placeholder="Confirmar Senha *********" required="required" data-error="Campo Requerido.">
											<button id="contact_send_btn" type="submit" class="contact_send_btn trans_200" >Confirmar Cadastro!</button>
											</form>
										</div>

										</div>
									</div>
								</div>
					</div>

				<div class="col-lg-6 order-1 order-lg-2">
					<div class="become_image">
						<img src="<?= base_url(''); ?>assets/academy/images/become.jpg" alt="">
					</div>
				</div>

			</div>
		</div>
	</div>


	<!-- Milestones -->

	<div class="milestones">
		<div class="milestones_background" style="background-image:url(<?= base_url(''); ?>assets/academy/images/milestones_background.jpg)"></div>

		<div class="container">
			<div class="row">

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url(''); ?>assets/academy/images/milestone_1.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
						<div class="milestone_counter" data-end-value="750">124</div>
						<div class="milestone_text">Estudantes Cadastrados</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url(''); ?>assets/academy/images/milestone_2.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
						<div class="milestone_counter" data-end-value="120">77</div>
						<div class="milestone_text">Estudantes Ativos</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url(''); ?>assets/academy/images/milestone_3.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
						<div class="milestone_counter" data-end-value="39">32</div>
						<div class="milestone_text">Problemas Solucionados</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url(''); ?>assets/academy/images/milestone_4.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
						<div class="milestone_counter" data-end-value="3500" data-sign-before="+">0</div>
						<div class="milestone_text">Instituiçoes de Ensino</div>
					</div>
				</div>

			</div>
		</div>
	</div>



	<!-- Footer -->

	<footer class="footer">
		<div class="container">

			<!-- Newsletter -->


			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<img src="<?= base_url(''); ?>assets/academy/images/logo.png" alt="">
								<span>course</span>
							</div>
						</div>

						<p class="footer_about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum, tempor lacus.</p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="">Home</a></li>
								<li class="footer_list_item"><a href="">About Us</a></li>
								<li class="footer_list_item"><a href="">Courses</a></li>
								<li class="footer_list_item"><a href="">News</a></li>
								<li class="footer_list_item"><a href="">Contact</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Usefull Links</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><a href="">Testimonials</a></li>
								<li class="footer_list_item"><a href="">FAQ</a></li>
								<li class="footer_list_item"><a href="">Community</a></li>
								<li class="footer_list_item"><a href="">Campus Pictures</a></li>
								<li class="footer_list_item"><a href="">Tuitions</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contact</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="<?= base_url(''); ?>assets/academy/images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									Blvd Libertad, 34 m05200 Arévalo
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="<?= base_url(''); ?>assets/academy/images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									0034 37483 2445 322
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="<?= base_url(''); ?>assets/academy/images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
									</div>hello@company.com
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="<?= base_url(''); ?>assets/academy/https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href=""><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href=""><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href=""><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href=""><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href=""><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>

		</div>
	</footer>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {




            var $cep = $(".cep")
            var $estado = $(".estado")
            var $cidade = $(".cidade")
            var $bairro = $(".bairro")
            var $rua = $(".rua")




            //Pega os dados atraves do CEP (só funciona se o país for Brasil)

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $rua.val("");
                $bairro.val("");
                $cidade.val("");
                $estado.val("");
            }

            $('.cep:input').on('propertychange input', function(e) {

                if ($pais.val() == "Brasil") {
                    //Quando o campo cep perde o foco.
                    $cep.blur(function() {

                        //Nova variável "cep" somente com dígitos.
                        var cep = $(this).val().replace(/\D/g, '');

                        //Verifica se campo cep possui valor informado.
                        if (cep != "") {

                            //Expressão regular para validar o CEP.
                            var validacep = /^[0-9]{8}$/;

                            //Valida o formato do CEP.
                            if (validacep.test(cep)) {

                                //Preenche os campos com "..." enquanto consulta webservice.
                                $rua.val("...");
                                $bairro.val("...");
                                $cidade.val("...");
                                $estado.val("...");

                                //Consulta o webservice viacep.com.br/
                                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                                    if (!("erro" in dados)) {
                                        //Atualiza os campos com os valores da consulta.
                                        $rua.val(dados.logradouro);
                                        $bairro.val(dados.bairro);
                                        $cidade.val(dados.localidade);
                                        $estado.val(dados.uf);
                                    } //end if.
                                    else {
                                        //CEP pesquisado não foi encontrado.
                                        limpa_formulário_cep();
                                        alert("CEP não encontrado.");
                                    }
                                });
                            } //end if.
                            else {
                                //cep é inválido.
                                limpa_formulário_cep();
                                alert("Formato de CEP inválido.");
                            }
                        } //end if.
                        else {
                            //cep sem valor, limpa formulário.
                            limpa_formulário_cep();
                        }
                    });
                }
            });


        })
    </script>
<script src="<?= base_url(''); ?>assets/academy/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url(''); ?>assets/academy/styles/bootstrap4/popper.js"></script>
<script src="<?= base_url(''); ?>assets/academy/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url(''); ?>assets/academy/plugins/greensock/TweenMax.min.js"></script>
<script src="<?= base_url(''); ?>assets/academy/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?= base_url(''); ?>assets/academy/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?= base_url(''); ?>assets/academy/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?= base_url(''); ?>assets/academy/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?= base_url(''); ?>assets/academy/plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="<?= base_url(''); ?>assets/academy/plugins/easing/easing.js"></script>
<script src="<?= base_url(''); ?>assets/academy/js/teachers_custom.js"></script>
<script src="<?= base_url(''); ?>assets/academy/js/elements_custom.js"></script>

</body>
</html>

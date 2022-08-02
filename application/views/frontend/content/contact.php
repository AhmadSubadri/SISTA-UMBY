<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs ======= -->
	<section class="breadcrumbs">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<h2>Contact</h2>
				<ol>
					<li><a href="<?= site_url('Home');?>">Home</a></li>
					<li>Contact</li>
				</ol>
			</div>

		</div>
	</section><!-- End Breadcrumbs -->
	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2>Contact</h2>
				<h3><span>Contact Us</span></h3>
			</div>
			<?php foreach($contact as $cont):?>
				<div class="row" data-aos="fade-up" data-aos-delay="100">
					<div class="col-lg-3">
						<div class="info-box mb-4">
							<i class="bx bx-map"></i>
							<h3>Our Address</h3>
							<p><?= $cont->alamat;?></p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="info-box  mb-4">
							<i class="bx bx-envelope"></i>
							<h3>Email Us</h3>
							<p><?= $cont->email;?></p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="info-box  mb-4">
							<i class="bx bx-phone-call"></i>
							<h3>Call Us</h3>
							<p><?= $cont->fax;?></p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="info-box  mb-4">
							<i class="bx bx-phone-call"></i>
							<h3>Phone</h3>
							<p><?= $cont->phone;?></p>
						</div>
					</div>
				</div>
				<div class="row" data-aos="fade-up" data-aos-delay="100">
					<div class="col-lg-6 ">
						<iframe class="mb-4 mb-lg-0" src="<?= $cont->maps;?>" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
					</div>
					<div class="col-lg-6">
						<form action="forms/contact.php" method="post" role="form" class="php-email-form">
							<div class="row">
								<div class="col form-group">
									<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
								</div>
								<div class="col form-group">
									<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
							</div>
							<div class="my-3">
								<div class="loading">Loading</div>
								<div class="error-message"></div>
								<div class="sent-message">Your message has been sent. Thank you!</div>
							</div>
							<div class="text-center"><button type="submit">Send Message</button></div>
						</form>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</section><!-- End Contact Section -->
</main>
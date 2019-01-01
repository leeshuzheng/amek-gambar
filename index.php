<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
 get_header();
 send_email('leeshuzheng@gmail.com');
?>

<audio>
	<source src="<?php echo get_template_directory_uri(); ?>/audio/snap.mp3" type="audio/mpeg">
</audio>
<div class="amek-gambar">
	<div class="amek-gambar__header"><img src="<?php echo get_template_directory_uri(); ?>/images/header.png"></div>
	<div class="amek-gambar__footer"><img src="<?php echo get_template_directory_uri(); ?>/images/footer.png"></div>
	<div class="home page show">
		<div class="home__instructions">
			<h1>TOUCH TO<span>OUTDO THE ORIGINAL</span></h1>
		</div>
		<div class="home__button"><img src="<?php echo get_template_directory_uri(); ?>/images/camera.png"></div>
	</div>
	<div class="choose-past page">
		<div class="choose-past__instructions">
			<h1>CHOOSE<span>YOUR PAST</span></h1>
		</div>
		<div class="choose-past__choices">
			<div data-category="1" class="choose-past__each">
				<div class="choose-past__inner">
					<div class="choose-past__label">
						<h1>1</h1>
						<p>PERSON</p>
					</div><img src="<?php echo get_template_directory_uri(); ?>/images/1person.png" class="object-fit">
				</div>
			</div>
			<div data-category="2" class="choose-past__each">
				<div class="choose-past__inner">
					<div class="choose-past__label">
						<h1>2</h1>
						<p>PERSONS</p>
					</div><img src="<?php echo get_template_directory_uri(); ?>/images/2persons.png" class="object-fit">
				</div>
			</div>
			<div data-category="3-4" class="choose-past__each">
				<div class="choose-past__inner">
					<div class="choose-past__label">
						<h1>3-4</h1>
						<p>PERSONS</p>
					</div><img src="<?php echo get_template_directory_uri(); ?>/images/3persons.png" class="object-fit">
				</div>
			</div>
			<div data-category="5" class="choose-past__each">
				<div class="choose-past__inner">
					<div class="choose-past__label">
						<h1>5</h1>
						<p>OR MORE PERSONS</p>
					</div><img src="<?php echo get_template_directory_uri(); ?>/images/4persons.png" class="object-fit">
				</div>
			</div>
		</div>
	</div>
	<div class="take-photo page">
		<div class="take-photo__camera">
			<div data-show="1" class="take-photo__frame"><img src="<?php echo get_template_directory_uri(); ?>/images/frames/1.png"></div>
			<div data-show="2" class="take-photo__frame"><img src="<?php echo get_template_directory_uri(); ?>/images/frames/2.png"></div>
			<div data-show="3-4" class="take-photo__frame"><img src="<?php echo get_template_directory_uri(); ?>/images/frames/3.png"></div>
			<div data-show="5" class="take-photo__frame"><img src="<?php echo get_template_directory_uri(); ?>/images/frames/5orMore.png"></div>
			<div style="width: 915px; height: 520px" class="camera"></div><span class="take-photo__countdown"></span>
		</div>
	</div>
	<div class="show-photo page">
		<div class="show-photo__container">
			<div class="show-photo__image"></div>
			<div class="show-photo__frames">
				<div data-show="1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/frames/1.png)" class="show-photo__frame"></div>
				<div data-show="2" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/frames/2.png)" class="show-photo__frame"></div>
				<div data-show="3-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/frames/3.png)" class="show-photo__frame"></div>
				<div data-show="5" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/frames/5orMore.png)" class="show-photo__frame"></div>
			</div>
		</div>
		<div class="show-photo__buttons">
			<button class="show-photo__retake">RETAKE</button>
			<button class="show-photo__submit">SUBMIT</button>
		</div>
	</div>
	<div class="submit-photo page">
		<div class="submit-photo__header">
			<h1>DOWNLOAD<span>YOUR PORTRAIT</span></h1>
		</div>
		<div class="keyboard">
			<div id="tooltip"><span>Please enter a valid email address</span></div>
			<input type="email" placeholder="Email" class="keyboard__input">
			<button class="clear"><span>CLEAR</span></button>
			<button class="submit"><span>SUBMIT</span></button>
			<ul class="keyboard__keys">
				<li class="symbol"><span class="off">1</span><span class="on">1</span></li>
				<li class="symbol"><span class="off">2</span><span class="on">2</span></li>
				<li class="symbol"><span class="off">3</span><span class="on">3</span></li>
				<li class="symbol"><span class="off">4</span><span class="on">4</span></li>
				<li class="symbol"><span class="off">5</span><span class="on">5</span></li>
				<li class="symbol"><span class="off">6</span><span class="on">6</span></li>
				<li class="symbol"><span class="off">7</span><span class="on">7</span></li>
				<li class="symbol"><span class="off">8</span><span class="on">8</span></li>
				<li class="symbol"><span class="off">9</span><span class="on">9</span></li>
				<li class="symbol"><span class="off">0</span><span class="on">0</span></li>
				<li class="delete lastitem"><img src="<?php echo get_template_directory_uri(); ?>/images/backspace.svg"></li>
				<li class="letter">q</li>
				<li class="letter">w</li>
				<li class="letter">e</li>
				<li class="letter">r</li>
				<li class="letter">t</li>
				<li class="letter">y</li>
				<li class="letter">u</li>
				<li class="letter">i</li>
				<li class="letter">o</li>
				<li class="letter">p</li>
				<li class="symbol"><span class="off">-</span><span class="on">_</span></li>
				<li class="letter">a</li>
				<li class="letter">s</li>
				<li class="letter">d</li>
				<li class="letter">f</li>
				<li class="letter">g</li>
				<li class="letter">h</li>
				<li class="letter">j</li>
				<li class="letter">k</li>
				<li class="letter">l</li>
				<li class="symbol"><span class="off">.</span><span class="on">.</span></li>
				<li class="symbol"><span class="off">@</span><span class="on">@</span></li>
				<li class="left-shift"><img src="<?php echo get_template_directory_uri(); ?>/images/shift.svg"></li>
				<li class="letter">z</li>
				<li class="letter">x</li>
				<li class="letter">c</li>
				<li class="letter">v</li>
				<li class="letter">b</li>
				<li class="letter">n</li>
				<li class="letter">m</li>
				<li class="letter com">.com</li>
				<div style="clear:both"></div>
			</ul>
		</div>
	</div>
	<div class="thank-you page"></div>
</div>

<?php
get_footer();

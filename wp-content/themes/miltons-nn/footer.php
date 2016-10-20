<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>

  </section>

  <section class="emailSignup">

  <a class="o-close hide-for-small" >X</a>
  <div class="row collapse nomax">
  <div class="small-12 medium-4 medium-centered column">
  <h5 class="text-center text-white" id="question">Q: What do you get when you play Tug-of-War with a pig?
  <br>A: Pulled-Pork</h5>
  <p class="text-white text-center white o-catfish-copy--desktop">
  Keep in touch with the Milton’s Local community for updates.</p>
  <div class="small-12 medium-8 medium-centered column">
  <form data-id="embedded_signup:form"  class="ctct-custom-form Form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup">
  <input data-id="ca:input" type="hidden" name="ca" value="40644c76-e885-40a9-bc60-8065607e4831">
  <input data-id="list:input" type="hidden" name="list" value="1790304532">
  <input data-id="source:input" type="hidden" name="source" value="EFD">
  <input data-id="required:input" type="hidden" name="required" value="list,email">
  <input data-id="url:input" type="hidden" name="url" value="">
  <div class="input-wrapper">
  <input id="fieldEmail" required="" placeholder="you@emailaddress.com" data-id="Email Address:input" type="text" name="email" value="" maxlength="80">
  <button class="button submit" type="submit" data-enabled="enabled">
  Subscribe
  </button>
  </div>
  </form>
  </div>
  </div>
  </div>
  </section>

  <footer id="site_footer">
  	<?php do_action( 'foundationpress_before_footer' ); ?>

    <div class="row collapse nomax">
      <div class="small-12">
        <column>
          <div class="left">
            <ul class="inline-list left social">
              <li><a href="https://facebook.com/miltonslocal"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.instagram.com/miltonslocal/"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://twitter.com/miltonslocal"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.pinterest.com/miltonslocal/"><i class="fa fa-pinterest"></i></a></li>
            </ul>
            <ul class="inline-list left pages">
              <li><a href="<?php echo site_url() ?>/"><small>ABOUT</small></a></li>
              <li><a href="<?php echo site_url() ?>/shop"><small>SHOP</small></a></li>
              <li><a href="<?php echo site_url() ?>/find-us"><small>FIND US</small></a></li>
              <li><a href="<?php echo site_url() ?>/category/recipe/"><small>RECIPES</small></a></li>
              <li><a href="<?php echo site_url() ?>/farmers"><small>FARMERS</small></a></li>
              <li><a href="<?php echo site_url() ?>/press"><small>PRESS</small></a></li>
              <li><a href="<?php echo site_url() ?>/clients"><small>CLIENTS</small></a></li>
              <li><a href="<?php echo site_url() ?>/contact"><small>CONTACT</small></a></li>
              <li><a href="<?php echo site_url() ?>/returns-privacy"><small>PRIVACY & RETURNS</small></a></li>
              <li><a href="http://www.never-not.com"><small>SITEBY</small></a></li>
              <li class="copy"><a href=""><small>&copy 2016 MILTON'S LOCAL</small></a></li>
<!--
              <li>
              <div class="footer-mailing-wrapper">
					<form action="" method="post">
						<div class="input-wrapper">
							<input id="fieldEmail" name="cm-idhtjtr-idhtjtr" type="email" required="" placeholder="Join our Community">
							<button class="button" type="submit">
								Submit
							</button>
						</div>
					</form>

				</div>
              </li>
-->
            </ul>
          </div>

          <div class="right hide-for-small">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo-stacked-blk.svg" alt="">
          </div>

          <div class="row hide-for-medium-up">
            <div class="small-8 small-centered column">
              <hr class="white">
            </div>
          </div>

          <div class="small-12 column text-center hide-for-medium-up">
            <a href="<?php echo home_url(); ?>">
            <img class="white" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo-stacked.svg" alt="">
          </div>
        </column>
      </div>
    </div>

  	<?php do_action( 'foundationpress_after_footer' ); ?>
  </footer>
  <a class="exit-off-canvas"></a>

  	<?php do_action( 'foundationpress_layout_end' ); ?>
  	</div>
  </div>
  <?php wp_footer(); ?>

<script type="text/javascript">
	$('a.o-close').click(function(){
		$('.emailSignup').css('display','none');
	});
	$('button.submit').click(function(){
		$('h5#question').html('Thanks for Signing Up!');
		$('.o-catfish-copy--desktop').css('display','none');
		$('.input-wrapper').css('display','none');

	});



</script>


<script type='text/javascript'>
   var localizedErrMap = {};
   localizedErrMap['required'] = 		'This field is required.';
   localizedErrMap['ca'] = 			'An unexpected error occurred while attempting to send email.';
   localizedErrMap['email'] = 			'Please enter your email address in name@email.com format.';
   localizedErrMap['birthday'] = 		'Please enter birthday in MM/DD format.';
   localizedErrMap['anniversary'] = 	'Please enter anniversary in MM/DD/YYYY format.';
   localizedErrMap['custom_date'] = 	'Please enter this date in MM/DD/YYYY format.';
   localizedErrMap['list'] = 			'Please select at least one email list.';
   localizedErrMap['generic'] = 		'This field is invalid.';
   localizedErrMap['shared'] = 		'Sorry, we could not complete your sign-up. Please contact us to resolve this.';
   localizedErrMap['state_mismatch'] = 'Mismatched State/Province and Country.';
	localizedErrMap['state_province'] = 'Select a state/province';
   localizedErrMap['selectcountry'] = 	'Select a country';
   var postURL = 'https://visitor2.constantcontact.com/api/signup';
</script>
<script type='text/javascript' src='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/js/signup-form.js'></script>



  <?php do_action( 'foundationpress_before_closing_body' ); ?>
  </body>
</html>

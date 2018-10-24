<div align="center" id="footer_css"><footer>
		<section id="footer-content" class="hide-mobile">
                    <?php
                    if(empty($_SESSION['user_email']))
                    {?>
                        <a href="signup.php" class="scrolling-link">SIGN UP</a>
              <?php } ?>
			<a href="#about" class="scrolling-link">ABOUT</a>
			<a href="#contact-us" class="scrolling-link">CONTACT US</a>
	       </section>
</footer></div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/functions.js"></script>

</body>
</html>
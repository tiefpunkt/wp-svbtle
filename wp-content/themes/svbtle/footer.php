</section><!-- #main -->

<?php $options = get_option ( 'svbtle_options' ); ?>

<script data-cfasync="false" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">
	function setViewport() {
		$(window).width() < 900 && $("html,body").animate({
			scrollLeft: 180
		},
		800)
	}
	
	function startCode() {
		$("code").addClass("prettyprint"),
		$.getScript("<?php echo get_bloginfo('stylesheet_directory'); ?>/js/prettify.js").done(function(e, t) {
			var n = "<?php echo get_bloginfo('stylesheet_directory'); ?>/css/prettify.css";
			$.get(n,
			function(e) {
				$('<style type="text/css"></style>').html(e).appendTo("head")
			}),
			prettyPrint();
		})
	} 

	function mouseIn(t) {
		t.addClass("active"),
		t.children(".counter").children("span.txt").html("Don&rsquo;t move"),
		t.children(".counter").children("span.num").hide(),
		e = setTimeout(function() {
			clearTimeout(e),
			done(t)
		},
		1000)
	}
	function mouseOut(t) {
		clearTimeout(e),
		t.children(".counter").children("span.txt").html("Kudos"),
		t.children(".counter").children("span.num").show(),
		t.removeClass("active")
	}

	function done(e) {
		e.children(".counter").children("span.txt").html("Kudos");
		e.children(".counter").children("span.num").show();
		e.addClass("complete");
		e.removeClass("kudoable active");
		id = e.closest("article").attr("id");
		window.location.href = "<?php get_site_url(); ?>?p="+id;
	}
	var e;
	setViewport(),
	$("code, pre").length > 0 && startCode();
	$("a.kudobject").live({
			mouseenter: function() {
				kudo = $(this).parent();
				mouseIn(kudo);
			},
			mouseleave: function() {
				clearTimeout(e),
				kudo = $(this).parent();
				mouseOut(kudo);
				kudo.is(".complete") && kudo.addClass("deletable")
			}
		});
	
	$("a.kudobject").live("touchstart",
		function(e) {
			kudo = $(this).parent(),
					mouseIn(kudo),
			e.preventDefault()
		});
	
	$("a.kudobject").live("touchend",
		function(t) {
			clearTimeout(e),
			kudo = $(this).parent(),
			mouseOut(kudo),
			t.preventDefault()
		});


	$("input.pane_input, textarea.pane_input").bind("focus", function() {
			$("li.text_field").removeClass("active"), $(this).parent("li.text_field").addClass("active")
		})
	$("input.pane_input, textarea.pane_input").bind("blur", function() {
			$("li.text_field").removeClass("active"), $("li.text_field").first().addClass("active")
		});
</script>
		</div><!-- #wrap -->
		
		<?php wp_footer(); ?>
	</body>
</html>

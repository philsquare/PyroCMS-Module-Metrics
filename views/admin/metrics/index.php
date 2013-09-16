<?php if ( ! isset($failure)): ?>

<div class="one_full">
	<section class="title">
	<h4>Visits</h4>
</section>
<section class="item">
	<div class="content">
		
		<?php echo $template['partials']['filters'] ?>
		
		<h3>Visitors are in <span class="green">green</span>. Page views are in <span class="orange">orange</span>.</h3>

		<canvas id="visits" width="1200" height="400"></canvas>

	</div>
</section>
</div>


<div class="one_full">

<section class="title">
	<h4>Metrics</h4>
</section>
<section class="item">
	<div class="content">
		
		<div class="tabs">
		    <ul class="tab-menu">
		        <li><a href="#panel1"><span>Referrers</span></a></li>
		        <li><a href="#panel2"><span>Browsers</span></a></li>
				<li><a href="#panel3"><span>Screen Resolutions</span></a></li>
				<li><a href="#panel4"><span>Search Words</span></a></li>
				<li><a href="#panel5"><span>Visitors per Hour</span></a></li>
		    </ul>
		    <div id="panel1">
				<fieldset>
					<?php echo $template['partials']['referrers'] ?>
				</fieldset>
		    </div>
		    <div id="panel2">
				<fieldset>
					<?php echo $template['partials']['browsers'] ?>
				</fieldset>
		    </div>
			<div id="panel3">
				<fieldset>
					<?php echo $template['partials']['screen_resolutions'] ?>
				</fieldset>
		    </div>
			<div id="panel4">
				<fieldset>
					<?php echo $template['partials']['search_words'] ?>
				</fieldset>
		    </div>
			<div id="panel5">
				<fieldset>
					<canvas id="vph" width="1200" height="400"></canvas>
				</fieldset>
		    </div>
		</div>

	</div>
</section>
</div>

<?php else: ?>
<div class="no_data">
	
	<?php echo $failure; ?>
	
</div>
<?php endif; ?>
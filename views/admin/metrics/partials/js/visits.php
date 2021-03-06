<script>

$(function(){
	
	//Get context with jQuery - using jQuery's .get() method.
	var ctx = $("#visits").get(0).getContext("2d");
	//This will get the first returned node in the jQuery collection.
	var myNewChart = new Chart(ctx);
	
	var data = {
		labels : <?php echo $labels; ?>,
		datasets : [
			{
				fillColor : "rgba(255,128,0,0.5)",
				strokeColor : "rgba(255,128,0,1)",
				pointColor : "rgba(255,128,0,1)",
				pointStrokeColor : "#fff",
				data : <?php echo $views; ?>
			},
			{
				fillColor : "rgba(64,128,0,0.5)",
				strokeColor : "rgba(64,128,0,1)",
				pointColor : "rgba(64,128,0,1)",
				pointStrokeColor : "#fff",
				data : <?php echo $visits; ?>
			}
		]
	}
	
 	var options = {

		//Boolean - If we show the scale above the chart data			
		scaleOverlay : false,

		//Boolean - If we want to override with a hard coded scale
		scaleOverride : true,

		//** Required if scaleOverride is true **
		//Number - The number of steps in a hard coded scale
		scaleSteps : <?php echo $steps; ?>,
		//Number - The value jump in the hard coded scale
		scaleStepWidth : <?php echo $width; ?>,
		//Number - The scale starting value
		scaleStartValue : 0,

		//String - Colour of the scale line	
		scaleLineColor : "rgba(0,0,0,.1)",

		//Number - Pixel width of the scale line	
		scaleLineWidth : 1,

		//Boolean - Whether to show labels on the scale	
		scaleShowLabels : true,

		//Interpolated JS string - can access value
		scaleLabel : "<%=value%>",

		//String - Scale label font declaration for the scale label
		scaleFontFamily : "'Arial'",

		//Number - Scale label font size in pixels	
		scaleFontSize : 12,

		//String - Scale label font weight style	
		scaleFontStyle : "normal",

		//String - Scale label font colour	
		scaleFontColor : "#666",	

		///Boolean - Whether grid lines are shown across the chart
		scaleShowGridLines : true,

		//String - Colour of the grid lines
		scaleGridLineColor : "rgba(0,0,0,.05)",

		//Number - Width of the grid lines
		scaleGridLineWidth : 1,	

		//Boolean - Whether the line is curved between points
		bezierCurve : false,

		//Boolean - Whether to show a dot for each point
		pointDot : true,

		//Number - Radius of each point dot in pixels
		pointDotRadius : 3,

		//Number - Pixel width of point dot stroke
		pointDotStrokeWidth : 1,

		//Boolean - Whether to show a stroke for datasets
		datasetStroke : true,

		//Number - Pixel width of dataset stroke
		datasetStrokeWidth : 2,

		//Boolean - Whether to fill the dataset with a colour
		datasetFill : true,

		//Boolean - Whether to animate the chart
		animation : true,

		//Number - Number of animation steps
		animationSteps : 60,

		//String - Animation easing effect
		animationEasing : "easeOutQuart",

		//Function - Fires when the animation is complete
		onAnimationComplete : null

	}
	
	new Chart(ctx).Line(data,options);

});

</script>
<?php if(count($resolutions)): ?>

<?php

	$this->table->set_heading('Screen Resolutions', 'Count');
	
	foreach($resolutions as $resolution => $count)
	{
		$column1 = $resolution;
		$column2 = $count;
		
		$this->table->add_row($column1, $column2);
	}

	echo $this->table->generate();

?>

<?php else: ?>

<div class="no_data">No Data</div>

<?php endif ?>
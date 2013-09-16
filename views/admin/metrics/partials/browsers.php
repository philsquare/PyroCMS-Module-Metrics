<?php if(count($browsers)): ?>

<?php

	$this->table->set_heading('Browser', 'Count');
	
	foreach($browsers as $browser => $count)
	{
		$column1 = $browser;
		$column2 = $count;
		
		$this->table->add_row($column1, $column2);
	}

	echo $this->table->generate();

?>

<?php else: ?>

<div class="no_data">No Data</div>

<?php endif ?>
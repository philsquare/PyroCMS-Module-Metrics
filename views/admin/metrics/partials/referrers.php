<?php if(count($referrers)): ?>

<?php

	$this->table->set_heading('Referrer', 'Count');
	
	foreach($referrers as $referrer => $count)
	{
		$column1 = $referrer;
		$column2 = $count;
		
		$this->table->add_row($column1, $column2);
	}

	echo $this->table->generate();

?>

<?php else: ?>

<div class="no_data">No Data</div>

<?php endif ?>
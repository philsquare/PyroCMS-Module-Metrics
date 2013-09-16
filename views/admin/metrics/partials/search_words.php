<?php if(count($search_words)): ?>

<?php

	$this->table->set_heading('Search Words', 'Count');
	
	foreach($search_words as $word => $count)
	{
		$column1 = $word;
		$column2 = $count;
		
		$this->table->add_row($column1, $column2);
	}

	echo $this->table->generate();

?>

<?php else: ?>

<div class="no_data">No Data</div>

<?php endif ?>
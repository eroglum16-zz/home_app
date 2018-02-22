<div class="container" id="con">
	<?php 
		for ($x = 0; $x < count($todo); $x++) {
			if($todo[$x]['is_done']==0){
	?>
	<div class="row">
		<div class="col-lg-6">
			<a href="<?php echo site_url("pages/tick_todo/").$todo[$x]['todo_id']; ?>">
				<button class="btn btn-circle btn-info"><i class="fa fa-check"></i> </button>
			</a>
			<strong style="margin-left: 4%;  color: #337ab7; font-family: chalkduster" ><?php echo $todo[$x]['todo_text'];  ?></strong>
		</div>
	</div>
	<br>
	<?php
			}
		} 
	?>
	<div class="row">
		<div class="col-lg-6">
			<div id="newtodo" class="collapse">
				<form role="form" action="<?php echo site_url("/pages/add_todo"); ?>" method="post">
					<button class="btn btn-circle btn-default"><i class="fa fa-check" type="submit"></i> </button>
					<input style="margin-left: 4%;  color: #337ab7; font-family: chalkduster" id="newitem" name="item" type="text" size="50" autofocus></input>
				</form>
			</div>
		</div>
	</div>
	<br>
	
</div>


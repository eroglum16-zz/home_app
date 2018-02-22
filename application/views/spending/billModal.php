<?php
$months=array();
$months[1]="Ocak";
$months[2]="Şubat";
$months[3]="Mart";
$months[4]="Nisan";
$months[5]="Mayıs";
$months[6]="Haziran";
$months[7]="Temmuz";
$months[8]="Ağustos";
$months[9]="Eylül";
$months[10]="Ekim";
$months[11]="Kasım";
$months[12]="Aralık";

$this_year=date("Y");
?>
								
											<form  role="form" action="<?php echo site_url(); ?>/spending/add_bill" method="post">
					                            <fieldset>
					                            	<div class="form-group">
					                            		<select class="form-control" name="month"">
							                            			<?php $i=1; while ($i<13) { ?>
							                            			<option  <?php if((int)date("m")==$i) echo "selected"; ?> value="<?php echo $i;?>"><?php echo $months[$i];  $i++; ?></option>
							                            			<?php } ?>
							                            </select>
					                            	</div>
					                            	<div class="form-group">
					                            		<select class="form-control text-center" name="year">
							                            			<option value="<?php echo $this_year-1; ?>"><?php echo $this_year-1; ?></option>
							                            			<option selected value="<?php echo $this_year; ?>"><?php echo $this_year; ?></option>
							                            			<option value="<?php echo $this_year+1; ?>"><?php echo $this_year+1; ?></option>
							                            </select>
					                            	</div>
					                            	<div class="form-group">
					                            		<select class="form-control text-center" name="type">
							                            			<option value="1">Elektrik</option>
							                            			<option value="2">Su</option>
							                            			<option value="3">Doğalgaz</option>
							                            			<option value="4">İnternet</option>
							                            </select>
					                            	</div>
					                            	<div class="form-group">
					                            		<input class="form-control text-center" placeholder="₺" name="due" type="text" autofocus required>
					                            	</div>
					                            	<div class="form-group">
					                            		<button type="submit" name="submit" class="btn btn-block btn-warning">Ekle <i class="fa fa-plus"></i> </button>
					                            	</div>
					                            </fieldset>
					                        </form>     
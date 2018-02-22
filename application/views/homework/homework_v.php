<?php
$months=array();
$months[0]="Ocak";
$months[1]="Şubat";
$months[2]="Mart";
$months[3]="Nisan";
$months[4]="Mayıs";
$months[5]="Haziran";
$months[6]="Temmuz";
$months[7]="Ağustos";
$months[8]="Eylül";
$months[9]="Ekim";
$months[10]="Kasım";
$months[11]="Aralık";
 ?>

<div id="page-wrapper">
	<div class="row">
		<h2 class="page-header" >Ödevler</h2>
		<div class="col-lg-12">
			<?php 
				$no_homework="";
				$panel_no=0;
				if ($homework) {

					foreach ($homework as $hw) {
						$panel_no++;
	            		$class_name=$hw['class_name'];
	            		$hw_content=$hw['hw_content'];

	            		$datetime1 = date_create($hw['due_date']);
					    $datetime2 = date_create(date("Y-m-d"));
					    $interval = date_diff($datetime2, $datetime1);
					    if($interval->invert==1)redirect("/homework/tick_homework/".$hw['hw_id']);
					    $day_left = $interval->format('%a')." gün kaldı!";
	            		if($interval->format('%a')==0)$day_left = "Bugün son gün!";
					
            	 ?>
            <div class="panel panel-red">
            		<div style="cursor: pointer" data-toggle="collapse" href="#panel<?php echo $panel_no; ?>" class="panel-heading">
	                    <?php echo $class_name; ?><span style="color:#99130f; float: right"><?php echo $day_left; ?></span> 
	                </div>
            	
                <div id="panel<?php echo $panel_no; ?>" class="panel-collapse collapse">
	                <div class="panel-body">
	                    <p><?php echo $hw_content; ?></p>
	                </div>
	                <div class="panel-footer">
	                    <a type='button' href=<?php echo site_url("homework/tick_homework/").$hw['hw_id']; ?> >Yapıldı olarak işaretle <i class='fa fa-check'></i></a>
	                </div>
            	</div>
            </div>
            <?php }}else{$no_homework="<div class='alert alert-success'>Şuan için ödeviniz bulunmamaktadır.</div>";} ?>
            <?php if(($this->session->userdata['user_id']==1)||($this->session->userdata['user_id']==2)||($this->session->userdata['user_id']==1)){ ?>
            <?php echo $no_homework; ?>
			<form class="form-inline" method="post" action="<?php echo site_url("/homework/add_homework");?>">
        		<div class="panel panel-red collapse" id="newHomework">
        		 
                        <div class="panel-heading">

                                    <select  name="class" style="color: #d9534f" class="form-control">
                                    	<?php
                                    		$classes=array();
                                    		if ($this->session->userdata['user_id']==1) {
                                    			$classes=$this->schedule_m->get1();
                                    		}elseif ($this->session->userdata['user_id']==2) {
                                    			$classes=$this->schedule_m->get2();
                                    		}elseif ($this->session->userdata['user_id']==2) {
                                    			$classes=$this->schedule_m->get3();
                                    		}
                                    		if (isset($classes)) {
                                    			foreach ($classes as $class) {                                    			
                                    				echo "<option value='".$class['class_id']."' >".$class['class_name']."</option>";
                                    			}
                                    		}
                                    	 ?>
                                    </select>

                            <div style="float: right;" class="form-group">
                            	<span style="color:#99130f;">Son gün: </span> 
                            	<select name="day" style="color: #d9534f" class="form-control">
                                    	<?php for ($i=1; $i < 32 ; $i++) { 
                                    		$selected="";
                                    		if($i==date("d")+1) $selected="selected";
                                    		echo "<option $selected value='$i'>".$i."</option>";
                                    	} ?>
                                    </select>
                                    <select name="month" style="color: #d9534f" class="form-control">
                                    	<?php for ($i=0; $i < 12 ; $i++) { 
                                    		$selected="";
                                    		if($i+1==date("m")) $selected="selected";
                                    		echo "<option $selected value='".date("F",strtotime("2018-".($i+1)."-15"))."'>".$months[$i]."</option>";
                                    	} ?>
                                    </select>
                                    <select name="year" style="color: #d9534f" class="form-control">
                                    	<?php for ($i=date('Y'); $i < date('Y')+2 ; $i++) { 
                                    		echo "<option value='".$i."'>".$i."</option>";
                                    		if(date('m')<9) break;
                                    	} ?>
                                    </select>
                            	
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                   <textarea autofocus required name="description" placeholder="Ödevinizin açıklamalarını buraya yazın..." class="form-control" cols="90" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-danger" type="submit" style="cursor: pointer;"><span>Yeni ödevin hayırlı olsun <i class="fa fa-umbrella"></i></span></button>
                        </div>
             </form>   

             	</div>
             
             <div class="panel panel-danger">
             	<div style="cursor: pointer" data-toggle="collapse" data-target="#newHomework" class="panel-heading">
	                     <span><i class="fa fa-plus"></i></span> Yeni Ödev Ekle <span style="float: right"><i class="fa fa-mortar-board  "></i></span>
	            </div>
             </div>
             <?php }else{$no_homework="<div class='alert alert-info'>Sistemde ödev girişi yapma yetkisi olan kullanıcılardan birisi değilsiniz.</div>"; echo $no_homework;}?>   

		</div>
		

	</div>
</div>
<div id="page-wrapper">
	<div class="row">
		<h2 class="page-header" >Ders Programları</h2>
		<div class="col-lg-12">
			<div class="panel panel-default">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li <?php if($this->session->userdata('user_id')==1) echo "class='active'";?> ><a href="#mert" data-toggle="tab">Mert</a>
                                </li>
                                <li <?php if($this->session->userdata('user_id')==2) echo "class='active'";?>><a href="#yusuf" data-toggle="tab">Yusuf</a>
                                </li>
                                <li <?php if($this->session->userdata('user_id')==3) echo "class='active'";?>><a href="#emre" data-toggle="tab">Emre</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content tooltip-demo">
                                <div class="tab-pane fade <?php if($this->session->userdata('user_id')==1) echo "in active";?> " id="mert">
                                	<?php
										$cell1 = array
										  (
										  array("<td>8.30-9.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>9.30-10.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>10.30-11.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>11.30-12.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>12.30-13.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>13.30-14.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>14.30-15.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>15.30-16.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>16.30-17.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>")
										  );

										foreach ($mert as $row) {
											$duration=$row['finish']-$row['start'];
											$cell1[$row['start']-1][$row['day']] = "<td style='padding: ".($duration+1)."% 0; background-color: rgb(200,255,200)' rowspan='$duration'><span data-toggle='tooltip' data-placement='top' title='Derslik: ".$row['classroom']."'>".$row['class_name']."</span><a data-toggle='tooltip' data-placement='bottom' title='Dersi tablodan kaldırmak için tıkla' href='".site_url("/schedule/inactivate/").$row['class_id']."'><span style='color:#d9534f'><i class='fa fa-times'></i></span><a/></td>";
											for ($i=$row['start']; $i < ($row['finish']-1) ; $i++) { 
												$cell1[$i][$row['day']]="";
											}
										}

									?>
                                    <div class="table-responsive">
		                                <table class="table table-bordered text-center">
		                                    <thead>
		                                        <tr>
		                                            <th class="text-center">Saat/Gün</th>
		                                            <th class="text-center">Pazartesi</th>
		                                            <th class="text-center">Salı</th>
		                                            <th class="text-center">Çarşamba</th>
		                                            <th class="text-center">Perşembe</th>
		                                            <th class="text-center">Cuma</th>                                           
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                    	<?php for($i=0; $i<9; $i++){ echo
		                                        "<tr>".
		                                            $cell1[$i][0].
		                                            $cell1[$i][1].
		                                            $cell1[$i][2].
		                                            $cell1[$i][3].
		                                            $cell1[$i][4].
		                                            $cell1[$i][5].
		                                        "</tr>";
		                                        }?>
		                                    </tbody>
		                                </table>
		                            </div>
		                            <!-- /.table-responsive -->
                                </div>

                                <div class="tab-pane fade <?php if($this->session->userdata('user_id')==2) echo "in active";?>" id="yusuf">
                                	<?php
										$cell2 = array
										  (
										  array("<td>8.30-9.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>9.30-10.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>10.30-11.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>11.30-12.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>12.30-13.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>13.30-14.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>14.30-15.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>15.30-16.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>16.30-17.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>")
										  );

										foreach ($yusuf as $row) {
											$duration=$row['finish']-$row['start'];
											$cell2[$row['start']-1][$row['day']] = "<td style='padding: ".($duration+1)."% 0; background-color: rgb(200,255,200)' rowspan='$duration'><span data-toggle='tooltip' data-placement='bottom' title='Derslik: ".$row['classroom']."'>".$row['class_name']."</span><a href='".site_url("/schedule/inactivate/").$row['class_id']."'><span style='color:#d9534f'><i class='fa fa-times'></i></span><a/></td>";
											for ($i=$row['start']; $i < ($row['finish']-1) ; $i++) { 
												$cell2[$i][$row['day']]="";
											}
										}

									?>
                                    <div class="table-responsive">
		                                <table class="table table-bordered text-center">
		                                    <thead>
		                                        <tr>
		                                            <th class="text-center">Saat/Gün</th>
		                                            <th class="text-center">Pazartesi</th>
		                                            <th class="text-center">Salı</th>
		                                            <th class="text-center">Çarşamba</th>
		                                            <th class="text-center">Perşembe</th>
		                                            <th class="text-center">Cuma</th>                                           
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                    	<?php for($i=0; $i<9; $i++){ echo
		                                        "<tr>".
		                                            $cell2[$i][0].
		                                            $cell2[$i][1].
		                                            $cell2[$i][2].
		                                            $cell2[$i][3].
		                                            $cell2[$i][4].
		                                            $cell2[$i][5].
		                                        "</tr>";
		                                        }?>
		                                    </tbody>
		                                </table>
		                            </div>
		                            <!-- /.table-responsive -->
                                </div>

                                <div class="tab-pane fade <?php if($this->session->userdata('user_id')==3) echo "in active";?>" id="emre">
                                	<?php
										$cell3 = array
										  (
										  array("<td>8.30-9.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>9.30-10.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>10.30-11.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>11.30-12.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>12.30-13.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>13.30-14.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>14.30-15.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>15.30-16.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>"),
										  array("<td>16.30-17.30</td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>","<td></td>")
										  );

										  foreach ($emre as $row) {
											$duration=$row['finish']-$row['start'];
											$cell3[$row['start']-1][$row['day']] = "<td style='padding: ".($duration+1)."% 0; background-color: rgb(200,255,200)' rowspan='$duration'><span data-toggle='tooltip' data-placement='bottom' title='Derslik: ".$row['classroom']."'>".$row['class_name']."</span> <a href='".site_url("/schedule/inactivate/").$row['class_id']."'><span style='color:#d9534f'><i class='fa fa-times'></i></span><a/></td>";
											for ($i=$row['start']; $i < ($row['finish']-1) ; $i++) { 
												$cell3[$i][$row['day']]="";
											}
										}

									?>
                                    <div class="table-responsive">
		                                <table class="table table-bordered text-center">
		                                    <thead>
		                                        <tr>
		                                            <th class="text-center">Saat/Gün</th>
		                                            <th class="text-center">Pazartesi</th>
		                                            <th class="text-center">Salı</th>
		                                            <th class="text-center">Çarşamba</th>
		                                            <th class="text-center">Perşembe</th>
		                                            <th class="text-center">Cuma</th>                                          
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                    	<?php for($i=0; $i<9; $i++){ echo
		                                        "<tr>".
		                                            $cell3[$i][0].
		                                            $cell3[$i][1].
		                                            $cell3[$i][2].
		                                            $cell3[$i][3].
		                                            $cell3[$i][4].
		                                            $cell3[$i][5].
		                                        "</tr>";
		                                        }?>
		                                    </tbody>
		                                </table>
		                            </div>
		                            <!-- /.table-responsive -->
                                </div>
                            </div>
                            <a data-toggle="modal" data-target="#classModal" style="cursor:pointer;" ><i class="fa fa-plus"></i> Ders ekle </a>
                        </div>
                        <!-- /.panel-body -->

                    </div>
                </div>

                <!-- Class Modal -->
                <div id="classModal" class="modal fade" role="dialog" >
				  	<div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
						    <div class="modal-header text-center" style="background-color: rgb(100,155,100)">
						        <button type="button" class="close" onclick="$('#').val('');" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title" style="color:white">Ders Ekle</h4>
						    </div>
						    <div class="modal-body">
                			<?php $this->load->view("schedule/classModal"); ?>
                			</div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-danger" onclick="$('#').val('');" data-dismiss="modal">Kapat</button>
						    </div>
						</div>
					</div>
				</div>

	</div>
</div>
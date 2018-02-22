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
$months[19]="Ekim";
$months[11]="Kasım";
$months[12]="Aralık";
 ?>

<div id="page-wrapper">
	<div class="row">
		<h2 class="page-header" >Harcamalar</h2>
        <div class="col-lg-12">

                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="display: none">Gün</th>
                                        <th style="display: none">Ay</th>
                                        <th style="display: none">Yıl</th>
                                        <th>Girdi Tarihi</th>
                                        <th>Alınan Mal veya Hizmet</th>
                                        <th>Tutar</th>
                                        <th>Girdiyi Yapan Kişi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($spendings as $spending) { ?>
                                    <tr>
                                        <?php $month=$months[(int)mdate('%m', strtotime($spending['sp_date']))] ?>
                                        <?php $day=(int)mdate('%d', strtotime($spending['sp_date'])) ?>
                                        <td style="display: none"><?php echo $day; ?></td>
                                        <td style="display: none"><?php echo (int)mdate('%m', strtotime($spending['sp_date'])); ?></td>
                                        <td style="display: none"><?php echo (int)mdate('%Y', strtotime($spending['sp_date']));  ?></td>
                                        <td><?php echo mdate($day.' '.$month.' %Y', strtotime($spending['sp_date'])); ?></td>
                                        <td> <?php echo $spending['sp_name']; ?> </td>
                                        <td><?php echo $spending['sp_cost']."₺"; ?></td>
                                        <td><?php echo $spending['name']; ?></td>  
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->

                    </div>
                    <!-- /.panel -->

                    <div style="margin-bottom: 10px">
                        <a  data-toggle="modal" data-target="#spendingModal" style="cursor:pointer;" ><i class="fa fa-plus"></i> Harcama ekle </a>
                    </div>
                    
                </div>
                <!-- /.col-lg-12 -->

                <!-- Spending Modal -->
                <div id="spendingModal" class="modal fade" role="dialog" >
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header text-center" style="background-color: #5bc0de">
                                <button type="button" class="close" onclick="$('#').val('');" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="color:white">Harcama Ekle</h4>
                            </div>
                            <div class="modal-body">
                            <?php $this->load->view("spending/spendingModal"); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="$('#').val('');" data-dismiss="modal">Kapat</button>
                            </div>
                        </div>
                    </div>
                </div>
	</div>
</div>
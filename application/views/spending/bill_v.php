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

$bill_type=array();
$bill_type[0]="";
$bill_type[1]="Elektrik";
$bill_type[2]="Su";
$bill_type[3]="Doğalgaz";
$bill_type[4]="İnternet";

$bill_paid=array();
$bill_paid[0]="<i class='fa fa-times'></i>";
$bill_paid[1]="<i class='text-success fa fa-check'></i>";
 ?>

<div id="page-wrapper">
	<div class="row">
		<h2 class="page-header" >Faturalar</h2>
        <div class="col-lg-12">

                <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="display: none">Gün</th>
                                        <th style="display: none">Ay</th>
                                        <th style="display: none">Yıl</th>
                                        <th>Fatura Dönemi</th>
                                        <th>Türü</th>
                                        <th>Tutarı</th>
                                        <th>Ödendi mi?</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bills as $bill) { ?>
                                    <tr>
                                        <?php $month=$months[(int)$bill['bill_month']]; ?>
                                        <?php $year=(int)$bill['bill_year']; ?>
                                        <td style="display: none"><?php echo 1; ?></td>
                                        <td style="display: none"><?php echo (int)$bill['bill_month']; ?></td>
                                        <td style="display: none"><?php echo $year;  ?></td>
                                        <td><?php echo $month." ".$year; ?></td>
                                        <td> <?php echo $bill_type[$bill['bill_type']]; ?> </td>
                                        <td><?php echo (int)$bill['bill_due']."₺"; ?></td>
                                        <td class="text-center tooltip-demo"><?php if($bill['is_paid']==0){echo "<a data-toggle='tooltip' data-placement='right' title='Ödendi olarak işaretler' class='text-danger' href='".site_url("/spending/pay_bill/").$bill['bill_id']."'><i class='fa fa-times'></i></a> ";}else{echo "<i class='text-success fa fa-check'></i>";} ?></td>  
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
                        <a  data-toggle="modal" data-target="#billModal" style="cursor:pointer;" ><i class="fa fa-plus"></i> Fatura ekle </a>
                    </div>

                </div>
                <!-- /.col-lg-12 -->

                <!-- Spending Modal -->
                <div id="billModal" class="modal fade" role="dialog" >
                    <div class="modal-dialog modal-sm">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header text-center" style="background-color: #5bc0de">
                                <button type="button" class="close" onclick="$('#').val('');" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="color:white">Fatura Ekle</h4>
                            </div>
                            <div class="modal-body">
                            <?php $this->load->view("spending/billModal"); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="$('#').val('');" data-dismiss="modal">Kapat</button>
                            </div>
                        </div>
                    </div>
                </div>
	</div>
</div>
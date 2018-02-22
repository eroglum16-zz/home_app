    
    </div>

    <!-- jQuery -->
    <script src=<?php echo base_url("assets/vendor/jquery/jquery.min.js");?>></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js");?>></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src=<?php echo base_url("assets/vendor/metisMenu/metisMenu.min.js");?>></script>


    <!-- Custom Theme JavaScript -->
    <script src=<?php echo base_url("assets/dist/js/sb-admin-2.js");?>></script>

    <!-- DataTables JavaScript -->
    <script src=<?php echo base_url("assets/vendor/datatables/js/jquery.dataTables.min.js");?>></script>
    <script src=<?php echo base_url("assets/vendor/datatables-plugins/dataTables.bootstrap.min.js");?>></script>
    <script src=<?php echo base_url("assets/datatables-responsive/dataTables.responsive.js");?>></script>

    

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive:true,
            "order": [[2,'desc'],[1,'desc'],[0,'desc']],
            "language": {
                "decimal":        "",
                "emptyTable":     "Tabloda hiç veri yok!",
                "info":           "Toplam _TOTAL_ girdiden _START_ ile _END_ arası gösteriliyor",
                "infoEmpty":      "Toplam 0 girdiden 0 ile 0 arası gösteriliyor",
                "infoFiltered":   "(toplam _MAX_ girdiden filtrelendi)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "_MENU_ girdi gösterilsin",
                "loadingRecords": "Yükleniyor...",
                "processing":     "İşleniyor...",
                "search":         "Ara:",
                "zeroRecords":    "Hiç eşleşen yok!",
                "paginate": {
                    "first":      "İlk",
                    "last":       "Son",
                    "next":       "Sonraki",
                    "previous":   "Önceki"
                },
                "aria": {
                    "sortAscending":  ": sütunu artan sıraya sokmak için etkinleştirin",
                    "sortDescending": ": sütunu azalan sıraya sokmak için etkinleştirin"
                }
            }

        });
    });


    </script>

    

    <script>
                    // tooltip demo
                    $('.tooltip-demo').tooltip({
                        selector: "[data-toggle=tooltip]",
                        container: "body"
                    })
    </script>

    

</body>

</html>

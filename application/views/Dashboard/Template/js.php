<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/main.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/chosen/chosen.jquery.min.js"></script>


    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/init/datatables-init.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/dashboard/js/init/chartjs-init.js"></script> -->
    <script type="text/javascript">
   

        $(document).ready(function() {
           
            
          $('#bootstrap-data-table-export').DataTable();

          $('#semester').change(function(e){
            $('#bootstrap-data-table-export').find('tbody').empty();

            var id_semester = $(this).val();
            if(id_semester != ""){
                $.ajax({
                    url:"<?php echo base_url('Dashboard/Enroll/getEnrollByAjax') ?>",
                    dataType: "JSON",
                    data:{id_semester:id_semester},
                    type: "POST",
                    success: function(data){
                        $("#bootstrap-data-table").find('tbody').empty();
                        var tableContent = '';
                        if(data.status){
                            var i;
                            var a=0;
                            for(i=0;i<data.count;i++){
                                tableContent +=  '<tr>'+
                                        '<td>'+data.message.no[a]+'</td>'+
                                        '<td>'+data.message.namaMatkul[a]+'</td>'+
                                        '<td>'+data.message.jumlahMhs[a]+'</td>'+
                                        '<td><button type="button" class="btn btn-outline-warning"><a href ="<?php echo base_url().'Dashboard/Enroll/enroll/' ?>'+data.message.idSemester[a]+'/'+data.message.idMatkul[a]+'">Enrollment</a></button></td>'+
                                        '</tr>';
                                a= a+1;
                            }
                            
                                $('#enroll-body').append(tableContent);

                                
                        }else{
                            tableContent='<tr><td colspan="4">NO DATA AVAILABLE</td></tr>';
                            $('#enroll-body').append(tableContent);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                    }
                }).done(function (result){
                    $('#bootstrap-data-export').DataTable().ajax.reload();
                    $('#bootstrap-data-export').reload();
                });
                
                
            }

            });
            $("#kat1").on("click", function (e) {
                var checkbox = $(this);
                if (!checkbox.is(":checked")) {
                    // do the confirmation thing here
                    e.preventDefault();
                    return false;
                }
            });
            $("#uts").on("click", function (e) {
                var checkbox = $(this);
                if (!checkbox.is(":checked")) {
                    // do the confirmation thing here
                    e.preventDefault();
                    return false;
                }
            });
            $("#uas").on("click", function (e) {
                var checkbox = $(this);
                if (!checkbox.is(":checked")) {
                    // do the confirmation thing here
                    e.preventDefault();
                    return false;
                }
            });

            $('modal').shown(function(){
                $('#bootstrap-data-export').DataTable();
            });

            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
             });

             
      } );
  </script>

  <script>
      ( function ( $ ) {
            "use strict";
            //doughut chart
            var ctx = document.getElementById( "doughutChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [ {
                            data: [ <?php echo $countbengkel;?>, <?php echo $countpengguna;?> ],
                            backgroundColor: [
                                                "rgba(0, 194, 146,0.9)",
                                                "rgba(0, 194, 146,0.5)",
                                                
                                            ],
                            hoverBackgroundColor: [
                                                "rgba(0, 194, 146,0.9)",
                                                "rgba(0, 194, 146,0.5)",
                                            ]

                                        } ],
                        labels: [
                                        "User",
                                        "Bengkel",
                                    ]
                    },
                    options: {
                        responsive: true
                    }
                } );

           //bar chart
            var ctx = document.getElementById( "barChart" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                    type: 'bar',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ],
                        datasets: [
                            {
                                label: "User",
                                data: [ 
                                    <?php for($i = 1; $i <= 12; $i++) {
                                            if($user[$i]){
                                                echo $user[$i];
                                            }
                                            else{
                                                echo 0;
                                            }
                                            if($i != 12){
                                                echo ", ";
                                            }
                                        }?>],
                                borderColor: "rgba(0, 194, 146, 0.9)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0, 194, 146, 0.5)"
                                        },
                            {
                                label: "Bengkel",
                                data: [ <?php for($i = 1; $i <= 12; $i++) {
                                                if($bengkel[$i]){
                                                    echo $bengkel[$i];
                                                }
                                                else{
                                                    echo 0;
                                                }
                                                if($i != 12){
                                                    echo ", ";
                                                }
                                            }?>],
                                borderColor: "rgba(0,0,0,0.09)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0,0,0,0.07)"
                                        }
                                    ]
                    },
                    options: {
                        scales: {
                            yAxes: [ {
                                ticks: {
                                    beginAtZero: true
                                }
                                            } ]
                        }
                    }
                } );


                 // //line chart
                var ctx = document.getElementById( "lineChart" );
                //ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "January", "February", "March", "April", "May", "June", "July" ],
                        datasets: [
                            {
                                label: "Amount of Transaction",
                                borderColor: "rgba(0, 194, 146, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(0, 194, 146, 0.5)",
                                pointHighlightStroke: "rgba(26,179,148,1)",
                                data: [ <?php for($i = 1; $i <= 6; $i++) {
                                                if($transaction[$i]){
                                                    echo $transaction[$i];
                                                }
                                                else{
                                                    echo 0;
                                                }
                                                if($i != 6){
                                                    echo ", ";
                                                }
                                            }?>]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
        } )( jQuery );
  </script>
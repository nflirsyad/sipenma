
  
  
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  
  <script src="assets/vendors/sweetalert2/sweetalert2.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- Custom js for this page -->
  <script src="assets/js/sweet-alert.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
{{-- <script type="text/javascript">
    $('.delete-confirm').on('click', function (e) {
        e.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
  
</script> --}}
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      new ApexCharts(document.querySelector("#reportsChart"), {
        series: [{
          name: 'Sales',
          data: [31, 40, 28, 51, 42, 82, 56],
        }, {
          name: 'Revenue',
          data: [11, 32, 45, 32, 34, 52, 41]
        }, {
          name: 'Customers',
          data: [15, 11, 32, 18, 9, 24, 11]
        }],
        chart: {
          height: 350,
          type: 'area',
          toolbar: {
            show: false
          },
        },
        markers: {
          size: 4
        },
        colors: ['#4154f1', '#2eca6a', '#ff771d'],
        fill: {
          type: "gradient",
          gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.3,
            opacityTo: 0.4,
            stops: [0, 90, 100]
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
          width: 2
        },
        xaxis: {
          type: 'datetime',
          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        }
      }).render();
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
        legend: {
          data: ['Allocated Budget', 'Actual Spending']
        },
        radar: {
          // shape: 'circle',
          indicator: [{
              name: 'Sales',
              max: 6500
            },
            {
              name: 'Administration',
              max: 16000
            },
            {
              name: 'Information Technology',
              max: 30000
            },
            {
              name: 'Customer Support',
              max: 38000
            },
            {
              name: 'Development',
              max: 52000
            },
            {
              name: 'Marketing',
              max: 25000
            }
          ]
        },
        series: [{
          name: 'Budget vs spending',
          type: 'radar',
          data: [{
              value: [4200, 3000, 20000, 35000, 50000, 18000],
              name: 'Allocated Budget'
            },
            {
              value: [5000, 14000, 28000, 26000, 42000, 21000],
              name: 'Actual Spending'
            }
          ]
        }]
      });
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      echarts.init(document.querySelector("#trafficChart")).setOption({
        tooltip: {
          trigger: 'item'
        },
        legend: {
          top: '5%',
          left: 'center'
        },
        series: [{
          name: 'Access From',
          type: 'pie',
          radius: ['40%', '70%'],
          avoidLabelOverlap: false,
          label: {
            show: false,
            position: 'center'
          },
          emphasis: {
            label: {
              show: true,
              fontSize: '18',
              fontWeight: 'bold'
            }
          },
          labelLine: {
            show: false
          },
          data: [{
              value: 1048,
              name: 'Search Engine'
            },
            {
              value: 735,
              name: 'Direct'
            },
            {
              value: 580,
              name: 'Email'
            },
            {
              value: 484,
              name: 'Union Ads'
            },
            {
              value: 300,
              name: 'Video Ads'
            }
          ]
        }]
      });
    });
  </script>

    <script type="text/javascript">
      $(document).ready(function(){
        var table = $('.jenis_aduan_datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{route('jenis_aduan')}}",
          columns: [
            {data: 'id', name: 'id'},
            {data: 'nama', name: 'nama'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
        });

        $('#form-store').on('submit', function(event){
        event.preventDefault(); 
        var action_url = '{{route('jenis_aduan.store')}}';
 
        $.ajax({
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: action_url,
            data:$(this).serialize(),
            dataType: 'json',
            success: function(data) {
                console.log('success: '+data);
                var html = '';
                if(data.errors)
                {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if(data.success)
                {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#form-store')[0].reset();
                    $('#jenis_aduan_datatable').DataTable().ajax.reload();
                }
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        });
      });
 
    $(document).on('click', '.edit', function(event){
        event.preventDefault(); 
        var id = $(this).attr('id');
        $('#form_result').html('');
 
        $.ajax({
            url :"/jenis_aduan/edit/"+id+"/",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType:"json",
            success:function(data)
            {
                console.log('success: '+data);
                $('#nama').val(data.result.nama);
                $('#hidden_id').val(id);
                $('.modal-title').text('Edit Data');
                $('#action').val('Edit'); 
                $('#formModal').modal('show');
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        })
    });

    $('#form-edit').on('submit', function(event){
        event.preventDefault(); 
        var action_url = '{{route('jenis_aduan.update')}}';
 
        $.ajax({
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: action_url,
            data:$(this).serialize(),
            dataType: 'json',
            success: function(data) {
                console.log('success: '+data);
                var html = '';
                if(data.errors)
                {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if(data.success)
                {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#form-edit')[0].reset();
                    $('#jenis_aduan_datatable').DataTable().ajax.reload();
                    $('#formModal').modal('hide');

                }
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        });
      });

      var jenis_aduan_id;
 
    $(document).on('click', '.delete', function(){
      jenis_aduan_id = $(this).attr('id');
        $('#confirmModal').modal('show');
    });
 
    $('#ok_button').click(function(){
        $.ajax({
            url:"jenis_aduan/destroy/"+jenis_aduan_id,
      
            success:function(data)
            {
              $('#confirmModal').modal('hide');
                $('#jenis_aduan_datatable').DataTable().ajax.reload();
              
            }
        })
    });
  });
      </script>
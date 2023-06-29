


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

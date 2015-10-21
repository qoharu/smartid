<div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
        <script src="<?php echo base_url('assets/js/datauser.js'); ?>"></script>
    <div class="panel panel-default">
        <div class="panel-body">
            <button onclick="window.location.reload()" class="btn btn-success" >REFRESH</button>

            <table class="table table-hover" id="daftarhadir">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID USER</th>
                        <th>Identitas</th>
                        <th>Nama</th>
                        <th>Waktu Login</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id="contentTerdaftar">
                </tbody>
            </table>

        </div>
    </div>

</div>

<?php
    function getMac($p){
        if (($handle = fopen(base_url('assets/csv/mac.csv'), "r")) !== FALSE) {
            $result = FALSE;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($p == $data[0]) {
                    $result = TRUE;
                }
            }
            fclose($handle);
            return $result;
        }
    }



 ?>

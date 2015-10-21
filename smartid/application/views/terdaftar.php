<div class="container-fluid">
    
    <div class="col-md-10 col-md-offset-1">
        
    <div class="panel panel-default">
        <div class="panel-body">
            <button class="btn btn-success" >REFRESH</button>

            <table class="table table-hover" id="daftarhadir">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID USER</th>
                        <th>Identitas</th>
                        <th>Nama</th>
                        <th>Mac</th>
                        <th>Waktu Login</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id="contentDatauser">
                    <?php $i=1; foreach ($daftarhadir as $data): ?>
                        <?php if (getMac($data->mac_address)): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data->id_user ?></td>
                            <td><?php echo $data->no_id ?></td>
                            <td><?php echo $data->nama ?></td>
                            <td><?php echo $data->mac_address ?></td>
                            <td><?php echo $data->waktu_login ?></td>
                            <td><?php echo $data->email ?></td>
                        </tr>    
                        <?php endif ?>
                    <?php endforeach ?>

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

<div class="container-fluid">
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAYXX7gTjzd1g9x3azMRWRQMzK1oPuABWM"></script>
    <div class="col-md-12">
        
    <div class="panel panel-default">
        <div class="panel-body">
            <button class="btn" id="btnDatatiket">DATA TIKET</button>
            <button class="btn" id="btnDatauser">DATA USER</button>

            <table class="table table-hover" id="datauser" style="display:none;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID USER</th>
                        <th>Identitas</th>
                        <th>Nama</th>
                        <th>Mac</th>
                        <th>Waktu Login</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="contentDatauser"></tbody>
            </table>

            <table class="table table-hover" id="datatiket" style="display:none;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID USER</th>
                        <th>Nama</th>
                        <th>Stasiun Asal</th>
                        <th>Stasiun Tujuan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Harga Tiket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="contentDatatiket"></tbody>
            </table>
    </div>
    </div>
</div>

<div id="mapmodal" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">View Location <button class="btn btn-xs btn-success" onclick="refreshmap()">CENTER MAP</button></h4>
      </div>
      <div class="modal-body">
        <div id="googleMap"></div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
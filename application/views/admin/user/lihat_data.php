<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
      <?php
      echo anchor('user/post','Tambah User','class="btn btn-primary"');
      ?>
    <div class="table-responsive mt-4">
      <table class="table table-bordered" id="myTable">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Username</th>
            <th>Level</th>
            <th>Login Terakhir</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          foreach ($record->result() as $r) :
            ?>
            <tr>
            <td><?= $no ?></td>
            <td><?= $r->username ?></td>
			      <td><?= $r->level ?></td>
            <td><?= $r->login_terakhir ?></td>
			

            <td><?= anchor('user/edit/'.$r->id_user,'<i class="mdi mdi-transcribe"></i>', array('title' => 'Edit','class' => 'btn btn-primary')); ?> <?= anchor('user/hapus/'.$r->id_user,'<i class="mdi mdi-delete"></i>', array('title' => 'Hapus', 'class' => 'btn btn-danger', 'onclick'=>"return confirm('Apakah anda yakin ingin menghapus data ini?')"))?></td>
            </tr>
            <?php $no++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

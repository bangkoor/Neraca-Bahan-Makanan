<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3>Laporan</h3>
                  <h4>
                      Neraca Bahan Makanan<hr>
                      Tahun : <?= $tahun ?> Status : <?= $status ?> Quartal : <?= $quartal ?>
                  </h4>
                  <div class="table-responsive mt-4 mb-4">
                  <table class="table table-hover table-borderless" id="myTable" class="myTable" width="100%">
                  <thead class=" thead-light">
                    <tr>
                      <th>No</th>
                      <th>Bahan Makanan</th>
                      <th>Produksi Masukan</th>
                      <th>Produksi Keluaran</th>
                      <th>Perubahan Stok</th>
                      <th>Impor</th>
                      <th>Penyediaan Dalam Negri<br>Sebelum Ekspor</th>
                      <th>Ekspor</th>
                      <th>Penyediaan Dalam Negri</th>
                      <th>Pakan</th>
                      <th>Bibit</th>
                      <th>Diolah Untuk Makanan</th>
                      <th>Diolah Bukan Makanan</th>
                      <th>Tercecer</th>
                      <th>Bahan Makanan</th>
                      <th>Kg/Th</th>
                      <th>Gram/hari</th>
                      <th>Kalori<br>kkal/hari</th>
                      <th>Protein<br>gram/hari</th>
                      <th>Lemak/<br>gram/hari</th>
                   </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($nbm as $f) :
                  $pakan = ($f->penyediaan*$f->kon_pakan)/100;
                  $bibit = ($f->penyediaan*$f->kon_bibit)/100;
                  $makanan = ($f->penyediaan*$f->kon_makanan)/100;
                  $industrial = ($f->angka_industrial*$f->konversi_industrial)/1000;
                  $tercecer = ($f->penyediaan*$f->kon_tercecer)/100;
                $bahan_makanan = $f->penyediaan - $pakan - $bibit - $makanan - $industrial - $tercecer;
                $kg_th = $bahan_makanan/264161.6*1000;
                $gram_hari = $kg_th/365*1000;
                $kalori = $gram_hari/100*$f->bdd/100*$f->kalori;
                $protein = $gram_hari/100*$f->bdd/100*$f->protein;
                $lemak = $gram_hari/100*$f->bdd/100*$f->lemak;
                  ?>
                  
                   <tr>
                    <td><?= $no; ?></td>
                    <td><?= $f->nama_komoditas; ?><br><i><?= $f->nama_inggris; ?></i></td>
                   <td> 
                    <?php if($f->turunan == 1){
                      echo $f->produksi_kotor*$f->konversi_produksi/1000;
                    } else{
                      echo 0;
                    } ?>
                    </td>
                  <td>
                      <?php if($f->turunan == 0){
                      echo $f->produksi_kotor*$f->konversi_produksi/1000;
                    } else{
                      echo 0;
                    } ?>
                  </td>
                  <td>
                      <?= ($f->stok_akhir-$f->stok_awal)*$f->konversi_stok/1000; ?>
                  </td>
                  <td>
                      <?= $f->angka_impor*$f->konversi_impor/1000; ?>
                  </td>
                  <td>
                      <?= $f->penyediaan_sblm; ?>
                  </td>
                  <td>
                      <?= $f->angka_ekspor*$f->konversi_ekspor/1000; ?>
                  </td>
                  <td>
                      <?= $f->penyediaan; ?>
                  </td>
                  <td>
                       <?= $pakan; ?>
                  </td>
                  <td>
                       <?= $bibit; ?>
                  </td>
                  <td>
                       <?= $makanan; ?>
                  </td>
                  <td>
                      <?= $industrial; ?>
                  </td>
                  <td>
                       <?= $tercecer; ?>
                  </td>
                  <td>
                       <?= $bahan_makanan; ?>
                  </td>
                  <td>
                       <?= $kg_th; ?>
                  </td>
                  <td>
                       <?= $gram_hari; ?>
                  </td>
                  <td>
                       <?= $kalori; ?>
                  </td>
                  <td>
                       <?= $protein; ?>
                  </td>
                  <td>
                       <?= $lemak; ?>
                  </td>
                </tr>
                <?php $no++; ?>
               <?php endforeach;  ?>
              </tbody>
            </table>
            </div>
  
                </div>
              </div>
            </div>
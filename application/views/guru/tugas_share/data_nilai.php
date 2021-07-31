<table id="nilai" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIS</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">File</th>
                    <th class="text-center">Tanggal Pengumpulan</th>
                    <th class="text-center">Nilai</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($agama->result() as $result) : ?>
                     <tr>
                       <td class="text-center"><?php echo $no++ ?></td>
                       <td class="text-center"><?php echo $result->nish ?></td>
                       <td class="text-center"><?php echo $result->file ?></td>
                       <td class="text-center"><?php if($result->tanggal_pengumpulan=='0000-00-00 00:00:00'){echo '-';}else{echo $result->tanggal_pengumpulan} ?></td>
                       <td class="text-center">
                         <i class="btn btn-xs btn-primary fa fa-edit edit-data" data-id="<?php echo $result->id ?>" data-placement="top" title="Edit"></i>
                         <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="<?php echo $result->id ?>" id="delete-data" data-placement="top" title="Delete"></i>
                       </td>
                     </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
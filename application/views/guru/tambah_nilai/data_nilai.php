<table id="nilai" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Keterangan</th>
         <th class="text-center">Jenis</th>
         <th class="text-center">kelas</th>
         <th class="text-center">Mapel</th>
         <th class="text-center">Tanggal Dibuat</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($tambah_nilai->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $result->no++ ?></td>
            <td class="text-center"><?php echo $result->Keterangan ?></td>
            <td class="text-center"><?php echo $result->jenis ?></td>
            <td class="text-center"><?php echo $result->kelas ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo $result->tgl_dibuat ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
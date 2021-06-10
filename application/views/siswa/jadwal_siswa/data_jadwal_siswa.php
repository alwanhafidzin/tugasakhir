<table class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kode Jurusan</th>
         <th class="text-center">Jurusan</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($jurusan->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->kode_jurusan ?></td>
            <td class="text-center"><?php echo $result->jurusan ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
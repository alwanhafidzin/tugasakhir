<table id="data_a_permapel" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No Absen</th>
         <th class="text-center">Nis</th>
         <th class="text-center">Nama</th>
         <th class="text-center">Hadir</th>
         <th class="text-center">Izin</th>
         <th class="text-center">Sakit</th>
         <th class="text-center">Alpha</th>
         <th class="text-center">Absen Masuk</th>
         <th class="text-center">Pertemuan</th>
         <th class="text-center">Persentase</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($absensi_permapel->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $result->no_absen ?></td>
            <td class="text-center"><?php echo $result->nis ?></td>
            <td class="text-center"><?php echo $result->nama ?></td>
            <td class="text-center"><?php echo $result->hadir ?></td>
            <td class="text-center"><?php echo $result->izin ?></td>
            <td class="text-center"><?php echo $result->sakit ?></td>
            <td class="text-center"><?php echo $result->alpha ?></td>
            <td class="text-center"><?php echo $result->hadir+$result->izin+$result->sakit+$result->alpha ?></td>
            <td class="text-center"><?php echo $result->tatap_muka ?></td>
            <td class="text-center"><?php echo $result->persentase ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
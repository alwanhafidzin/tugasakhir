<style>
.btn2{
  font-weight:900;
}
</style>
<table id="materi" class="table table-bordered table-striped">
    <thead>
       <tr>
         <th class="text-center">No</th>
         <th class="text-center">Kelas</th>
         <th class="text-center">Mapel</th>
         <th class="text-center">Judul</th>
         <th class="text-center">Tipe</th>
         <th class="text-center">Tanggal Dibagikan</th>
         <th class="text-center">Jadwal</th>
         <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php
          function hariIndo ($hariInggris) {
            switch ($hariInggris) {
              case 'Sunday':
                return 'Minggu';
              case 'Monday':
                return 'Senin';
              case 'Tuesday':
                return 'Selasa';
              case 'Wednesday':
                return 'Rabu';
              case 'Thursday':
                return 'Kamis';
              case 'Friday':
                return 'Jumat';
              case 'Saturday':
                return 'Sabtu';
              default:
                return 'hari tidak valid';
            }
          }
          function url_base64_encode($str = '')
          {
            return strtr(base64_encode($str), '+=/', '.-~');
          }
        ?>
        <?php foreach($materi_share->result() as $result) : ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $result->nama_kelas ?></td>
            <td class="text-center"><?php echo $result->mapel ?></td>
            <td class="text-center"><?php echo $result->judul ?></td>
            <td class="text-center"><?php echo $result->jenis ?></td>
            <td class="text-center"><?php echo hariIndo(date("l", strtotime($result->tgl_dibagikan))).' '.date("d-m-Y H:i:s", strtotime($result->tgl_dibagikan)) ?></td>
            <td class="text-center"><?php echo hariIndo(date("l",strtotime($result->tgl_jadwal))).' '.date("d-m-Y",strtotime($result->tgl_jadwal)).'('.$result->jam_mulai.'-'.$result->jam_selesai.')' ?></td>
            <?php if($result->jenis == "Editor")
            { echo
              '<td class="text-center">
              <i class="btn btn-xs btn-primary fa fa-eye lihat-data" data-id="'.url_base64_encode($result->id_materi).'" data-placement="top" title="Lihat"></i>
              <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="'.$result->id.'" data-placement="top" title="Delete"></i>
              </td>'; 
            } 
            elseif($result->jenis == "Upload")
            {echo 
              '<td class="text-center">
              <a href="'.$result->content.'" target="_blank"><i class="btn btn-xs btn-primary fa fa-eye" data-id="'.$result->id_materi.'" data-placement="top" title="Lihat"></i></a>
              <i class="btn btn-xs btn-danger fas fa-trash-alt hapus-data" data-id="'.$result->id.'" data-placement="top" title="Delete"></i>
              </td>'; 
            } ?>
            
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<script>
    var base_url = "<?php echo base_url();?>";
    $(".lihat-data").click(function(e) {
      id = $(this).data('id');
      location.href = base_url+`materishare/detail/${id}`;
    });
    $(".hapus-data").click(function(e) {
      e.preventDefault();
      id = $(this).data('id');
      swal({
        title: "Apa Anda Yakin?",
        text: "Data yang terhapus,tidak dapat dikembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?=site_url('materishare/crud/delete')?>',
             type: 'POST',
             dataType: 'json',
             data: {
               id: id,
               },
             error: function() {
                alert('Terdapat Kesalahan');
             },
             success: function(data) {
                  swal("Berhasil!", "Data Berhasil Dihapus.", "success");
                  $('#materi').DataTable().clear().destroy();
                  refresh_table();
             }
          });
        } else {
          swal("Dibatalkan", "Data yang dipilih tidak jadi dihapus", "error");
        }
      });
    });
</script>
<script>
    $(".cek_token").click(function(e) {
      e.preventDefault();
      id = $("#hidden_id").val();
      nis = $("#hidden_nis").val();
      token = $("#token_ujian").val();
      $.ajax({
       url: '<?=site_url('ujian/cek_waktu')?>',
       type: 'GET',
       data: {
         id : id
       },
      success: function(response){
        if (response == 'belum')
          Swal1();
        else if (response == 'selesai')
          Swal2();
        else if (response == 'error')
          Swal3();
        else if (response == 'kerjakan')
            $.ajax({
            url: '<?=site_url('ujian/cek_token')?>',
            type: 'GET',
            data: {
                id : id,
                token : token
            },
            success: function(response){
                if (response == 'benar')
                    $.ajax({
                    url: '<?=site_url('ujian/cek_ujian_detail_exist')?>',
                    type: 'GET',
                    data: {
                        id : id,
                        nis:nis,
                    },
                    success: function(response){
                        if (response == 'exists')
                            $.ajax({
                                url: '<?=site_url('ujian/cek_status_ujian')?>',
                                type: 'GET',
                                data: {
                                    id : id,
                                    nis:nis
                                },
                                success: function(response){
                                    if (response == 'selesai')
                                    Swal7();
                                    else if (response == 'lanjut')
                                    Swal6();
                                    },
                                error: function(response){
                                    alert('Tidak Terhubung dengan server,periksa koneksi');
                                }
                            })
                        else if (response == 'create')
                        Swal5();
                        },
                    error: function(response){
                        alert('Tidak Terhubung dengan server,periksa koneksi');
                    }
                    })
                else if (response == 'salah')
                Swal4();
                },
            error: function(response){
                alert('Tidak Terhubung dengan server,periksa koneksi');
            }
            })
        },
      error: function(response){
          alert('Tidak Terhubung dengan server,periksa koneksi');
      }
     })
    });
    function Swal1(){
    swal({
     title: "Tunggu!",
     text: "Belum Waktunya Mengerjakan Quiz yang dipilih.Lihat tanggal pengerjaan!",
     type: "warning",
     showConfirmButton: true
    })
    }
    function Swal2(){
        swal({
        title: "Batas Waktu Berakhir!",
        text: "Batas waktu untuk pengerjaan telah habis.Silahkan hubungi guru pembuat quiz!",
        type: "warning",
        showConfirmButton: true
        })
    }
    function Swal3(){
        swal({
        title: "Error!",
        text: "Sepertinya terjadi kesalahan di server",
        type: "error",
        showConfirmButton: false
        });
    }
    function Swal4(){
        swal({
        title: "Token Salah!",
        text: "Masukkan Token yang benar.Hubungi guru pembuat quiz untuk mendapatkan token!",
        type: "warning",
        showConfirmButton: true
        })
    }
    function Swal5(){
    swal({
        title: "Mulai Mengerjakan?",
        text: "Waktu pengerjaan akan berjalan ketika menekan tombol kerjakan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Kerjakan!",
        cancelButtonText: "Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
            $.ajax({
                url: '<?=site_url('ujian/insert_soal')?>',
                type: 'POST',
                dataType: 'json',
                data: {id: id,
                      nis:nis},
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    get_id_detail_ujian();
                }
            });
            } else {
            swal("Dibatalkan", "Silhakan click kerjakan quiz.untuk memmulai mengerjakan quiz", "error");
            }
        });
    }
    function Swal6(){
    swal({
        title: "Lanjut Mengerjakan?",
        text: "Ujian Sedang berlangsung dan belum diakhiri.lanjutkan pengerjaan soal!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Kerjakan!",
        cancelButtonText: "Batalkan!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
            get_id_detail_ujian();
            } else {
            swal("Dibatalkan", "Silhakan click kerjakan quiz.untuk melanjutkan mengerjakan quiz", "error");
            }
      });
    }
    function Swal7(){
        swal({
        title: "Quiz Telah dikerjakan!",
        text: "Maaf anda sudah mengerjakan quiz ini.tidak dapat mengerjakan lagi!",
        type: "error",
        showConfirmButton: true
        })
    }
    var base_url = "<?php echo base_url();?>";
    function get_id_detail_ujian(){
        $.ajax({
            url: '<?=site_url('ujian/get_id_detail_ujian')?>',
            type: 'GET',
            dataType: 'json',
            data: {
                id : id,
                nis:nis
            },
            success: function(response){
                },
            error: function(response){
                alert('Tidak Terhubung dengan server,periksa koneksi');
            }
        }).done(function(data) {
            swal.close();
            location.href = base_url+`ujian/mulai_ujian/${id}`;
      });
    }
</script>
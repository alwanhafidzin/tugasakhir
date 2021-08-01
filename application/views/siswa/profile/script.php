<?php 
           	$user = $this->ion_auth->user()->row();
            $user_id =$user->id;
            $email = $user->email;
            $username = $user->username;
            $create = $user->created_on;
            $id_name =$this->ion_auth->get_users_groups($user_id)->row()->description;
            $id_user =$this->ion_auth->get_users_groups($user_id)->row()->id;
            foreach($identity->result() as $result){
              $nama = $result->nama;
              $foto = $result->foto;
              if ($id_user==2){
                $j_kelamin = $result->gender;
              }else if($id_user==3){
                $j_k = $result->j_kelamin;
              }else if($id_user==1){
                $j_k = $result->gender;
                if ($j_k=='P'){
                  $j_kelamin = 'Pria';
                }else if ($j_k=='W'){
                  $j_kelamin = 'Wanita';
                }
              }
              $agama = $result->agama;
            }
    ?>
<!-- jquery-validation -->
<script>
   var default_email = "<?php echo $email; ?>";
   $(document).on('click', '#ganti_email', function(e){
       if($('#ganti_email').val()=='ganti'){
           $('#ganti_email').val('batal'); 
           document.getElementById("ganti_email").innerHTML = 'Batal Ganti Email';
           $("#inputEmail").prop("disabled", false);
       }else if($('#ganti_email').val()=='batal'){
           $('#ganti_email').val('ganti'); 
           $("#inputEmail").prop("disabled", true);
           document.getElementById("ganti_email").innerHTML = 'Ganti Email';
           document.getElementById("inputEmail").value = default_email;
       }
   });
   $(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
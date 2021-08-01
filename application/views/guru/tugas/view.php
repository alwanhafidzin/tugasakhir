<style>
  :root {
	--ck-sample-base-spacing: 2em;
	--ck-sample-color-white: #fff;
	--ck-sample-color-green: #279863;
	--ck-sample-color-blue: #1a9aef;
	--ck-sample-container-width: 1285px;
	--ck-sample-sidebar-width: 350px;
	--ck-sample-editor-min-height: 400px;
	--ck-sample-editor-z-index: 10;
  --ck-toolbar-dropdown-max-width: 50vw;
}

/* --------- EDITOR STYLES  ---------------------------------------------------------------------------------------- */

.editor__editable,
/* Classic build. */
main .ck-editor[role='application'] .ck.ck-content,
/* Decoupled document build. */
.ck.editor__editable[role='textbox'],
.ck.ck-editor__editable[role='textbox'],
/* Inline & Balloon build. */
.ck.editor[role='textbox'] {
	width: 100%;
	background: #fff;
	font-size: 1em;
	line-height: 1.6em;
	min-height: var(--ck-sample-editor-min-height);
	padding: 1.5em 2em;
}
.ck.ck-balloon-panel {
  z-index: 10054 !important;
}
.ck.ck-editor__editable {
	background: #fff;
	border: 1px solid hsl(0, 0%, 70%);
	width: 100%;
}

.ck.ck-editor {
	/* To enable toolbar wrapping. */
	width: 100%;
	overflow-x: hidden;
}

/* Because of sidebar `position: relative`, Edge is overriding the outline of a focused editor. */
.ck.ck-editor__editable {
	position: relative;
	z-index: var(--ck-sample-editor-z-index);
}

/* --------- DECOUPLED (DOCUMENT) BUILD. ---------------------------------------------*/
body[data-editor='DecoupledDocumentEditor'] .document-editor__toolbar {
	width: 100%;
}

body[ data-editor='DecoupledDocumentEditor'] .collaboration-demo__editable,
body[ data-editor='DecoupledDocumentEditor'] .row-editor .editor {
	width: 22cm;
	height: 14cm;
	min-height: 14cm;
	padding: 1.75cm 1.5cm;
	margin: 2.5rem;
	border: 1px hsl( 0, 0%, 82.7% ) solid;
	background-color: var(--ck-sample-color-white);
	box-shadow: 0 0 5px hsla( 0, 0%, 0%, .1 );
}

body[ data-editor='DecoupledDocumentEditor'] .row-editor {
	display: flex;
	position: relative;
	justify-content: center;
	overflow-y: auto;
	background-color: #f2f2f2;
	border: 1px solid hsl(0, 0%, 77%);
}

body[data-editor='DecoupledDocumentEditor'] .sidebar {
	background: transparent;
	border: 0;
	box-shadow: none;
}


/* --------- COLLABORATION FEATURES (USERS) ------------------------------------------------------------------------ */
.row-presence {
	width: 100%;
	border: 1px solid hsl(0, 0%, 77%);
	border-bottom: 0;
	background: hsl(0, 0%, 98%);
	padding: var(--ck-spacing-small);

	/* Make `border-bottom` as `box-shadow` to not overlap with the editor border. */
	box-shadow: 0 1px 0 0 hsl(0, 0%, 77%);

	/* Make `z-index` bigger than `.editor` to properly display tooltips. */
	z-index: 20;
}

.ck.ck-presence-list {
    flex: 1;
    padding: 1.25rem .75rem;
}

.presence .ck.ck-presence-list__counter {
	order: 2;
	margin-left: var(--ck-spacing-large)
}

/* --------- REAL TIME COLLABORATION FEATURES (SHARE TOPBAR CONTAINER) --------------------------------------------- */
.collaboration-demo__row {
	display: flex;
	position: relative;
	justify-content: center;
	overflow-y: auto;
	background-color: #f2f2f2;
	border: 1px solid hsl(0, 0%, 77%);
}

body[ data-editor='InlineEditor'] .collaboration-demo__row {
	border: 0;
}

.collaboration-demo__container {
	max-width: var(--ck-sample-container-width);
	margin: 0 auto;
	padding: 1.25rem;
}

.presence, .collaboration-demo__row {
	transition: .2s opacity;
}

.collaboration-demo__topbar {
	background: #fff;
	border: 1px solid var(--ck-color-toolbar-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 0;
    border-radius: 4px 4px 0 0;
}

.collaboration-demo__topbar .btn {
	margin-right: 1em;
	outline-offset: 2px;
	outline-width: 2px;
	background-color: var( --ck-sample-color-blue );
}

.collaboration-demo__topbar .btn:focus,
.collaboration-demo__topbar .btn:hover {
	border-color: var( --ck-sample-color-blue );
}

.collaboration-demo__share {
	display: flex;
	align-items: center;
	padding: 1.25rem .75rem
}

.collaboration-demo__share-description p {
	margin: 0;
	font-weight: bold;
	font-size: 0.9em;
}

.collaboration-demo__share input {
	height: auto;
	font-size: 0.9em;
	min-width: 220px;
	margin: 0 10px;
	border-radius: 4px;
	border: 1px solid var(--ck-color-toolbar-border)
}

.collaboration-demo__share button,
.collaboration-demo__share input {
	height: 40px;
	padding: 5px 10px;
}

.collaboration-demo__share button {
	position: relative;
}

.collaboration-demo__share button:focus {
	outline: none;
}

.collaboration-demo__share button[data-tooltip]::before,
.collaboration-demo__share button[data-tooltip]::after {
	position: absolute;
    visibility: hidden;
    opacity: 0;
    pointer-events: none;
    transition: all .15s cubic-bezier(.5,1,.25,1);
	z-index: 1;
}

.collaboration-demo__share button[data-tooltip]::before {
	content: attr(data-tooltip);
    padding: 5px 15px;
    border-radius: 3px;
    background: #111;
    color: #fff;
    text-align: center;
    font-size: 11px;
	top: 100%;
    left: 50%;
    margin-top: 5px;
    transform: translateX(-50%);
}

.collaboration-demo__share button[data-tooltip]::after {
    content: '';
	border: 5px solid transparent;
    width: 0;
    font-size: 0;
    line-height: 0;
	top: 100%;
    left: 50%;
    transform: translateX(-50%);
    border-bottom: 5px solid #111;
	border-top: none;
}

.collaboration-demo__share button[data-tooltip]:hover:before,
.collaboration-demo__share button[data-tooltip]:hover:after {
	visibility: visible;
    opacity: 1;
}

.collaboration-demo--ready {
	overflow: visible;
	height: auto;
}

.collaboration-demo--ready .presence,
.collaboration-demo--ready .collaboration-demo__row {
	opacity: 1;
}

/* --------- PAGINATION FEATURE ------------------------------------------------------------------------------------ */

/* Pagination view line must be stacked at least at the same level as the editor,
   otherwise it will be hidden underneath. */
.ck.ck-pagination-view-line {
	z-index: var(--ck-sample-editor-z-index);
}

/* --------- SAMPLE GENERIC STYLES (not related to CKEditor) ------------------------------------------------------- */

.centered {
	/* Hide overlapping comments. */
	overflow: hidden;
	max-width: var(--ck-sample-container-width);
	margin: 0 auto;
	padding: 0 0.5em;
}

.row {
	display: flex;
	position: relative;
}

/* .btn {
	cursor: pointer;
	padding: 8px 16px;
	font-size: 1rem;
	user-select: none;
	border-radius: 4px;
	transition: color .2s ease-in-out,background-color .2s ease-in-out,border-color .2s ease-in-out,opacity .2s ease-in-out;
	background-color: var(--ck-sample-color-button-blue);
	border-color: var(--ck-sample-color-button-blue);
	color: var(--ck-sample-color-white);
	display: inline-block;
} */

/* .btn--tiny {
	padding: 6px 12px;
	font-size: .8rem;
} */
.mgin {
	margin-left : 1.6em;
	margin-right : 1.6em;
}
.mgin2{
	width:96%;
}
.tright{
	margin-left: 1.6em;
}

/* --------- RWD --------------------------------------------------------------------------------------------------- */
@media screen and ( max-width: 800px ) {
	:root {
		--ck-sample-base-spacing: 1em;
	}

	header h1 {
		width: 100%;
	}

	header h1 img {
		height: 40px;
	}

	header nav ul {
		text-align: right;
	}

	main .message h2 {
		font-size: 1.5em;
	}
	.mgin {
	margin-left : 0.5em;
	margin-right : 0.5em;
  }
  .mgin2{
	width:97%;
}
}

  </style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Tugas Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Sekolah</a></li>
              <li class="breadcrumb-item active">Jurusan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
             <?php foreach($tahun_aktif->result() as $result) :?>
             <?php 
               $id = $result->id;
               $tahun_pilih = $result->tahun_akademik;
               $semester_pilih = $result->semester;
              ?>
             <?php endforeach;?>
            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
                <button class="btn btn-primary bottom col-sm-12 col-md-3 margin"data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i> Buat Tugas</button>
                <!-- <div class="centered">
                  <div class="row row-editor">
                    <div class="editor">
                  </div>
                </div>
		         	  </div> -->
              </br></br>
              <!-- <div class="row">
              <div class="col-md-2"><b>Filter Data:</b></div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_t_akademik" id="filter_t_akademik" style="width: 100%;">
                    <option value="">Filter Tahun Akademik</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php foreach($tahun_akademik as $row) : ?>
                      <option value="<?php echo $row->id ?>"<?php if($row->id==$id){ echo 'selected';}?>><?php echo $row->tahun_akademik ?></option>
                    <?php endforeach ?>
                  </select>
                 </div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_semester" id="filter_semester" style="width: 100%;">
                    <option value="">Filter Semester</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php 
                    if ($semester_pilih=='ganjil'){
                      echo '<option value="ganjil" selected>Ganjil</option>';
                    }else{
                      echo '<option value="ganjil">Ganjil</option>';
                    }
                    if ($semester_pilih=='genap'){
                      echo '<option value="genap" selected>Genap</option>';
                    }else{
                      echo '<option value="genap">Genap</option>';
                    }
                    ?>
                  </select>
                 </div>
                 <div class="col-md-3 form-group">
                  <select class="form-control select2" name="filter_mapel" id="filter_mapel" style="width: 100%;">
                    <option value="">Filter Mapel</option>
                    <option value="0">Perlihatkan Semua</option>
                    <?php
                      $first = true;
                     foreach($jadwal_guru_absen as $row) : ?>
                      <?php 
                       if ( $first )
                       {
                          echo '<option value="'.$row->kode_mapel.'" selected>'.$row->mapel.'</option>';
                           $first = false;
                       }
                       else
                       {
                          echo '<option value="'.$row->kode_mapel.'">'.$row->mapel.'</option>';
                       }
                   
                      ?>
                    <?php endforeach ?>
                  </select>
                 </div>
            </div> -->
                <div id="tampil">
                <!-- Data tampil disini -->
                </div>
              </div>
              <!-- /.card-body -->
            </div>

      <div class="modal fade" id="modal-tambah">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Tugas Baru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="judul">Judul Tugas</label>
                    <input type="text" autocomplete="off"class="form-control" name="judul-tbh" id="judul-tbh" placeholder="Masukkan Judul Tugas">
                </div>
                <div class="form-group">
                  <label>Mapel</label>
                  <select class="form-control select2" name="cc" id="kode_mapel-tbh" style="width: 100%;">
                    <option value="">Pilih Mapel</option>
                    <?php
                      $first = true;
                     foreach($jadwal_guru_absen as $row) : ?>
                      <?php 
                       if ( $first )
                       {
                          echo '<option value="'.$row->kode_mapel.'" selected>'.$row->mapel.'</option>';
                           $first = false;
                       }
                       else
                       {
                          echo '<option value="'.$row->kode_mapel.'">'.$row->mapel.'</option>';
                       }
                   
                      ?>
                    <?php endforeach ?>
                  </select>
                </div>
                <label for="isi">Keterangan</label>
                <div class="centered">
                  <div class="row row-editor">
                    <div class="editor">
                  </div>
                </div>
		         	  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" id="cancel" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit-tambah" id="submit_save" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-edit">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Materi Upload</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <input type="hidden" name="id" id="id-edit"/>
            <div class="col-lg-12">
            <div class="form-group">
                    <label for="judul">Judul Tugas</label>
                    <input type="text" autocomplete="off"class="form-control" name="judul" id="judul-edit" placeholder="Masukkan Judul Tugas">
                </div>
                <div class="form-group">
                  <label>Mapel</label>
                  <select class="form-control select2" name="" id="kode_mapel-edit" style="width: 100%;">
                    <option value="">Pilih Mapel</option>
                    <?php foreach($jadwal_guru_absen as $row) : ?>
                      <option value="<?php echo $row->kode_mapel ?>"><?php echo $row->mapel ?></option>
                     <?php endforeach ?>
                  </select>
                </div>
                <label for="isi">Keterangan</label>
                <div class="centered">
                  <div class="row row-editor">
                    <div class="editor-edit">
                  </div>
                </div>
		         	  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" id="submit_edit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          <!-- /.modal-content -->
      </div>
        <!-- /.modal-dialog -->
      </div>


            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
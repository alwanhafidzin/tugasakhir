<style>
/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

:root {
	--ck-sample-base-spacing: 2em;
	--ck-sample-color-white: #fff;
	--ck-sample-color-green: #279863;
}
.centered {
	max-width: 100%;
	margin: 0 auto;
	padding: 0 var(--ck-sample-base-spacing);
}


/* --------- MAIN ------------------------------------------------------------------------------- */

main .message {
	padding: 0 0 var(--ck-sample-base-spacing);
	background: var(--ck-sample-color-green);
	color: var(--ck-sample-color-white);
}

main .message::after {
	content: "";
	z-index: -1;
	display: block;
	height: 10em;
	width: 100%;
	background: var(--ck-sample-color-green);
	position: absolute;
	left: 0;
}

main .message h1 {
	padding-top: var(--ck-sample-base-spacing);
	margin: 0 0 1em;
	font-size: 2.2em;
}

main .message p {
	font-size: 1.1em;
	line-height: 1.6em;
}

main .message p a {
	color: var(--ck-sample-color-white);
}

main #editor {
	background: var(--ck-sample-color-white);
	box-shadow: 2px 2px 2px rgba(0,0,0,.1);
	border: 1px solid #DFE4E6;			
	border-bottom-color: #cdd0d2;
	border-right-color: #cdd0d2;
}

main .ck.ck-editor {
	box-shadow: 2px 2px 2px rgba(0,0,0,.1);
}

main .ck.ck-content {
	font-size: 1em;
	line-height: 1.6em;
	margin-bottom: 0.8em;
	min-height: 200px;
	padding: 1.5em 2em;
}

main #references {
	margin: 4em 0 var(--ck-sample-base-spacing);
	display: grid;
	grid-template-columns: repeat( auto-fit, minmax(320px, 1fr) );
	grid-gap: var(--ck-sample-base-spacing);
}

main #references > section {
	background: var(--ck-sample-color-white);
	border-radius: 2px;
	border: 1px solid #DFE4E6;			
	padding: var(--ck-sample-base-spacing);
	line-height: 1.8em;

	display: flex;
	flex-flow: column nowrap;
	justify-content: space-between;
}

main #references > section h2 {
	margin: .5em 0;
}

main #references > section p:first-of-type {
	flex: 1 0 auto;
}

main #references > section p:last-child {
	margin: calc(.25*var(--ck-sample-base-spacing)) 0 0;
}

main #references > section p:last-child a {
	background: #38A5EE;
	border-radius: 5px;
	padding: .4em 1em;
	color: var(--ck-sample-color-white);
	text-decoration: none;
	font-weight: bold;
	display: block;
	text-align: center;
}

main #references > section p:last-child a:hover {
	background: #218cd4;
}

/* --------- MAIN / DOCUMENT EDITOR --------------------------------------------------------------- */

main .document-editor {
	border: 1px solid #DFE4E6;
	border-bottom-color: #cdd0d2;
	border-right-color: #cdd0d2;
	border-radius: 2px;
	max-height: 700px;
	display: flex;
	flex-flow: column nowrap;
	box-shadow: 2px 2px 2px rgba(0,0,0,.1);
}

main .toolbar-container {
	z-index: 1;
	position: relative;
	box-shadow: 2px 2px 1px rgba(0,0,0,.05);
}

main .toolbar-container .ck.ck-toolbar {
	border-top-width: 0;
	border-left-width: 0;
	border-right-width: 0;
	border-radius: 0;
}

main .content-container {
	padding: var(--ck-sample-base-spacing);
	background: #eee;
	overflow-y: scroll;
}

main .content-container #editor {
	border-top-left-radius: 0;
	border-top-right-radius: 0;

	width: 22cm;
	min-height: 8cm;
    max-height:10cm;
	padding: 1cm 1cm 2cm;
	margin: 0 auto;
	box-shadow: 2px 2px 1px rgba(0,0,0,.05);
}


</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Agama SMAN 1 SOOKO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Sekolah</a></li>
              <li class="breadcrumb-item active">Agama</li>
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

            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body">
              <main>
	<div class="centered">
		<div class="document-editor">
                <div id="tampil">
                <!-- Data tampil disini -->
                </div>
              </div>
              <main>
			<div class="toolbar-container"></div>
			<div class="content-container">
				<div id="editor">
				
				</div>
			</div>
		</div>
	</div>
</main>
              <!-- /.card-body -->
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


  
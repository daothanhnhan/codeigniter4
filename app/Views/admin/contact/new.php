<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section>
      <!-- <p>show info</p> -->
    	<?= session()->getFlashdata('error') ?>
      
      

      <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php elseif (session('errors') !== null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php if (is_array(session('errors'))) : ?>
                            <?php foreach (session('errors') as $error) : ?>
                                <?= $error ?>
                                <br>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?= session('errors') ?>
                        <?php endif ?>
                    </div>
                <?php endif ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Lấp đầy <small>Thông tin</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form id="quickForm" method="post" action="/admin/page/add" enctype="multipart/form-data">
              	<?= csrf_field() ?>
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên bài viết</label>
                    <input type="text" name="title" value="<?= set_value('title') ?>" class="form-control" id="" placeholder="" required="" onkeyup="set_title_seo(this.value)">
                  </div>
                	
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn ảnh</label>
                    <input type="file" name="image" value="" class="form-control" id="fileUpload" placeholder="" >
                  </div>

                  <div class="form-control" style="height: auto;">
                    <div id="image-holder">
                      
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea class="form-control" name="description"><?= set_value('description') ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung</label>
                    <textarea class="form-control" id="editor1" name="content"><?= set_value('content') ?></textarea>
                  </div>


                </div>

                <div class="card-header" style="background: #007bff;color: #fff;">
                  <h3 class="card-title">Thông tin <small>SEO</small></h3>
                </div>

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề trang</label>
                    <input type="text" name="title_seo" value="<?= set_value('title_seo') ?>" class="form-control" id="title_seo" placeholder="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Thẻ mô tả</label>
                    <textarea class="form-control" name="des_seo"><?= set_value('description') ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Keyword</label>
                    <input type="text" name="keyword" value="<?= set_value('keyword') ?>" class="form-control" id="" placeholder="">
                  </div>
                </div>

                <div class="card-header" style="background: #007bff;color: #fff;">
                  <h3 class="card-title">Trạng thái <small></small></h3>
                </div>

                <div class="card-body">
                  <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="state" value="1" checked="">
                        <label class="form-check-label">Hiển thị</label>
                      </div>
                  </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?= $this->endSection() ?>

<?= $this->section('content_js'); ?>
<script>
    CKEDITOR.replace( 'editor1' );
</script>

<script>
function set_title_seo (text) {
  // alert(text);
  document.getElementById("title_seo").value = text;
}
</script>
<?= $this->endSection() ?>
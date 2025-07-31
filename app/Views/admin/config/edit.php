<?= $this->extend('admin/layout') ?>

<?= $this->section('content_css') ?>
<style>
#image-holder img {
  width: 300px;
}
.image-config {
  height: auto !important;
}
.image-config img {
  width: 200px;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa thông tin website</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sửa thông tin website</li>
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

              <form id="quickForm" method="post" action="/admin/config" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PATCH">
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên website</label>
                    <input type="text" name="title" value="<?= esc($config['title']) ?>" class="form-control" id="" placeholder="" required="">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keyword</label>
                    <input type="text" name="keyword" value="<?= esc($config['keyword']) ?>" class="form-control" id="" placeholder="">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea class="form-control" name="description"><?= esc($config['description']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Giới thiệu</label>
                    <textarea class="form-control" name="intro"><?= esc($config['intro']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn ảnh logo</label>
                    <input type="file" name="logo" class="form-control" id="fileUpload" >
                  </div>

                  <div class="form-control" style="height: auto;">
                    <div id="image-holder">
                      <?= img(['src' => '/uploads/config/'.$config['logo'], 'width' => '300', 'style' => '']) ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn ảnh icon</label>
                    <input type="file" name="icon" value="" class="form-control" id="fileUpload_icon" placeholder="" >
                  </div>

                  <div class="form-control" style="height: auto;">
                    <div id="image-holder-icon" class="image-config">
                      <?= img(['src' => '/uploads/config/'.$config['icon'], 'width' => '200', 'style' => '']) ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn ảnh banner 1</label>
                    <input type="file" name="banner_1" value="" class="form-control" id="fileUpload_banner1" placeholder="" >
                  </div>

                  <div class="form-control" style="height: auto;">
                    <div id="image-holder-banner1" class="image-config">
                      <?= img(['src' => '/uploads/config/'.$config['banner_1'], 'width' => '200', 'style' => '']) ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn ảnh banner 2</label>
                    <input type="file" name="banner_2" value="" class="form-control" id="fileUpload_banner2" placeholder="" >
                  </div>

                  <div class="form-control" style="height: auto;">
                    <div id="image-holder-banner2" class="image-config">
                      <?= img(['src' => '/uploads/config/'.$config['banner_2'], 'width' => '200', 'style' => '']) ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn ảnh banner 3</label>
                    <input type="file" name="banner_3" value="" class="form-control" id="fileUpload_banner3" placeholder="" >
                  </div>

                  <div class="form-control" style="height: auto;">
                    <div id="image-holder-banner3" class="image-config">
                      <?= img(['src' => '/uploads/config/'.$config['banner_3'], 'width' => '200', 'style' => '']) ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ liên hệ 1</label>
                    <textarea class="form-control" name="content_home_1"><?= esc($config['content_home_1']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ liên hệ 2</label>
                    <textarea class="form-control" name="content_home_2"><?= esc($config['content_home_2']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ liên hệ 3</label>
                    <textarea class="form-control" name="content_home_3"><?= esc($config['content_home_3']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email liên hệ 1</label>
                    <textarea class="form-control" name="content_home_4"><?= esc($config['content_home_4']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email liên hệ 2</label>
                    <textarea class="form-control" name="content_home_5"><?= esc($config['content_home_5']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email liên hệ 3</label>
                    <textarea class="form-control" name="content_home_6"><?= esc($config['content_home_6']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Điện thoại liên hệ 1</label>
                    <textarea class="form-control" name="content_home_7"><?= esc($config['content_home_7']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Điện thoại liên hệ 2</label>
                    <textarea class="form-control" name="content_home_8"><?= esc($config['content_home_8']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Điện thoại liên hệ 3</label>
                    <textarea class="form-control" name="content_home_9"><?= esc($config['content_home_9']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Bản đồ</label>
                    <textarea class="form-control" name="content_home_10"><?= esc($config['content_home_10']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mã nhúng head</label>
                    <textarea class="form-control" name="embed_code_header"><?= esc($config['embed_code_header']) ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mã nhúng footer</label>
                    <textarea class="form-control" name="embed_code_footer"><?= esc($config['embed_code_footer']) ?></textarea>
                  </div>

                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
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
<script>
    CKEDITOR.replace( 'editor1' );
</script>
<?= $this->endSection() ?>

<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm Menu</li>
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

              <form id="quickForm" method="post" action="/admin/menu/add" enctype="multipart/form-data">
              	<?= csrf_field() ?>
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên menu</label>
                    <input type="text" name="name" value="<?= set_value('name') ?>" class="form-control" id="" placeholder="" required="">
                  </div>

                  <?= view_cell('MenuCell', 'menu_id=0, action=add') ?>

                  <div class="form-group">
                    <label for="exampleInputEmail1">loại menu</label>
                    <select name="type" class="form-control" onchange="chon_type(value)">
                      <option value="0">Link cụ thể</option>
                      <?php foreach ($menu_types as $menu_type) : ?>
                      <option value="<?= $menu_type['model'] ?>"><?= $menu_type['name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group" id="type_id">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text" name="link" value="<?= set_value('link') ?>" class="form-control">
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

                  <div class="form-group">
                    <label for="exampleInputEmail1">Thứ tự</label>
                    <input type="number" name="sort" class="form-control" id="" placeholder="" value="0" required="">
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
<script>
    CKEDITOR.replace( 'editor1' );
</script>
<?= $this->endSection() ?>

<?= $this->section('content_js') ?>
<script>
function chon_type (type) {
  // alert(id);
  $.ajax({
    url: '/admin/menu/get-select-type/'+type,
    data: {
      name: 'tuan'
    },
    dataType: 'html',
    success: function(response) {
      $('#type_id').html(response);
    }
  });
}
</script>
<?= $this->endSection() ?>

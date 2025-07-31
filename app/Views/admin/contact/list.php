<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách liên hệ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Liên hệ</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- <section class="content-header">
      <a href="/admin/page/add" class="btn btn-primary btn-flat">Thêm Page</a>
    </section> -->

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách</h3>

                <div class="card-tools d-none">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên</th>
                      <th>Điện thoại</th>
                      <th>Email</th>
                      <th>Ghi chú</th>
                      <th>Thới điểm</th>
                      <th>Xóa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt = 0; ?>
                    <?php foreach ($contacts as $contact): ?>
                    <tr>
                      <td><?php $stt++;echo $stt; ?></td>
                      <td><?= esc($contact['name']) ?></td>
                      <td><?= esc($contact['phone']) ?></td>
                      <td><?= esc($contact['email']) ?></td>
                      <td><?= esc($contact['note']) ?></td>
                      <td><?= esc($contact['created_at']) ?></td>

                      <td>
                        <form action="/admin/contact/delete/<?= $contact['id'] ?>" method="post" style="display: inline;" class="form-delete">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit">Delete</button>
                        </form>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>

      <div class="text-center">
        <?= $pager->links() ?>
      </div>
      
    </section>
  </div>

<?= $this->endSection() ?>
 
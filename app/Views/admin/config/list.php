<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
      <a href="/admin/page/add" class="btn btn-primary btn-flat">Thêm Page</a>
    </section>

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách</h3>

                <div class="card-tools">
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
                      <th>Tên trang</th>
                      <th>Người tạo</th>
                      <th>Ngày cập nhật</th>
                      <th>Trạng thái</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt = 0; ?>
                    <?php foreach ($pages as $page): ?>
                    <tr>
                      <td><?php $stt++;echo $stt; ?></td>
                      <td><a href="/admin/page/edit/<?= $page['id'] ?>"><?= esc($page['title']) ?></a></td>
                      <td><?= getInfoUser($page['creator_id'])['username'] ?></td>
                      <td><?= esc($page['updated_at']) ?></td>
                      <td><?= getState($page['state']) ?></td>

                      <td>
                        <a href="/admin/page/edit/<?= $page['id'] ?>">Edit</a> |
                        <form action="/admin/page/delete/<?= $page['id'] ?>" method="post" style="display: inline;">
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
 
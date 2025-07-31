<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách video</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Video</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
      <a href="/admin/video/add" class="btn btn-primary btn-flat">Thêm video</a>
    </section>

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
                      <th>Ảnh</th>
                      <th>Video</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $stt = 0; ?>
                    <?php foreach ($videos as $video): ?>
                      <?php 
                      $video_new = preg_replace('/width="\d+"/', 'width="300"', $video['content']);
                      // $video_new = preg_replace('/height="\d+"/', 'height="100"', $video_new);
                      ?>
                    <tr>
                      <td><?php $stt++;echo $stt; ?></td>
                      
                      <td><?= img(['src' => '/uploads/video/'.$video['image'], 'width' => '200', 'style' => '']) ?></td>
                      <td><?= $video_new ?></td>

                      <td>
                        <a href="/admin/video/edit/<?= $video['id'] ?>">Edit</a> |
                        <form action="/admin/video/delete/<?= $video['id'] ?>" method="post" style="display: inline;">
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
 
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm sản phẩm</li>
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

              <form id="quickForm" method="post" action="/admin/product/add" enctype="multipart/form-data">
              	<?= csrf_field() ?>
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" name="title" value="<?= set_value('title') ?>" class="form-control" id="" placeholder="" required="" onkeyup="set_title_seo(this.value)">
                  </div>

                  <?= view_cell('CategoryForProductCell', 'productcat_id=[], action=add') ?>
                	
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn ảnh đại diện</label>
                    <input type="file" name="image" value="" class="form-control" id="fileUpload" placeholder="" >
                  </div>

                  <div class="form-control" style="height: auto;">
                    <div id="image-holder">
                      
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn ảnh phụ</label>
                  </div>

                  <div class="input-images"></div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea class="form-control" id="editor1" name="description"><?= set_value('description') ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung</label>
                    <textarea class="form-control" id="editor2" name="content"><?= set_value('content') ?></textarea>
                  </div>


                </div>

                <div class="card-header" style="background: #007bff;color: #fff;">
                  <h3 class="card-title">Quản lý <small>tùy chọn</small></h3>
                </div>

                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Giá gốc</label>
                        <input type="text" name="price" value="<?= set_value('price') ?>" class="form-control" id="price" placeholder="" onkeyup="money(this)">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Giá bán</label>
                        <input type="text" name="price_sale" value="<?= set_value('price_sale') ?>" class="form-control" id="price_sale" placeholder="" onkeyup="money(this)">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mã sản phẩm</label>
                        <input type="text" name="product_code" value="<?= set_value('product_code') ?>" class="form-control" id="" placeholder="">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mẫu mã, kiểu dáng</label>
                        <input type="text" name="product_shape" value="<?= set_value('product_shape') ?>" class="form-control" id="" placeholder="">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Thương hiệu</label>
                        <input type="text" name="product_brand" value="<?= set_value('product_brand') ?>" class="form-control" id="" placeholder="">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Xuất xứ</label>
                        <input type="text" name="product_origin" value="<?= set_value('product_origin') ?>" class="form-control" id="" placeholder="">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kích cỡ</label>
                        <input type="text" name="product_size" value="<?= set_value('product_size') ?>" class="form-control" id="" placeholder="">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Giới tính</label>
                        <select class="form-control" name="product_text_1">
                          <option value="0">Nữ</option>
                          <option value="1">Nam</option>
                        </select>
                      </div>
                    </div>

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

                  <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="product_new" value="1" >
                        <label class="form-check-label">Sản phẩm mới</label>
                      </div>
                  </div>

                  <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="product_hot" value="1" >
                        <label class="form-check-label">Sản phẩm hot</label>
                      </div>
                  </div>

                  <div class="form-group d-none">
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

<?= $this->endSection() ?>

<?= $this->section('content_js') ?>
<script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
</script>

<script>
$(function () {
  $('.input-images').imageUploader({
        imagesInputName: 'image_sub',
        extensions: ['.jpg','.jpeg','.png','.gif','.svg', '.PNG', 'JPG', 'JPEG', '.GIF', '.SVG'],
          
          maxSize: undefined,
          maxFiles: undefined,
          label:'Drag & Drop files here or click to browse'
    });
});
</script>

<script>
function money (data) {
    // alert('phi');
    var so = data.value;
    var rong = data.value;
    so = so.split(",").join("");
    so = so.replace(/[^\d]/,'');
    so = Number(so);

    if (rong === "") {
        document.getElementById(data.id).value = "";
    } else {
        document.getElementById(data.id).value = number_format(so);
    }      
}

function number_format (number, decimals, dec_point, thousands_sep) {
    var n = number, prec = decimals;

    var toFixedFix = function (n,prec) {
        var k = Math.pow(10,prec);
        return (Math.round(n*k)/k).toString();
    };

    n = !isFinite(+n) ? 0 : +n;
    prec = !isFinite(+prec) ? 0 : Math.abs(prec);
    var sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep;
    var dec = (typeof dec_point === 'undefined') ? '.' : dec_point;

    var s = (prec > 0) ? toFixedFix(n, prec) : toFixedFix(Math.round(n), prec); 
    //fix for IE parseFloat(0.55).toFixed(0) = 0;

    var abs = toFixedFix(Math.abs(n), prec);
    var _, i;

    if (abs >= 1000) {
        _ = abs.split(/\D/);
        i = _[0].length % 3 || 3;

        _[0] = s.slice(0,i + (n < 0)) +
               _[0].slice(i).replace(/(\d{3})/g, sep+'$1');
        s = _.join(dec);
    } else {
        s = s.replace('.', dec);
    }

    var decPos = s.indexOf(dec);
    if (prec >= 1 && decPos !== -1 && (s.length-decPos-1) < prec) {
        s += new Array(prec-(s.length-decPos-1)).join(0)+'0';
    }
    else if (prec >= 1 && decPos === -1) {
        s += dec+new Array(prec).join(0)+'0';
    }
    return s; 
    // alert(s);
}
</script>
<?= $this->endSection() ?>
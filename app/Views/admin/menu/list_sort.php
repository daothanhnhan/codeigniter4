<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
      <a href="/admin/menu/add" class="btn btn-primary btn-flat">Thêm Menu</a>
    </section>

    <section class="content-header">
      <a href="/admin/menus" class="btn btn-primary btn-flat">Danh sách Menu</a>
    </section>

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
              <div class="card-body table-responsive p-0" style="padding-right: 10px;">
                <div class="cf nestable-lists">

        <div class="dd" id="nestable3">
            <?= view_cell('MenuListSortCell') ?>
        </div>

    </div>

    <textarea id="nestable-output" class="d-none"></textarea>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>

      <div class="text-center">
        
      </div>
      
    </section>
  </div>

<?= $this->endSection() ?>

<?= $this->section('content_js') ?>
<script>
$(document).ready(function()
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            sap_xep(window.JSON.stringify(list.nestable('serialize')));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    // $('#nestable3').nestable();
    // // activate Nestable for list 3
    $('#nestable3').nestable({
        // group: 1
    })
    .on('change', updateOutput);

    // // output initial serialised data
    updateOutput($('#nestable3').data('output', $('#nestable-output')));

});
</script>
<script>
    function sap_xep (json) {
        // const xhttp = new XMLHttpRequest();
        //   xhttp.onload = function() {
        //     // document.getElementById("demo").innerHTML = this.responseText;
        //         // alert(this.responseText);
        //     }
        //   xhttp.open("GET", "/functions/ajax/sap_xep.php?json="+json, true);
        //   xhttp.send();

        $.ajax({
          url: '/admin/menu/sort-ajax',
          data: {
            name: json,
            // csrf_test_name: '<?= csrf_hash() ?>'
          },
          // dataType: 'json',
          // dataType: 'html',
          dataType: 'text',
          type: 'POST',
          success: function(response) {
            // $('#result').html(response);
            // alert(response);
            console.log(response);
          }
        });
    }
</script>
<?= $this->endSection() ?>
 
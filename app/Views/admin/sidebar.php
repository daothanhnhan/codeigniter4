<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin/dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session('user_name') ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline d-none">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/<?= ADMIN_URL ?>/manager" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>

          <li class="nav-header">MULTI LEVEL CONTROL</li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/users" class="nav-link <?= $menu_active == 'user' ? 'active' : '' ?>">
              <i class="fas fa-user-friends nav-icon"></i>
              <p>Tài khoản</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/slides" class="nav-link  <?= $menu_active == 'slide' ? 'active' : '' ?>">
              <i class="far fa-images nav-icon"></i>
              <p>Slide</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/pages" class="nav-link <?= $menu_active == 'page' ? 'active' : '' ?>">
              <i class="fas fa-file-alt nav-icon"></i>
              <p>Trang Page</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/newscats" class="nav-link <?= $menu_active == 'newscat' ? 'active' : '' ?>">
              <i class="fas fa-newspaper nav-icon"></i>
              <p>Danh mục bài Post</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/posts" class="nav-link <?= $menu_active == 'post' ? 'active' : '' ?>">
              <i class="fas fa-newspaper nav-icon"></i>
              <p>Danh sách bài Post</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/productcats" class="nav-link <?= $menu_active == 'productcat' ? 'active' : '' ?>">
              <i class="fas fa-box-open nav-icon"></i>
              <p>Danh mục sản phẩm</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/products" class="nav-link <?= $menu_active == 'product' ? 'active' : '' ?>">
              <i class="fas fa-box-open nav-icon"></i>
              <p>Danh sách sản phẩm</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/carts" class="nav-link <?= $menu_active == 'cart' ? 'active' : '' ?>">
              <i class="fas fa-shopping-cart nav-icon"></i>
              <p>Đơn hàng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/config" class="nav-link <?= $menu_active == 'config' ? 'active' : '' ?>">
              <i class="fas fa-tag nav-icon"></i>
              <p>Cấu hình Website</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/menus" class="nav-link <?= $menu_active == 'menu' ? 'active' : '' ?>">
              <i class="fas fa-th-list nav-icon"></i>
              <p>Menu</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/contacts" class="nav-link <?= $menu_active == 'contact' ? 'active' : '' ?>">
              <i class="fas fa-address-card nav-icon"></i>
              <p>Liên hệ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/<?= ADMIN_URL ?>/videos" class="nav-link <?= $menu_active == 'video' ? 'active' : '' ?>">
              <i class="fas fa-video nav-icon"></i>
              <p>Video</p>
            </a>
          </li>



          <li class="nav-item d-none">
            <a href="/<?= ADMIN_URL ?>/" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Slide
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item d-none">
            <a href="/admin/" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <!-- <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
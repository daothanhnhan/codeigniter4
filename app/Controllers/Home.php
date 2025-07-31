<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    protected $helpers = ['form', 'tuan', 'filesystem', 'html', 'date'];
    public $menu_str;

    public function get_info_main () {
        $config = model('ConfigModel')->where('id', 1)->first();
        $data = [
            'embed_code_header' => $config['embed_code_header'],
            'embed_code_footer' => $config['embed_code_footer'],
        ];
        return $data;
    }

    public function index(): string
    {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        $slides = model('SlideModel')->orderBy('sort', 'ASC')->findAll();
        $products = model('ProductModel')->orderBy('id', 'DESC')->findAll(12);
        $productCats = model('ProductCatModel')->orderBy('id', 'ASC')->findAll();
        $posts = model('PostModel')->orderBy('id', 'DESC')->findAll(4);
        $videos = model('VideoModel')->orderBy('id', 'ASC')->findAll(4);

        foreach ($videos as $key => $video) {
            $video_new = preg_replace('/height="\d+"/', "height='450'",$video['content']);
            $video_new = preg_replace('/width="\d+"/', "width='100%'",$video_new);
            $videos[$key]['content'] = $video_new;
        }

        $data = [
            'head_title' => $config['title'],
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'head_icon' => $config['icon'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            'home_slides' => $slides,
            'home_banner_1' => $config['banner_1'],
            'home_banner_2' => $config['banner_2'],
            'home_banner_3' => $config['banner_3'],
            'home_products' => $products,
            'home_productcats' => $productCats,
            'home_posts' => $posts,
            'home_videos' => $videos,

        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/index', $data);
    }


    public function header_menu () {
        $menus = model('MenuModel')->where('parent_id', 0)->orderBy('sort', 'ASC')->findAll();

        //active_mainMenu
        $this->menu_str = '<ul class="list_main_menu_1">';
        foreach ($menus as $menu) {
            $menu_link = $this->menu_info($menu);
            $this->menu_str .= '<li class="item_main_menu_1">';
            $this->menu_str .= '<a href="'.$menu_link.'" class="link_main_menu_1">'.$menu['name'].'</a>';
            $this->header_menu_sub($menu['id'], 1);
            $this->menu_str .= '</li>';
        }
        $this->menu_str .= '</ul>';

        return $this->menu_str;
    }

    public function header_menu_sub ($parent_id, $level) {
        $level++;
        $menus = model('MenuModel')->where('parent_id', $parent_id)->orderBy('sort', 'ASC')->findAll();

        if (empty($menus)) {
            return false;
        }
        //active_mainMenu
        $this->menu_str .= '<ul class="list_main_menu_'.$level.'">';
        foreach ($menus as $menu) {
            // dd($menu);
            $menu_link = $this->menu_info($menu);
            $this->menu_str .= '<li class="item_main_menu_'.$level.'">';
            $this->menu_str .= '<a href="'.$menu_link.'" class="link_main_menu_'.$level.'">'.$menu['name'].'</a>';
            $this->header_menu_sub($menu['id'], $level);
            $this->menu_str .= '</li>';
        }
        $this->menu_str .= '</ul>';

        // return $this->menu_str;
    }

    public function menu_info ($menu) {
        if (empty($menu['type'])) {
            return '/'.$menu['link'];
        }
        $model_item = model($menu['type'])->where('id', $menu['type_id'])->first();
        if ($menu['type'] == 0) {
            return $menu['link'];
        } else {
            $type = '';
            if ($menu['type'] == 'PageModel') {
                $type = '/page/';
            }
            if ($menu['type'] == 'NewsCatModel') {
                $type = '/danh-muc-tin-tuc/';
            }
            if ($menu['type'] == 'PostModel') {
                $type = '/tin-tuc/';
            }
            if ($menu['type'] == 'ProductCatModel') {
                $type = '/danh-muc-san-pham/';
            }
            if ($menu['type'] == 'ProductModel') {
                $type = '/san-pham/';
            }

            if (array_key_exists('slug', $model_item)) {
                return $type.$model_item['slug'];
            } else {
                return $model_item['link'];
            }
            
        }
    }

    public function page ($slug) {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        $page = model('PageModel')->where('slug', $slug)->first();

        if (empty($page)) {
            return redirect()->to('/');
        }
        
        $data = [
            'head_title' => $page['title_seo'],
            'breadcrumb_title' => $page['title'],
            'head_des' => $page['des_seo'],
            'head_keyword' => $page['keyword'],
            'og_image' => site_url('/uploads/page/'.$page['image']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'page_item' => $page,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/page', $data);
    }

    public function productAll () {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        
        $productCats = model('ProductCatModel')->orderBy('id', 'ASC')->findAll();
        $product_new = model('ProductModel')->where('product_new', 1)->orderBy('id', 'DESC')->findAll(4);
        $productModel = model('ProductModel')->orderBy('id', 'DESC');

        // if (empty($page)) {
        //     return redirect()->to('/');
        // }
        
        $data = [
            'head_title' => 'Tất cả sản phẩm',
            'breadcrumb_title' => 'Tất cả sản phẩm',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'products' => $productModel->paginate(6),
            'pager' => $productModel->pager,

            'sidebar_productcat' => $productCats,
            'sidebar_product_new' => $product_new,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/products', $data);
    }

    public function productCat ($slug) {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        $productCat = model('ProductCatModel')->where('slug', $slug)->first();
        if (empty($productCat)) {
            return redirect()->to('/');
        }

        $product_new = model('ProductModel')->where('product_new', 1)->orderBy('id', 'DESC')->findAll(4);
        $match = '"'.$productCat['id'].'"';
        $productModel = model('ProductModel')->like('productcat_id', $match)->orderBy('id', 'DESC');
        $productCats = model('ProductCatModel')->orderBy('id', 'ASC')->findAll();
        
        
        $data = [
            'head_title' => $productCat['title_seo'],
            'breadcrumb_title' => $productCat['title'],
            'head_des' => $productCat['des_seo'],
            'head_keyword' => $productCat['keyword'],
            'og_image' => site_url('/uploads/productcat/'.$productCat['image']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'products' => $productModel->paginate(6),
            'pager' => $productModel->pager,

            'sidebar_productcat' => $productCats,
            'sidebar_product_new' => $product_new,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/products', $data);
    }

    public function productSale () {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        
        $productCats = model('ProductCatModel')->orderBy('id', 'ASC')->findAll();
        $product_new = model('ProductModel')->where('product_new', 1)->orderBy('id', 'DESC')->findAll(4);
        $productModel = model('ProductModel')->where('price_sale !=', 0)->orderBy('id', 'DESC');

        // if (empty($page)) {
        //     return redirect()->to('/');
        // }
        
        $data = [
            'head_title' => 'Sản phẩm Sale',
            'breadcrumb_title' => 'Sản phẩm Sale',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'products' => $productModel->paginate(6),
            'pager' => $productModel->pager,

            'sidebar_productcat' => $productCats,
            'sidebar_product_new' => $product_new,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/products', $data);
    }

    public function searchProduct () {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        
        $productCats = model('ProductCatModel')->orderBy('id', 'ASC')->findAll();
        $product_new = model('ProductModel')->where('product_new', 1)->orderBy('id', 'DESC')->findAll(4);
        
        // $uri = service('uri');
        $uri = current_url(true);
        // dd($uri);
        // dd($uri->getQuery(['only' => ['q']]));
        $q = $uri->getQuery(['only' => ['q']]);
        $q = str_replace("q=", "", $q);
        $q = str_replace(" ", "-", $q);
        $q = str_replace("+", "-", $q);
        $q = urldecode($q);
        $q = vi_to_en($q);
        // dd($q);
        $q_arr = explode("-", $q);

        $productModel = model('ProductModel');
        foreach ($q_arr as $slug) {
            $productModel->like('slug', $slug);
        }
        // dd($like);
        $productModel->orderBy('id', 'DESC');

        // if (empty($page)) {
        //     return redirect()->to('/');
        // }
        
        $data = [
            'head_title' => 'Tìm kiếm Sản phẩm',
            'breadcrumb_title' => 'Tìm kiếm Sản phẩm',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'products' => $productModel->paginate(6),
            'pager' => $productModel->pager,

            'sidebar_productcat' => $productCats,
            'sidebar_product_new' => $product_new,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/products', $data);
    }

    public function filter () {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        
        $productCats = model('ProductCatModel')->orderBy('id', 'ASC')->findAll();
        $product_new = model('ProductModel')->where('product_new', 1)->orderBy('id', 'DESC')->findAll(4);
        
        // $uri = service('uri');
        $uri = current_url(true);
        // dd($uri);
        // dd($uri->getQuery(['only' => ['q']]));
        $hang = $uri->getQuery(['only' => ['hang']]);
        $hang = str_replace("hang=", "", $hang);

        $gioitinh = $uri->getQuery(['only' => ['gioitinh']]);
        $gioitinh = str_replace("gioitinh=", "", $gioitinh);

        $size = $uri->getQuery(['only' => ['size']]);
        $size = str_replace("size=", "", $size);

        $gia = $uri->getQuery(['only' => ['gia']]);
        $gia = str_replace("gia=", "", $gia);
        

        $match = '"'.$hang.'"';
        $productModel = model('ProductModel')->like('productcat_id', $match);

        if ($gioitinh != '') {
            $productModel->where('product_text_1', $gioitinh);
        }

        if ($size != '') {
            $productModel->like('product_size', $size);
        }

        if ($gia != '') {
            if ($gia == 1) {
                $productModel->where('price <', '1000000');
            }
            if ($gia == 2) {
                $productModel->where('price >=', '1000000');
                $productModel->where('price <=', '1500000');
            }
            if ($gia == 3) {
                $productModel->where('price >', '1500000');
            }
        }

        $productModel->orderBy('id', 'DESC');

        // if (empty($page)) {
        //     return redirect()->to('/');
        // }
        
        $data = [
            'head_title' => 'Tìm kiếm Sản phẩm',
            'breadcrumb_title' => 'Tìm kiếm Sản phẩm',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'products' => $productModel->paginate(6),
            'pager' => $productModel->pager,

            'sidebar_productcat' => $productCats,
            'sidebar_product_new' => $product_new,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/products', $data);
    }

    public function filterPrice () {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        
        $productCats = model('ProductCatModel')->orderBy('id', 'ASC')->findAll();
        $product_new = model('ProductModel')->where('product_new', 1)->orderBy('id', 'DESC')->findAll(4);
        
        // $uri = service('uri');
        $uri = current_url(true);
        // dd($uri);
        // dd($uri->getQuery(['only' => ['q']]));
        $price = $uri->getQuery(['only' => ['price']]);
        $price = str_replace("price=", "", $price);
        $price = str_replace("%C4%91", "", $price);
        $price = str_replace("+", "", $price);
        $price = explode("-", $price);
        // dd($price);
       
        $productModel = model('ProductModel');
        $productModel->where('price >=', $price[0]);
        $productModel->where('price <=', $price[1]);


        $productModel->orderBy('id', 'DESC');

        // if (empty($page)) {
        //     return redirect()->to('/');
        // }
        
        $data = [
            'head_title' => 'Tìm kiếm Sản phẩm theo giá',
            'breadcrumb_title' => 'Tìm kiếm Sản phẩm theo giá',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'products' => $productModel->paginate(6),
            'pager' => $productModel->pager,

            'sidebar_productcat' => $productCats,
            'sidebar_product_new' => $product_new,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/products', $data);
    }

    public function product ($slug) {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        $product = model('ProductModel')->where('slug', $slug)->first();//dd($post);
        if (empty($product)) {
            return redirect()->to('/');
        }

        $product_img_sub = json_decode($product['image_sub'], true);
        $product_size = explode(",", $product['product_size']);

        if (empty($product['productcat_id'])) {
            $product_relate = model('ProductModel')->orderBy('id', 'DESC')->findAll(6);
        } else {
            $productcat_id = json_decode($product['productcat_id'], true);
            $productcat_id_one = $productcat_id[0];
            $match = '"'.$productcat_id_one.'"';
            $product_relate = model('ProductModel')->like('productcat_id', $match)->orderBy('id', 'DESC')->findAll(6);
        }
        
        $data = [
            'head_title' => $product['title_seo'],
            'breadcrumb_title' => $product['title'],
            'head_des' => $product['des_seo'],
            'head_keyword' => $product['keyword'],
            'og_image' => site_url('/uploads/product/'.$product['image']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'product' => $product,
            'product_img_sub' => $product_img_sub,
            'product_size' => $product_size,
            'product_relate' => $product_relate,

        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/product', $data);
    }

    public function addCartHome () {
        $product_id = $this->request->getPost()['product_id'];
        $product_name = $this->request->getPost()['product_name'];
        $product_img = $this->request->getPost()['product_img'];
        $product_price = $this->request->getPost()['product_price'];
        $product_quantity = $this->request->getPost()['product_quantity'];
        $product_size = $this->request->getPost()['product_size'];

        $session = session();

        if ($session->has('shopping_cart')) {
            if (empty($session->get('shopping_cart'))) {
                $newdata['shopping_cart'][] = [
                    'product_id'  => $product_id,
                    'product_name'     => $product_name,
                    'product_img'     => $product_img,
                    'product_price' => $product_price,
                    'product_quantity' => $product_quantity,
                    'product_size' => $product_size,
                ];
                $session->set($newdata);
            } else {
                $add = 1;
                foreach ($_SESSION['shopping_cart'] as $key => $cart) {
                    if ($cart['product_id'] == $product_id && $cart['product_size'] == $product_size) {
                        $add = 0;
                        $product_quantity_2 = $_SESSION['shopping_cart'][$key]['product_quantity'] + $product_quantity;
                        $_SESSION['shopping_cart'][$key]['product_quantity'] = $product_quantity_2;
                    }
                }

                if ($add == 1) {
                    $newdata = [
                        'product_id'  => $product_id,
                        'product_name'     => $product_name,
                        'product_img'     => $product_img,
                        'product_price' => $product_price,
                        'product_quantity' => $product_quantity,
                        'product_size' => $product_size,
                    ];

                    $_SESSION['shopping_cart'][] = $newdata;

                    // $session->push('shopping_cart', $newdata);
                }
            }
        } else {
            $newdata['shopping_cart'][] = [
                'product_id'  => $product_id,
                'product_name'     => $product_name,
                'product_img'     => $product_img,
                'product_price' => $product_price,
                'product_quantity' => $product_quantity,
                'product_size' => $product_size,
            ];
            $session->set($newdata);
        }

        $json = json_encode($session->get('shopping_cart'));
        return $json;
    }

    public function viewCart () {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();

        $session = session();
        $total_cart = 0;
        $total_item = 0;
        if ($session->has('shopping_cart')) {
            if (!empty($session->get('shopping_cart'))) {
                foreach ($session->get('shopping_cart') as  $cart) {
                    $total_cart += $cart['product_price'] * $cart['product_quantity'];
                    $total_item++;
                }
            }
        }
        // dd($session->get('shopping_cart'));
        // if (empty($page)) {
        //     return redirect()->to('/');
        // }
        $carts = [];
        if ($session->has('shopping_cart')) {
            if (!empty($session->get('shopping_cart'))) {
                $carts = session('shopping_cart');
            }
        }
        
        $data = [
            'head_title' => 'Giỏ hàng',
            'breadcrumb_title' => 'Giỏ hàng',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'carts' => $carts,
            'total_cart' => $total_cart,
            'total_item' => $total_item,

        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/cart', $data);
    }

    public function cartChangQuantity () {
        $state = $this->request->getGet()['state'];
        $product_id = $this->request->getGet()['product_id'];
        $product_size = $this->request->getGet()['product_size'];
        // độ giảm nhỏ nhất là 1 nếu nhỏ hơn 1 thì bỏ qua

        foreach ($_SESSION['shopping_cart'] as $key => $cart) {
            if ($cart['product_id'] == $product_id && $cart['product_size'] == $product_size) {
                if ($state == 'minus') {
                    if ($cart['product_quantity'] > 1) {
                        $product_quantity_2 = $cart['product_quantity'] - 1;
                        $_SESSION['shopping_cart'][$key]['product_quantity'] = $product_quantity_2;
                    }
                }

                if ($state == 'plus') {
                    $product_quantity_2 = $cart['product_quantity'] + 1;
                    $_SESSION['shopping_cart'][$key]['product_quantity'] = $product_quantity_2;
                }
            }
        }

        $session = session();
        $total_cart = 0;
        $total_item = 0;
        if ($session->has('shopping_cart')) {
            if (!empty($session->get('shopping_cart'))) {
                foreach ($session->get('shopping_cart') as  $cart) {
                    $total_cart += $cart['product_price'] * $cart['product_quantity'];
                    $total_item++;
                }
            }
        }

        $data = [
            'carts' => session('shopping_cart'),
            'total_cart' => $total_cart,
            'total_item' => $total_item,
        ];

        return view('home/ajax_cart', $data);
    }

    public function cartDelItem () {
        $product_id = $this->request->getGet()['product_id'];
        $product_size = $this->request->getGet()['product_size'];
        // độ giảm nhỏ nhất là 1 nếu nhỏ hơn 1 thì bỏ qua

        foreach ($_SESSION['shopping_cart'] as $key => $cart) {
            if ($cart['product_id'] == $product_id && $cart['product_size'] == $product_size) {
                unset($_SESSION['shopping_cart'][$key]);
            }
        }

        $session = session();
        $total_cart = 0;
        $total_item = 0;
        if ($session->has('shopping_cart')) {
            if (!empty($session->get('shopping_cart'))) {
                foreach ($session->get('shopping_cart') as  $cart) {
                    $total_cart += $cart['product_price'] * $cart['product_quantity'];
                    $total_item++;
                }
            }
        }

        $data = [
            'carts' => session('shopping_cart'),
            'total_cart' => $total_cart,
            'total_item' => $total_item,
        ];

        return view('home/ajax_cart', $data);
    }

    public function viewCartPay () {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        
        $session = session();
        $total_price = 0;
        if ($session->has('shopping_cart')) {
            if (!empty($session->get('shopping_cart'))) {
                foreach ($session->get('shopping_cart') as  $cart) {
                    $total_price += $cart['product_price'] * $cart['product_quantity'];
                }
            }
        }

        // if (empty($page)) {
        //     return redirect()->to('/');
        // }
        $carts = [];
        if ($session->has('shopping_cart')) {
            if (!empty($session->get('shopping_cart'))) {
                $carts = session('shopping_cart');
            }
        }
        
        $data = [
            'head_title' => 'Thanh toán',
            'breadcrumb_title' => 'Thanh toán',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'carts' => $carts,
            'total_price' => $total_price,

        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/cartPay', $data);
    }

    public function addCartAdmin () {
        
        // show
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        
        $add = 1;
        $session = session();
        $total_price = 0;
        $total_item = 0;
        if ($session->has('shopping_cart')) {
            if (!empty($session->get('shopping_cart'))) {
                foreach ($session->get('shopping_cart') as  $cart) {
                    $total_price += $cart['product_price'] * $cart['product_quantity'];
                    $total_item++;
                }
            } else {
                // cart rỗng.
                $add = 0;
            }
        } else {
            // không có cart.
            $add = 0;
        }

        // lưu vào admin
        if ($add == 1) {
            $myTime = new Time('now', 'Asia/Ho_Chi_Minh', 'vi_VN');
            $now = $myTime->toDateTimeString();

            $add_cart = [
                'name' => $this->request->getPost()['txtName'],
                'email' => $this->request->getPost()['txtEmail'],
                'phone' => $this->request->getPost()['txtPhone'],
                'address' => $this->request->getPost()['txtAddress'],
                'note' => $this->request->getPost()['txtNote'],
                'state' => 1,
                'creator_id' => 0,
                'total_price' => $total_price,
                'total_cart' => $total_item,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $cartModel = model('CartModel');
            $cartModel->insert($add_cart);

            $cart_id = $cartModel->getInsertID();

            foreach ($session->get('shopping_cart') as  $cart) {
                $total_price = $cart['product_price'] * $cart['product_quantity'];

                $add_cart_item = [
                    'cart_id' => $cart_id,
                    'product_id' => $cart['product_id'],
                    'product_price' => $cart['product_price'],
                    'product_total' => $cart['product_quantity'],
                    'product_price_total' => $total_price,
                    'size' => $cart['product_size'],
                ];

                $cartItemModel = model('CartItemModel');
                $cartItemModel->insert($add_cart_item);
            }

            $session->remove('shopping_cart');
            $total_price = 0;

            // if (empty($page)) {
            //     return redirect()->to('/');
            // }

            $errors = ['Bạn đặt hàng thành công'];
            session()->setFlashdata('errors', $errors);
        } else {
            $errors = ['Giỏ hàng để trống'];
            session()->setFlashdata('errors', $errors);
        }
        
        $carts = [];
        if ($session->has('shopping_cart')) {
            if (!empty($session->get('shopping_cart'))) {
                $carts = session('shopping_cart');
            }
        }
        
        $data = [
            'head_title' => 'Thanh toán',
            'breadcrumb_title' => 'Thanh toán',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'carts' => $carts,
            'total_price' => $total_price,

        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/cartPay', $data);
    }

    public function postAll () {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        
        $newsCats = model('NewsCatModel')->orderBy('id', 'ASC')->findAll();
        $post_new = model('PostModel')->orderBy('id', 'DESC')->findAll(4);
        $postModel = model('PostModel')->orderBy('id', 'DESC');

        // if (empty($page)) {
        //     return redirect()->to('/');
        // }
        
        $data = [
            'head_title' => 'Tất cả tin tức',
            'breadcrumb_title' => 'Tất cả tin tức',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'posts' => $postModel->paginate(4),
            'pager' => $postModel->pager,

            'sidebar_newscats' => $newsCats,
            'sidebar_post_new' => $post_new,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/posts', $data);
    }

    public function newsCat ($slug) {
        $config = model('ConfigModel')->where('id', 1)->first();
        $newsCat = model('NewsCatModel')->where('slug', $slug)->first();
        if (empty($newsCat)) {
            return redirect()->to('/');
        }

        $footer_productcat = model('ProductCatModel')->findAll();
        
        $newsCats = model('NewsCatModel')->orderBy('id', 'ASC')->findAll();
        $post_new = model('PostModel')->orderBy('id', 'DESC')->findAll(4);

        $match = '"'.$newsCat['id'].'"';
        $postModel = model('PostModel')->like('newscat_id', $match)->orderBy('id', 'DESC');
        
        $data = [
            'head_title' => $newsCat['title_seo'],
            'breadcrumb_title' => $newsCat['title'],
            'head_des' => $newsCat['description'],
            'head_keyword' => $newsCat['keyword'],
            'og_image' => site_url('/uploads/newscat/'.$newsCat['image']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'posts' => $postModel->paginate(4),
            'pager' => $postModel->pager,

            'sidebar_newscats' => $newsCats,
            'sidebar_post_new' => $post_new,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/posts', $data);
    }

    public function searchPost () {
        $config = model('ConfigModel')->where('id', 1)->first();
        // $newsCat = model('NewsCatModel')->where('slug', $slug)->first();
        // if (empty($newsCat)) {
        //     return redirect()->to('/');
        // }

        $footer_productcat = model('ProductCatModel')->findAll();
        
        $newsCats = model('NewsCatModel')->orderBy('id', 'ASC')->findAll();
        $post_new = model('PostModel')->orderBy('id', 'DESC')->findAll(4);

        $uri = current_url(true);

        $q = $uri->getQuery(['only' => ['q']]);
        $q = str_replace("q=", "", $q);
        $q = str_replace(" ", "-", $q);
        $q = str_replace("+", "-", $q);
        $q = urldecode($q);
        $q = vi_to_en($q);
        // dd($q);
        $q_arr = explode("-", $q);

        $postModel = model('PostModel');
        foreach ($q_arr as $slug) {
            $postModel->like('slug', $slug);
        }
        // dd($like);
        $postModel->orderBy('id', 'DESC');
        // $postModel = model('PostModel')->like('newscat_id', $match)->orderBy('id', 'DESC');
        
        $data = [
            'head_title' => 'Tìm kiếm tin tức',
            'breadcrumb_title' => 'Tìm kiếm tin tức',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'posts' => $postModel->paginate(4),
            'pager' => $postModel->pager,

            'sidebar_newscats' => $newsCats,
            'sidebar_post_new' => $post_new,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/posts', $data);
    }

    public function post ($slug) {
        $config = model('ConfigModel')->where('id', 1)->first();
        $footer_productcat = model('ProductCatModel')->findAll();
        $post = model('PostModel')->where('slug', $slug)->first();//dd($post);
        if (empty($post)) {
            return redirect()->to('/');
        }

        $newsCats = model('NewsCatModel')->orderBy('id', 'ASC')->findAll();
        $post_new = model('PostModel')->orderBy('id', 'DESC')->findAll(4);

        if (empty($post['newscat_id'])) {
            $post_relate = model('PostModel')->orderBy('id', 'DESC')->findAll(4);
        } else {
            $newscat_id = json_decode($post['newscat_id'], true);
            $newscat_id_one = $newscat_id[0];
            $match = '"'.$newscat_id_one.'"';
            $post_relate = model('PostModel')->like('newscat_id', $match)->orderBy('id', 'DESC')->findAll(4);
        }
        
        $data = [
            'head_title' => $post['title_seo'],
            'breadcrumb_title' => $post['title'],
            'head_des' => $post['des_seo'],
            'head_keyword' => $post['keyword'],
            'og_image' => site_url('/uploads/post/'.$post['image']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
            'post' => $post,
            'post_relate' => $post_relate,

            'sidebar_newscats' => $newsCats,
            'sidebar_post_new' => $post_new,
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/post', $data);
    }

    public function contact () {
        $config = model('ConfigModel')->where('id', 1)->first();

        $footer_productcat = model('ProductCatModel')->findAll();
                
        $data = [
            'head_title' => 'Liên hệ',
            'breadcrumb_title' => 'Liên hệ',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);

        return view('home/contact', $data);
    }

    public function contactAdd () {
        $config = model('ConfigModel')->where('id', 1)->first();

        $footer_productcat = model('ProductCatModel')->findAll();

        $myTime = new Time('now', 'Asia/Ho_Chi_Minh', 'vi_VN');
        $now = $myTime->toDateTimeString();

        $add = [
            'name' => $this->request->getPost()['name'],
            'email' => $this->request->getPost()['email'],
            'phone' => $this->request->getPost()['phone'],
            'note' => $this->request->getPost()['note'],
            'created_at' => $now,
        ];
        $contactModel = model('ContactModel');
        $contactModel->insert($add);

        $errors = ['Bạn gửi liên hệ thành công'];
        session()->setFlashdata('errors', $errors);
                
        $data = [
            'head_title' => 'Liên hệ',
            'breadcrumb_title' => 'Liên hệ',
            'head_des' => $config['description'],
            'head_keyword' => $config['keyword'],
            'og_image' => site_url('/uploads/config/'.$config['logo']),

            'head_icon' => $config['icon'],
            
            'header_address' => $config['content_home_1'],
            'header_phone' => $config['content_home_7'],
            'header_logo' => $config['logo'],
            'footer_email' => $config['content_home_4'],
            'footer_name' => $config['title'],

            'footer_productcat' => $footer_productcat,

            'header_menu' => $this->header_menu(),
            
        ];

        $data_more = $this->get_info_main();
        $data = array_merge($data, $data_more);
        
        return view('home/contact', $data);
    }
}

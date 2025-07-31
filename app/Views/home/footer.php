<footer class="site-footer footer-default">
    <div class="footer-main-content_ruouvang">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="footer-main-content_ruouvang-element">
                        <aside class="widget-footer">
                            <h3 class="widget-title-footer-ruouvang uni-uppercase"><?= $footer_name ?></h3>
                            <div class="widget-content">
                                <div class="footer-lienhe-ruouvang">
                                    <!-- <h2>webruouvang.vn | Không Chỉ Là Rượu Vang & Bia</h2> -->
                                    <ul>
                                        <li><span>Địa chỉ:</span> <?= $header_address ?></li>
                                        <li><span>Email:</span>
                                            <?= $footer_email ?></li>
                                        <li>
                                            <span>Phone:</span> <?= $header_phone ?>
                                        </li>
                                    </ul>
                                    <div class="footer-about-ruouvang-social">
    <ul>
        <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        <li><a href=""><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
    </ul>
</div>                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-main-content_ruouvang-element">
                        <aside class="widget-footer">
                            <h3 class="widget-title-footer-ruouvang uni-uppercase">Sản phẩm</h3>
                            <div class="widget-content">
                                <div class="footer-link-ruouvang">
                                    <ul>
                                        <li>
                                            <a href="/page/hang-dat-truoc" title="HÀNG ĐẶT TRƯỚC">
                                                HÀNG ĐẶT TRƯỚC							</a>
                                        </li>
                                        <li>
                                            <a href="/sale" title="SALE OFF">
                                                SALE OFF							</a>
                                        </li>
                                        <?php foreach ($footer_productcat as $productcat) : ?>
                                        <li>
                                            <a href="/danh-muc-san-pham/<?= $productcat['slug'] ?>" title="<?= $productcat['title'] ?>">
                                                <?= $productcat['title'] ?>							</a>
                                        </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-main-content_ruouvang-element">
                        <aside class="widget-footer">
                            <h3 class="widget-title-footer-ruouvang uni-uppercase">FANPAGE FACEBOOK</h3>
                            <div class="widget-content">
                                <div class="footer-lienhe-ruouvang">
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/sneakerunisex/&tabs=timeline&width=360&height=248&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=220693348668109" width="360" height="248" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

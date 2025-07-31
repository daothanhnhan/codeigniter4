<!--SEARCH-->
    <div class="container">
    <div class="searchnc">
        <form name="form" method="GET" id="form_search" action="/filter">
            <!-- <input type="hidden" name="page" value="bo-loc"> -->
            <div class="box-1 form-group">
                <select id="hang" name="hang"  class="form-control" required>
                    <option value="">Chọn thương hiệu</option>
                    <?php foreach ($home_productcats as $productcat) : ?>
                    <option value="<?= $productcat['id'] ?>"><?= $productcat['title'] ?></option>
                    <?php endforeach ?>
                    <!-- <option value="5">SALE OFF</option>
                    <option value="4">HÀNG ĐẶT TRƯỚC</option> -->
                </select>
                <div class="clear"></div>
            </div>
            <div class="box-1 form-group">
                <select id="gioitinh" name="gioitinh"  class="form-control">
                    <option value="">Giới tính</option>
                    <option value="1">NAM</option>
                    <option value="0">NỮ</option>
                </select>
            </div>
            <div class="box-1 form-group">
                <select name="size" id="size"  class="form-control">
                    <option value="">Chọn size</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                </select>
            </div>
            <div class="box-1 form-group">
                <select id="gia" name="gia"  class="form-control">
                    <option value="">Khoảng giá</option>
                    <option value="1">DƯỚI 1.000.000</option>
                    <option value="2">1.000.000 ĐẾN 1.500.000</option>
                    <option value="3">TRÊN 1.500.000</option>
                </select>
                <div class="clear"></div>
            </div>

            <div class="box-1 btntim  form-group">
                <input type="submit" value="TÌM KIẾM" class="form-control">
            </div>
            <!--otim-->
            <div class="clear"></div>
        </form>
    </div>
</div>
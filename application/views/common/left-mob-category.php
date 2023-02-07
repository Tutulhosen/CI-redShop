
<div id="mobile-cats" class="mobile-cats">
    <div class="categories">
        <div class="cat-tab u-flex">
            <div class="cats">
                Categories
            </div>
            <div class="user" id="m_login_modal">
                Login or Signup
            </div>
        </div>

        <div class="title">
            <h4 style="background: #fff;color: var(--main-color)">Categories</h4>
        </div>
        <ul class="parent_ul">
            <?php
            foreach ($category as $cat) {
                $subCat = $this->db->select('*')->where('category_id', $cat->id)->get('sub_category')->result();
                ?>
                <li>
                    <span class="cat-more"><i class="ti-angle-down"></i></span>
                    <a href="<?php echo base_url(); ?>products/categorywise/<?php echo $cat->id; ?>"><?php echo $cat->name; ?></a>
                    <ul class="child_ul">
                        <?php foreach ($subCat as $sCat) { ?>
                            <li><a href="<?php echo base_url(); ?>products/subcategorywise/<?php echo $sCat->id; ?>"><?php echo $sCat->name; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>

        </ul>
    </div>
</div>
<div class="col-cat">
    <aside class="sidebr has-shadow sidebar--home">
        <div class="categories">
            <div class="title">
                <h4>All Categories</h4>
            </div>
            <ul class="parent_ul">

                <?php
                foreach ($category as $cat) {
                $subCat = $this->db->select('*')->where('category_id', $cat->id)->where('status',1)->get('sub_category')->result();
                ?>
                <li>
                    <span class="cat-more"> <?php if(!empty($subCat)){?><i class="ti-angle-down"></i><?php } ?></span>
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
    </aside>
</div>
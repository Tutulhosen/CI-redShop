<select class="form-control" name="sub_category_id" required="">   
    <option value="">==Select==</option>
    <?php foreach ($sub_category as $row2) { ?>
        <option value="<?php echo $row2->id; ?>"><?php echo $row2->name; ?></option>
    <?php } ?>
</select>
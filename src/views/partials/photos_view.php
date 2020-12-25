<div class="gallery-images-container">
    <?php foreach ($images_info as $image) : ?>
        <div class="gallery-card">
            <div class="top">
                <?php echo "<a href=\"$image->water_mark_path\" target=\"_blank\" >" ?>
                <?php echo "<img src=\"$image->miniature_path\" />" ?>
                <?php echo "</a>" ?>
            </div>
            <div class="bottom">
                <div class="bottom-col">
                    <div class="bottom-row">
                        <span class="gallery-property-header">Tytuł: </span><span><?php echo $image->title ?></span>
                    </div>
                    <div class="bottom-row">
                        <span class="gallery-property-header">Autor: </span><span><?php echo $image->author ?></span>
                    </div>
                </div>
                <div class="bottom-col">
                    <div class="bottom-row checkbox-container">
                        <?php
                        echo "<input type=\"hidden\" name=\"photos_on_page_ids[]\" value=\"$image->_id\">";
                        if (isset($_SESSION['session_photos_ids']) && in_array($image->_id, $_SESSION['session_photos_ids']))
                            echo "<input checked=\"true\" type=\"checkbox\" name=\"session_photos_ids[]\" value=\"$image->_id\">";
                        else
                            echo "<input type=\"checkbox\" name=\"session_photos_ids[]\" value=\"$image->_id\">";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
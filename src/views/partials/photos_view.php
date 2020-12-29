<div class="gallery-images-container">

    <?php if (isset($images_info)) : ?>

        <?php foreach ($images_info as $image) : ?>
            <div class="gallery-card">

                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === $image->sent_by_id) : ?>
                    <div class="private-photo-input-container">
                        <?php if ($image->is_private === "true") : ?>
                            <?php echo "<input type=\"checkbox\" name=\"change_photo_privacy[]\" value=\"$image->_id\" checked=\"true\">" ?>
                        <?php endif ?>
                        <?php if ($image->is_private === "false") : ?>
                            <?php echo "<input type=\"checkbox\" name=\"change_photo_privacy[]\" value=\"$image->_id\" >" ?>
                        <?php endif ?>
                        <?php echo "<input type=\"hidden\" name=\"private_photos_on_page[]\" value=\"$image->_id\">" ?>
                    </div>
                <?php endif ?>

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

    <?php endif ?>

    <?php if (!isset($images_info)) : ?>
        <h2 class="no-photos-header">Brak zapisanych zdjęć</h2>
    <?php endif ?>

</div>
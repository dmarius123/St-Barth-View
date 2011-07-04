<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/offers/massages/edit-massage-gallery-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Edit Massage Gallery form.
*/

?>
    <h3 id="edit-offer-gallery-title"><?=$user_edit_massage_gallery_title?></h3>
    <span class="separator"></span>
    <span id="edit-offer-gallery-info"></span>        
    <ul id="edit-offer-gallery">
<?php
    foreach ($images->result() as $image):
        echo '<li id="image_'.$image->id.'"><img src="'.$image->thumb_path.'" alt="" /><span class="delete" onclick="user_deleteImage('.$image->id.')"></span></li>';
    endforeach;
?>
    </ul>
    <div class="edit-offer-gallery-uploadify">
        <script type="text/JavaScript">
            var UPLOAD_IMAGES = "<?=$user_offers_upload_images?>";
            var HOTEL_ID = "<?=$id?>";
            var UPLOAD_IMAGES_SUCCESS = "<?=$user_offers_upload_images_success?>";
        </script>
        <div><input type="file" name="uploadify" id="uploadify" style="width:100px;" /></div>
        <div id="fileQueue"></div>
    </div>
    <br class="clear" />
    <input type="button" name="back" id="back" class="user-area-submit-style" onClick="parent.location = '#offers'; user_parseContent()" value="<?=$user_offers_back?>" />
    <br class="clear" />
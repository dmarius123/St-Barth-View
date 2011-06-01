<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/forms/offers/offer-images-form.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 27 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Offer Images form.
*/

?>
    <h3 id="add-offer-images-title"><?=$user_add_hotel_images_title?></h3>
    <span class="separator"></span>
    <span id="add-offer-info"></span>
    <ul id="add-offer-images">
    </ul>
    <div class="add-offer-images-uploadify">
        <script type="text/JavaScript">
            var UPLOAD_IMAGES = "<?=$user_add_hotel_upload_images?>";
            var USER_ID = "<?=$user_id?>";
            var ADD_HOTEL_UPLOAD_IMAGES_SUCCESS = "<?=$user_add_hotel_upload_images_success?>";
        </script>
        <div><input type="file" name="uploadify" id="uploadify" style="width:100px;" /></div>
        <div id="fileQueue"></div>
    </div>
    <br class="clear" />
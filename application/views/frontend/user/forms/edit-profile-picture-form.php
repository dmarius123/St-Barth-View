
    <h3 id="edit-profile-picture-title"><?=$user_edit_profile_picture_title?></h3>
    <span class="separator"></span>
    <span id="edit-profile-picture-info"></span>
    <div class="edit-profile-user-image">
<?php
        if ($profile_picture != ''){
            echo '<img src="'.$profile_picture.'" title="'.$first_name.' '.$last_name.'" alt="" />';
        }
?>
    </div>
    <div class="edit-profile-uploadify">
        <script type="text/JavaScript">
            var CHANGE_IMAGE = "<?=$user_edit_profile_change_image?>";
            var USER_ID = "<?=$user_id?>";
            var FIRST_NAME = "<?=$first_name?>";
            var LAST_NAME = "<?=$last_name?>";
            var EDIT_PROFILE_PICTURE_SUCCESS = "<?=$user_edit_profile_picture_success?>";
        </script>
        <div><input type="file" name="uploadify" id="uploadify" style="width:100px;" /></div>
        <div id="fileQueue"></div>
    </div>
    <br class="clear" />

    <h3 id="edit-profile-title"><?=$user_edit_profile_title?></h3>
    <span class="separator"></span>
    <span id="edit-profile-info"></span>
    <form method="post" action="" onsubmit="return editProfile()">
        <div class="user-area-form-field">
            <label><?=$user_edit_profile_first_name?> <span class="required" id="info-first-name"><?=$user_mandatory_field?></span></label><br />
            <input type="text" name="first-name" id="first-name" class="user-area-input-style" value="<?=$first_name?>" />
        </div>
        <div class="user-area-form-field">
            <label><?=$user_edit_profile_last_name?> <span class="required" id="info-last-name"><?=$user_mandatory_field?></span></label><br />
            <input type="text" name="last-name" id="last-name" class="user-area-input-style" value="<?=$last_name?>" />
        </div>
        <div class="user-area-form-field">
            <label><?=$user_edit_profile_email?> <span class="required" id="info-email"><?=$user_mandatory_field?> <?=$user_private_field?></span></label><br />
            <input type="text" name="email" id="email" class="user-area-input-style" value="<?=$email?>" />
        </div>
        <div class="user-area-form-field">
            <label><?=$user_edit_profile_phone?> <span class="required" id="info-phone"><?=$user_optional_field?> <?=$user_private_field?></span></label><br />
            <input type="text" name="phone" id="phone" class="user-area-input-style" value="<?=$phone?>" />
        </div>
        <div class="user-area-form-field textarea">
            <label><?=$user_edit_profile_description?> <span class="required" id="info-description"><?=$user_optional_field?></span></label><br />
            <textarea name="description" id="description" cols="" rows="" class="user-area-textarea-style"><?=$description?></textarea>
        </div>
        <input type="submit" name="submit" id="submit" class="user-area-submit-style" value="<?=$user_edit_profile_submit?>" />
        <br class="clear" />
    </form>
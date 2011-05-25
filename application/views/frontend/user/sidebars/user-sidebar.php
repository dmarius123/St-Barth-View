    <div class="user-info">
        <span class="user-image">
<?php
            if ($profile_picture != ''){
                echo '<img src="'.$profile_picture.'" title="'.$first_name.' '.$last_name.'" alt="" />';
            }
?>
        </span>
        <span class="user-name"><?=$first_name?><br /><?=$last_name?></span>
        <a href="#profile" id="profile-link" class="user-profile user-nav"><?=$user_modify_my_profile?></a>
        <br />
    </div>
    <span class="user-sidebar-separator"></span>
    <?php $currPage = $this->uri->segment(2); ?>
    <ul class="user-menu">
        <li><a href="#dashboard" id="dashboard-link" class="user-nav"><span></span><?=$user_dashboard?></a></li>
        <li><a href="#offers" id="offers-link" class="user-nav"><span></span><?=$user_offers?></a></li>
        <li id="offers-submenu"></li>
        <li><a href="#messages" id="messages-link" class="user-nav"><span></span><?=$user_messages?></a></li>
        <li><a href="#friends" id="friends-link" class="user-nav"><span></span><?=$user_friends?></a></li>
        <li><a href="#reservations" id="reservations-link" class="user-nav"><span></span><?=$user_reservations?></a></li>
        <li><a href="#comments" id="comments-link" class="user-nav"><span></span><?=$user_comments?></a></li>
        <li><a href="#reward-points" id="reward-points-link" class="user-nav"><span></span><?=$user_reward_points?></a></li>
        <li><a href="#settings" id="settings-link" class="user-nav"><span></span><?=$user_settings?></a></li>
    </ul>
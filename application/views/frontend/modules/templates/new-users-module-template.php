<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/modules/templates/new-users-module-templates.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : New Users Module.
*/

?>
    <div id="search-members">
        <h3><?=$modules_new_members?></h3>
        <div id="search-members-area">
<?php
        $i = 0;
        
        foreach ($new_users->result() as $new_user):
            $i++;
            if ($i == 5){
                if ($new_user->profile_picture == ''){
                    echo '<a class="last" href="'.base_url().'user/profile/view/'.$new_user->id.'"><img src="none" title="'.$new_user->first_name.' '.$new_user->last_name.'" alt="" /></a>';
                }
                else{
                    echo '<a class="last" href="'.base_url().'user/profile/view/'.$new_user->id.'"><img src="'.$new_user->profile_picture.'" title="'.$new_user->first_name.' '.$new_user->last_name.'" alt="" /></a>';
                }
            }
            else{
                if ($new_user->profile_picture == ''){
                    echo '<a href="'.base_url().'user/profile/view/'.$new_user->id.'"><img src="none" title="'.$new_user->first_name.' '.$new_user->last_name.'" alt="" /></a>';
                }
                else{
                    echo '<a href="'.base_url().'user/profile/view/'.$new_user->id.'"><img src="'.$new_user->profile_picture.'" title="'.$new_user->first_name.' '.$new_user->last_name.'" alt="" /></a>';
                }
            }
        endforeach;
?>
            <br class="clear" />
        </div>
<?php
    if ($is_login){
?>
        <?=anchor('user/sign-up/', $modules_new_members_invite_friends, 'id="search-members-join" target="_self"');?>
<?php
    }
    else{
?>
        <?=anchor('user/sign-up/', $modules_new_members_join_now, 'id="search-members-join" target="_self"');?>
        <?=anchor('user/', $modules_new_members_already_member, 'id="search-members-login" target="_self"');?>
<?php
    }
?>
    </div>
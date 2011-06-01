<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/user/templates/reward-points-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Login User - Reward Points template.
*/

?>
    <h2><?=$user_reward_points_title?></h2>
    <span class="title-separator"></span>
    <span class="user-area-info"><?=$total_reward_points?></span>
    <table class="user-table">
    <tbody>
<?php
    if ($reward_points_list->num_rows() > 0){
        foreach ($reward_points_list->result() as $row):
?>
        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->reservation_id; ?></td>
            <td><?php echo $row->value; ?></td>
        </tr>
<?php
        endforeach;
    }
    else{
?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
<?php
    }
?>
    </tbody>
    <thead>
        <tr>
            <th><?=$user_reward_points_table_id?></th>
            <th><?=$user_reward_points_table_reservation_id?></th>
            <th><?=$user_reward_points_table_rp_value?></th>
        </tr>
    </thead>
    </table>

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

    <div class="search-review-slider-content" id="slider-comments">
    <input type="hidden" name="last_no_pages" id="last_no_pages" value="<?echo $comments->num_rows()%2==0 ? $comments->num_rows()/2:intval($comments->num_rows()/2)+1;?>" />
<?php
    $i = 0;
    foreach ($comments->result() as $comment):
        $i++;
        if ($i==$last_curr_page*2-1 || $i==$last_curr_page*2){
?>
        <div class="search-review-item">
            <p class="search-review-item-author">
                <a href="<?=base_url().'user/profile/view/'.$comment->user_id?>"><span class="icon"></span> <?=$comment->first_name?> <?=substr($comment->last_name, 0, 1)?>.</a>
                <br /><span class="date"><?=$comment->formated_date?></span></p>
            <p class="search-review-item-name">
                <span><a href="<?=base_url().'offer/'.$comment->offer_id?>"><?=$comment->offer_name?></a>&nbsp;</span>
                <span class="rating-stars">
                    <span class="rating-stars-value" style="width:<?=$comment->rating*12?>px;"></span>
                </span>
                <span class="rating-number"><?=number_format($comment->rating, 1, '.', '')?></span>
                <br class="clear" />
            </p>
            <p class="search-review-item-description">
                <span class="image">
                    <a href="<?=base_url().'offer/'.$comment->offer_id?>">
                        <span class="last-image-container">
                            <img src="<?php echo $comment->image != '' ? $comment->image:'none'; ?>" title="<?=$comment->first_name?> <?=$comment->last_name?>" alt="" />
                        </span>
                    </a>
                </span>
                &laquo; <a href="<?=base_url().'offer/'.$comment->offer_id?>"><?=$comment->short_comment?></a> &raquo;
            </p>
        </div>
<?php
        }
    endforeach;
?>
        <div class="clear"></div>
    </div>
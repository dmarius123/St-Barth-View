<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/search/results/list-results.php
 * File Version            : 1.3
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 19 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Search Results - List Display.
*/

?>
<?php
    $i = 0;
    $curr_date = date('Y-m-d H:i:s');
    $offers_coordinates = 'var offers_coordinates = new Array(';

    foreach ($offers->result() as $offer):
        $i++;

        if ($i>($curr_page-1)*10 && $i<=$curr_page*10){
            $position = $i-($curr_page-1)*10;

            if ($position > 0 && $position <= 10){
                if ($position != 1){
                    $offers_coordinates .= ', "'.$offer->id.','.$offer->coordinates.','.$position.','.$i.','.$offer->title.'"';
                }
                else{
                    $offers_coordinates .= '"'.$offer->id.','.$offer->coordinates.','.$position.','.$i.','.$offer->title.'"';
                }
            }
?>
            <li class="offer-item" id="offer-item-<?=$offer->id?>-<?=$position?>">
                <span class="image">
                    <span class="image-container"><img src="<?php echo $offer->image != '' ? $offer->image:'none'; ?>" title="<?=$offer->name?>" alt="" /></span>
                    <?php echo $offer->wow == 1 ? '<span class="wow"></span>':''; ?>
                </span>
                <span class="content">
                    <span class="number">#<?=$i?>.</span>
                    <span class="title"><?=anchor('offer/'.$offer->id.'/', $offer->title, 'target="_self"')?></span>
                    <span class="location"><?=$offer->location?><?=$offer->country == '' ? '':', '.$offer->country?></span>
<?php echo (strtotime($curr_date)-strtotime($offer->date_created))/86400 < 30 ? '<span class="new"></span>':''; ?>
                    <span class="rating-value"><?=number_format($offer->rating, 1, '.', '')?></span>
                    <span class="rating-stars">
                        <span class="rating-stars-value" style="width:<?=$offer->rating*12?>px;"></span>
                    </span>
                    <span class="clear separator"></span>
                    <span class="comments"><a href="<?=base_url().'offer/'.$offer->id?>" target="_self"><span class="icon<?php echo $offer->no_comments > 0 ? '':' no-comments'; ?>"></span><span class="no"><?=$offer->no_comments?></span><br /><span class="text"><?=$search_offer_comments?></span></a></span>
                    <span class="friends"><a href="<?=base_url().'offer/'.$offer->id?>" target="_self"><span class="icon<?php echo $offer->no_likes > 0 ? '':' no-likes'; ?>"></span><span class="no"><?=$offer->no_likes?></span><br /><span class="text"><?=$search_offer_likes?></span></a></span>
                    <span class="deals"><a href="<?=base_url().'offer/'.$offer->id?>" target="_self"><span class="icon<?php echo $offer->no_deals > 0 ? '':' no-deals'; ?>"></span><span class="no"><?=$offer->no_deals?></span><br /><span class="text"><?=$search_offer_deals?></span></a></span>
<?php if ($offer->no_comments > 0){ ?>
                    <span class="owner">
                        <span class="last-comment"><?=$search_offer_last_comment?></span>
                        <a href="<?=base_url()?>user/profile/view/<?=$offer->last_comment_user_id?>" target="_self">
                            <span class="icon"><?php echo $offer->last_comment_profile_picture != '' ? '<img src="'.$offer->last_comment_profile_picture.'" tittle="'.$offer->last_comment_first_name.' '.$offer->last_comment_last_name.'" alt="" />':''; ?></span>
                            <span class="first-name"><?=$offer->last_comment_first_name?> <?=substr($offer->last_comment_last_name, 0, 1)?>.</span>
                        </a><br />
                        <?=$search_offer_last_comment_at?> <?=$offer->last_comment_date?>
                    </span>
<?php }
      else{
?>
                    <span class="owner"><span class="no-comment"><?=$search_offer_no_comments?></span></span>
<?php } ?>
                    <br class="clear" />
                    <span class="description"><?=$offer->short_description?></span>
                    <span class="price"><span class="pre-text"><?=$search_offer_from?></span><span class="sum"><?=$offer->start_price?></span><span class="currency-icon"><?php echo $offer->currency == 0 ? $search_offer_euros:$search_offer_dollars; ?></span></span>
                    <?=anchor('offer/'.$offer->id.'/', $search_offer_request_book, 'target="_self" class="request-book-btn"')?>
                </span>
                <br class="clear" />
            </li>
<?php 
        }
    endforeach;

    $offers_coordinates .= ');';
?>

<?php echo '<script type="text/JavaScript">'.$offers_coordinates.'</script>'; ?>

<?php
    if ($offers->num_rows() == 0){
?>
            <li class="no-results"><?=$search_no_results?></li>
<?php
    }
?>
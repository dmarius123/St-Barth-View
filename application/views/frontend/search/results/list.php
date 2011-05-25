
<?php
    $i = 0;
    $curr_date = date('Y-m-d H:i:s');
    $offers_coordinates = 'var offers_coordinates = new Array(';

    foreach ($offers->result() as $offer):
        $i++;

        if ($i != 1){
            $offers_coordinates .= ', "'.$offer->coordinates.'"';
        }
        else{
            $offers_coordinates .= '"'.$offer->coordinates.'"';
        }

        if ($i>($curr_page-1)*10 && $i<=$curr_page*10){
?>
            <li>
                <span class="image">
                    <span class="image-container"><img src="<?php echo $offer->image != '' ? $offer->image:'none'; ?>" title="<?=$offer->name?>" alt="" /></span>
                    <?php echo $offer->wow == 1 ? '<span class="wow"></span>':''; ?>
                </span>
                <span class="content">
                    <span class="number">#<?=($curr_page-1)*10+$i?>.</span>
                    <span class="title"><?=$offer->title?></span>
                    <span class="location"><?=$offer->location?></span>
<?php echo (strtotime($curr_date)-strtotime($offer->date_created))/86400 < 30 ? '<span class="new"></span>':''; ?>
                    <span class="rating-value"><?=number_format($offer->rating, 1, '.', '')?></span>
                    <span class="rating-stars">
                        <span class="rating-stars-value" style="width:<?=$offer->rating*12?>px;"></span>
                    </span>
                    <span class="clear separator"></span>
                    <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon<?php echo $offer->no_comments > 0 ? '':' no-comments'; ?>"></span><span class="no"><?=$offer->no_comments?></span><br /><span class="text"><?=$search_offer_comments?></span></a></span>
                    <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon<?php echo $offer->no_likes > 0 ? '':' no-likes'; ?>"></span><span class="no"><?=$offer->no_likes?></span><br /><span class="text"><?=$search_offer_likes?></span></a></span>
                    <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon<?php echo $offer->no_deals > 0 ? '':' no-deals'; ?>"></span><span class="no"><?=$offer->no_deals?></span><br /><span class="text"><?=$search_offer_deals?></span></a></span>
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
                    <a href="javascript:void(0)" target="_self" class="request-book-btn"><?=$search_offer_request_book?></a>
                </span>
                <br class="clear" />
            </li>
<?php 
        }
    endforeach;

    $offers_coordinates .= ');';


?>

<?php echo '<script type="text/JavaScript">'.$offers_coordinates.'</script>'; ?>
<!--
    <li>
        <span class="image">
            <span class="image-container"></span>
            <span class="wow"></span>
        </span>
        <span class="content">
            <span class="number">#1.</span>
            <span class="title">La Banane</span>
            <span class="location">St Barts</span>
            <span class="new"></span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <span class="clear separator"></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">friends</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="owner"><span class="last-comment">Last comment</span> <a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="first-name">Alexandre A.</span></a><br />at: 12/12/2010 - 5:57pm</span>
            <br class="clear" />
            <span class="description">Vivamus eu arcu sed eros vestibulum tristique eget quis arcu. Curabitur dapibus, diam at semper volutpat, ac egestas lectus augue quis quam ...</span>
            <span class="price"><span class="pre-text">from</span><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <a href="javascript:void(0)" target="_self" class="request-book-btn">Request Book!</a>
        </span>
        <br class="clear" />
    </li>
    <li>
        <span class="image">
            <span class="image-container"></span>
            <span class="wow"></span>
        </span>
        <span class="content">
            <span class="number">#1.</span>
            <span class="title">La Banane</span>
            <span class="location">St Barts</span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <span class="clear separator"></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">friends</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="owner"><span class="no-comment">no comment</span></span>
            <br class="clear" />
            <span class="description">Vivamus eu arcu sed eros vestibulum tristique eget quis arcu. Curabitur dapibus, diam at semper volutpat, ac egestas lectus augue quis quam ...</span>
            <span class="price"><span class="pre-text">from</span><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <a href="javascript:void(0)" target="_self" class="request-book-btn">Request Book!</a>
        </span>
        <br class="clear" />
    </li>
    <li>
        <span class="image">
            <span class="image-container"></span>
            <span class="wow"></span>
        </span>
        <span class="content">
            <span class="number">#3.</span>
            <span class="title">La Banane</span>
            <span class="location">St Barts</span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <span class="clear separator"></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">friends</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="owner"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="first-name">Alexandre</span><br /><span class="last-name">Abela</span></a></span>
            <br class="clear" />
            <span class="description">Vivamus eu arcu sed eros vestibulum tristique eget quis arcu. Curabitur dapibus, diam at semper volutpat, ac egestas lectus augue quis quam ...</span>
            <span class="price"><span class="pre-text">from</span><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <a href="javascript:void(0)" target="_self" class="request-book-btn">Request Book!</a>
        </span>
        <br class="clear" />
    </li>
    <li>
        <span class="image">
            <span class="image-container"></span>
            <span class="wow"></span>
        </span>
        <span class="content">
            <span class="number">#4.</span>
            <span class="title">La Banane</span>
            <span class="location">St Barts</span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <span class="clear separator"></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">friends</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="owner"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="first-name">Alexandre</span><br /><span class="last-name">Abela</span></a></span>
            <br class="clear" />
            <span class="description">Vivamus eu arcu sed eros vestibulum tristique eget quis arcu. Curabitur dapibus, diam at semper volutpat, ac egestas lectus augue quis quam ...</span>
            <span class="price"><span class="pre-text">from</span><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <a href="javascript:void(0)" target="_self" class="request-book-btn">Request Book!</a>
        </span>
        <br class="clear" />
    </li>
    <li>
        <span class="image">
            <span class="image-container"></span>
            <span class="wow"></span>
        </span>
        <span class="content">
            <span class="number">#5.</span>
            <span class="title">La Banane</span>
            <span class="location">St Barts</span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <span class="clear separator"></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">friends</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="owner"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="first-name">Alexandre</span><br /><span class="last-name">Abela</span></a></span>
            <br class="clear" />
            <span class="description">Vivamus eu arcu sed eros vestibulum tristique eget quis arcu. Curabitur dapibus, diam at semper volutpat, ac egestas lectus augue quis quam ...</span>
            <span class="price"><span class="pre-text">from</span><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <a href="javascript:void(0)" target="_self" class="request-book-btn">Request Book!</a>
        </span>
        <br class="clear" />
    </li>
    <li>
        <span class="image">
            <span class="image-container"></span>
            <span class="wow"></span>
        </span>
        <span class="content">
            <span class="number">#6.</span>
            <span class="title">La Banane</span>
            <span class="location">St Barts</span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <span class="clear separator"></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">friends</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="owner"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="first-name">Alexandre</span><br /><span class="last-name">Abela</span></a></span>
            <br class="clear" />
            <span class="description">Vivamus eu arcu sed eros vestibulum tristique eget quis arcu. Curabitur dapibus, diam at semper volutpat, ac egestas lectus augue quis quam ...</span>
            <span class="price"><span class="pre-text">from</span><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <a href="javascript:void(0)" target="_self" class="request-book-btn">Request Book!</a>
        </span>
        <br class="clear" />
    </li>
    <li>
        <span class="image">
            <span class="image-container"></span>
            <span class="wow"></span>
        </span>
        <span class="content">
            <span class="number">#7.</span>
            <span class="title">La Banane</span>
            <span class="location">St Barts</span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <span class="clear separator"></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">friends</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="owner"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="first-name">Alexandre</span><br /><span class="last-name">Abela</span></a></span>
            <br class="clear" />
            <span class="description">Vivamus eu arcu sed eros vestibulum tristique eget quis arcu. Curabitur dapibus, diam at semper volutpat, ac egestas lectus augue quis quam ...</span>
            <span class="price"><span class="pre-text">from</span><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <a href="javascript:void(0)" target="_self" class="request-book-btn">Request Book!</a>
        </span>
        <br class="clear" />
    </li>
    <li>
        <span class="image">
            <span class="image-container"></span>
            <span class="wow"></span>
        </span>
        <span class="content">
            <span class="number">#8.</span>
            <span class="title">La Banane</span>
            <span class="location">St Barts</span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <span class="clear separator"></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">friends</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="owner"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="first-name">Alexandre</span><br /><span class="last-name">Abela</span></a></span>
            <br class="clear" />
            <span class="description">Vivamus eu arcu sed eros vestibulum tristique eget quis arcu. Curabitur dapibus, diam at semper volutpat, ac egestas lectus augue quis quam ...</span>
            <span class="price"><span class="pre-text">from</span><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <a href="javascript:void(0)" target="_self" class="request-book-btn">Request Book!</a>
        </span>
        <br class="clear" />
    </li>
    <li>
        <span class="image">
            <span class="image-container"></span>
            <span class="wow"></span>
        </span>
        <span class="content">
            <span class="number">#9.</span>
            <span class="title">La Banane</span>
            <span class="location">St Barts</span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <span class="clear separator"></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">friends</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="owner"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="first-name">Alexandre</span><br /><span class="last-name">Abela</span></a></span>
            <br class="clear" />
            <span class="description">Vivamus eu arcu sed eros vestibulum tristique eget quis arcu. Curabitur dapibus, diam at semper volutpat, ac egestas lectus augue quis quam ...</span>
            <span class="price"><span class="pre-text">from</span><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <a href="javascript:void(0)" target="_self" class="request-book-btn">Request Book!</a>
        </span>
        <br class="clear" />
    </li>
    <li>
        <span class="image">
            <span class="image-container"></span>
            <span class="wow"></span>
        </span>
        <span class="content">
            <span class="number">#10.</span>
            <span class="title">La Banane</span>
            <span class="location">St Barts</span>
            <span class="rating-value">4.0</span>
            <span class="rating-stars">
                <span class="rating-stars-value"></span>
            </span>
            <span class="clear separator"></span>
            <span class="comments"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="no">20</span><br /><span class="text">comments</span></a></span>
            <span class="friends"><a href="javascript:void(0)" target="_self"><span class="icon no-friends"></span><span class="no">0</span><br /><span class="text">friends</span></a></span>
            <span class="deals"><a href="javascript:void(0)" target="_self"><span class="icon no-deals"></span><span class="no">0</span><br /><span class="text">deals</span></a></span>
            <span class="owner"><a href="javascript:void(0)" target="_self"><span class="icon"></span><span class="first-name">Alexandre</span><br /><span class="last-name">Abela</span></a></span>
            <br class="clear" />
            <span class="description">Vivamus eu arcu sed eros vestibulum tristique eget quis arcu. Curabitur dapibus, diam at semper volutpat, ac egestas lectus augue quis quam ...</span>
            <span class="price"><span class="pre-text">from</span><span class="sum">500</span><span class="currency-icon">&euro;</span></span>
            <a href="javascript:void(0)" target="_self" class="request-book-btn">Request Book!</a>
        </span>
        <br class="clear" />
    </li>

-->
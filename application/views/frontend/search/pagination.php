
<?php
        echo ';;;;;';
        
        $no_pages = intval($offers->num_rows()/10);
        if ($offers->num_rows()%10 > 0){
            $no_pages++;
        }

        if ($offers->num_rows() > 0){
?>
            <?=($curr_page-1)*10+1?> - <?php echo $curr_page*10 > $offers->num_rows() ? $offers->num_rows():$curr_page*10 ;?> <?=$search_pagination_of?> <?=$offers->num_rows()?> <?=$search_pagination_listings?>
            <span>
<?php
            if ($curr_page > 1){
                echo '<a href="javascript:parseSearchPage('.($curr_page-1).')">&lt;</a>';
            }
            for ($i=1; $i<=$no_pages; $i++){
                if ($curr_page == $i){
                    echo '<strong>'.$i.'</strong>';
                }
                else{
                    echo '<a href="javascript:parseSearchPage('.$i.')">'.$i.'</a>';
                }
            }
            if ($curr_page < $no_pages){
                echo '<a href="javascript:parseSearchPage('.($curr_page+1).')">&gt;</a>';
            }
?>
            </span>
<?php
        }
?>
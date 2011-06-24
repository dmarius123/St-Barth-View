<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/data/gallery-data.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 20 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Gallery Data.
*/

?>
<?php

    header ("Content-Type:text/xml");
    
    echo '<WallGridGallery>';

    foreach ($images->result() as $image):
        echo '<Image Path="'.$image->path.'" ThumbPath="'.$image->thumb_path.'" Title=""><![CDATA[]]></Image>';
    endforeach;
    
    echo '</WallGridGallery>';

?>
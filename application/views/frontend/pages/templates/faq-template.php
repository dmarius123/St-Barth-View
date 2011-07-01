<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/pages/templates/faq-template.php
 * File Version            : 1.1
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 28 May 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : FAQ Template.
*/

?>
<?php $this->load->view('frontend/header'); ?>
    <div id="section" class="page-section">
        <div id="main" class="page-main">
            <h1>F.A.Q.</h1>
            <h2>Qu’est-ce que St Barth View ?</h2>
            <p>St Barh view s’impose comme la référence de la commercialisation promotionnelle de service. Une plateforme incontournable sur laquelle il vous sera proposé chaque jour une offre exceptionnelle dans les meilleurs établissements de votre ville. Restaurants branchés, brasseries traditionnelles, bars lounge, centres de remise en forme, cours de yoga, cours de cuisine et bien d’autres encore. Nos équipes recherchent au quotidien des offres qui surfent sur les tendances actuelles, tout en négociant des tarifs promotionnels exclusifs.</p>
            <p>here is a <a href="">test link</a> to see how it looks like</p>
            <h2>Quelles sont les restrictions ?</h2>
            <h2>Le deal d'aujourd'hui m'intéresse, comment puis-je en bénéficier ?</h2>
            <h2>Mon deal vient d'être validé, que se passe-t-il à présent ?</h2>
        </div>
        <div id="sidebar" class="page-sidebar">
<!--            <h2>This is H2 Test</h2>-->
<!--            <p>this is paragraph test this is para graph test this is para graph test this is paragr aph test this is paragra ph test this is para graph test this is parag raph test this is para graph test</p>-->
        <?php $this->load->view('frontend/modules/templates/new-users-module-template'); ?>
        </div>

        <br class="clear">
    </div>
<?php $this->load->view('frontend/footer'); ?>
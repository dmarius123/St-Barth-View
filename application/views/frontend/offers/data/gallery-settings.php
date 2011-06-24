<?php

/*
 * Title                   : St Barth View
 * File                    : application/views/frontend/offers/data/gallery-settings.php
 * File Version            : 1.0
 * Author                  : Marius-Cristian Donea
 * Created / Last Modified : 20 June 2011
 * Last Modified By        : Marius-Cristian Donea
 * Description             : Offers - Gallery Settings.
*/

?>

<?php header ("Content-Type:text/xml"); ?>

<Settings>
    <!-- The settings that can have the css value can be edited from ThumbnailGallery.css . -->
    <Width></Width> <!-- Width (css, 100%, value in pixels). Default value: 100%. Set the width of the gallery. Giving the value 100% makes the gallery inherit the width of the container. -->
    <Height></Height> <!-- Height (css, 100%, value in pixels). Default value: 100%. Set the height of the gallery. Giving the value 100% makes the gallery inherit the height of the container. -->
    <BgColor></BgColor> <!-- Background Color (css, color hex code). Default value: css. Set gallery background color. -->
    <BgImage></BgImage> <!-- Background Image (image path). Default value: none. The path to the backgrounds image. -->
    <BgAlpha>0</BgAlpha> <!-- Background Alpha (value from 0 to 100). Default value: 100. Set gallery alpha. -->

    <ThumbnailsPosition></ThumbnailsPosition> <!-- Thumbnails Position (top, right, bottom, left). Default value: bottom. Set the position of the thumbnails in the gallery. -->
    <ThumbnailsOverImage>true</ThumbnailsOverImage> <!-- Thumbnails Over Image (true, false). Default value: false. If the value is true the thumbnails will be displayed over the big image. -->
    <ThumbnailsBgColor>000000</ThumbnailsBgColor> <!-- Thumbnails Background Color (css, color hex code). Default value: css. Set the color for the thumbnails background. -->
    <ThumbnailsBgAlpha>0</ThumbnailsBgAlpha> <!-- Thumbnails Background Alpha (value from 0 to 100). Default value: 100. Set the transparancy for the thumbnails background. -->
    <ThumbnailsSpacing>2</ThumbnailsSpacing> <!-- Thumbnails Spacing (value in pixels). Default value: 0. Set the space between thumbnails. -->
    <ThumbnailsPaddingTop>10</ThumbnailsPaddingTop> <!-- Thumbnails Padding Top (value in pixels). Default value: 0. Set the top padding for the thumbnails. -->
    <ThumbnailsPaddingRight>10</ThumbnailsPaddingRight> <!-- Thumbnails Padding Right (value in pixels). Default value: 0. Set the right padding for the thumbnails. -->
    <ThumbnailsPaddingBottom>10</ThumbnailsPaddingBottom> <!-- Thumbnails Padding Bottom (value in pixels). Default value: 0. Set the bottom padding for the thumbnails. -->
    <ThumbnailsPaddingLeft>10</ThumbnailsPaddingLeft> <!-- Thumbnails Padding Left (value in pixels). Default value: 0. Set the left padding for the thumbnails. -->

    <ThumbnailLoader><?=base_url().'assets/libraries/gui/images/thumbnail-gallery/loaders/ThumbnailLoader.gif'?></ThumbnailLoader> <!-- Thumbnail Loader (path to image). Default value: WallGridGallery/images/ThumbnailLoader.gif . Set the loader for the thumbnails. -->
    <ThumbnailWidth>60</ThumbnailWidth>  <!-- Thumbnail Width (the size in pixels). Default value: 50. Set the width of a thumbnail. -->
    <ThumbnailHeight>60</ThumbnailHeight> <!-- Thumbnail Height (the size in pixels). Default value: 50. Set the height of a thumbnail. -->
    <ThumbnailAlpha></ThumbnailAlpha> <!-- Thumbnail Alpha (value from 0 to 100). Default value: 50. Set the alpha of a thumbnail. -->
    <ThumbnailAlphaHover></ThumbnailAlphaHover> <!-- Thumbnail Alpha Hover (value from 0 to 100). Default value: 100. Set the alpha of a thumbnail when hover. -->
    <ThumbnailAlphaSelected></ThumbnailAlphaSelected> <!-- Thumbnail Alpha Selected (value from 0 to 100). Default value: 100. Set the alpha of a thumbnail when selected. -->
    <ThumbnailBgColor>ffffff</ThumbnailBgColor> <!-- Thumbnail Background Color (color hex code). Default value: ffffff. Set the color of a thumbnail's background. -->
    <ThumbnailBgColorHover>ffffff</ThumbnailBgColorHover> <!-- Thumbnail Background Color Hover (color hex code). Default value: ffffff. Set the color of a thumbnail's background when hover. -->
    <ThumbnailBgColorSelected>ffffff</ThumbnailBgColorSelected> <!-- Thumbnail Background Color Selected (color hex code). Default value: ffffff. Set the color of a thumbnail's background when selected. -->
    <ThumbnailBorderSize></ThumbnailBorderSize> <!-- Thumbnail Border Size (value in pixels). Default value: 0. Set the size of a thumbnail's border. -->
    <ThumbnailBorderColor></ThumbnailBorderColor> <!-- Thumbnail Border Color (color hex code). Default value: 000000. Set the color of a thumbnail's border. -->
    <ThumbnailBorderColorHover></ThumbnailBorderColorHover> <!-- Thumbnail Border Color Hover (color hex code). Default value: 000000. Set the color of a thumbnail's border when hover. -->
    <ThumbnailBorderColorSelected></ThumbnailBorderColorSelected> <!-- Thumbnail Border Color Selected (color hex code). Default value: 000000. Set the color of a thumbnail's border when selected. -->
    <ThumbnailPaddingTop></ThumbnailPaddingTop> <!-- Thumbnail Padding Top (value in pixels). Default value: 0. Set top padding value of a thumbnail. -->
    <ThumbnailPaddingRight></ThumbnailPaddingRight> <!-- Thumbnail Padding Right (value in pixels). Default value: 0. Set right padding value of a thumbnail. -->
    <ThumbnailPaddingBottom></ThumbnailPaddingBottom> <!-- Thumbnail Padding Bottom (value in pixels). Default value: 0. Set bottom padding value of a thumbnail. -->
    <ThumbnailPaddingLeft></ThumbnailPaddingLeft> <!-- Thumbnail Padding Left (value in pixels). Default value: 0. Set left padding value of a thumbnail. -->

    <ImageLoader><?=base_url().'assets/libraries/gui/images/thumbnail-gallery/loaders/ImageLoader.gif'?></ImageLoader> <!-- Image Loader (path to image). Default value: WallGridGallery/images/ImageLoader.gif . Set the loader for the big image. -->
    <ImageBgColor></ImageBgColor> <!-- Image Background Color (css, color hex code). Default value: css. Set the color for the image background. -->
    <ImageBgAlpha>30</ImageBgAlpha> <!-- Image Background Alpha (value from 0 to 100). Default value: 100. Set the alpha for the image background. -->
    <ImageDisplayType>full</ImageDisplayType> <!-- Image Display Type (fit, full). Default value: fit. Set image display type. The fit value will display the all image. The full value will display the image on the all stage, padding and margin values will not be taken into consideration. -->
    <ImageDisplayTime></ImageDisplayTime> <!-- Image Display Time (time in miliseconds). Default value: 1000. Set image display duration. -->
    <ImageMarginTop>20</ImageMarginTop> <!-- Image Margin Top (value in pixels). Default value: 0. Set top margin value for the image. -->
    <ImageMarginRight>20</ImageMarginRight> <!-- Image Margin Right (value in pixels). Default value: 0. Set right margin value for the image. -->
    <ImageMarginBottom>20</ImageMarginBottom> <!-- Image Margin Bottom (value in pixels). Default value: 0. Set bottom margin value for the image. -->
    <ImageMarginLeft>20</ImageMarginLeft> <!-- Image Margin Left (value in pixels). Default value: 0. Set top left value for the image. -->
    <ImagePaddingTop>10</ImagePaddingTop> <!-- Image Padding Top (value in pixels). Default value: 0. Set top padding value for the image. -->
    <ImagePaddingRight>10</ImagePaddingRight> <!-- Image Padding Right (value in pixels). Default value: 0. Set right padding value for the image. -->
    <ImagePaddingBottom>10</ImagePaddingBottom> <!-- Image Padding Bottom (value in pixels). Default value: 0. Set bottom padding value for the image. -->
    <ImagePaddingLeft>10</ImagePaddingLeft> <!-- Image Padding Left (value in pixels). Default value: 0. Set left padding value for the image. -->

    <Navigation></Navigation> <!-- Enable Navigation (true, false). Default value: true. Enable navigation buttons. -->
    <NavigationColor></NavigationColor> <!-- Navigation Buttons Color (color hex code). Default value: ffffff. Set the color for the navigation buttons. -->
    <NavigationColorHover></NavigationColorHover> <!-- Navigation Buttons Color Hover (color hex code). Default value: ffffff. Set the color for the navigation buttons when hover. -->
    <NavigationIconColor>666666</NavigationIconColor> <!-- Navigation Buttons Icon Color (color hex code). Default value: 000000. Set the color for the navigation buttons icon. -->
    <NavigationIconColorHover></NavigationIconColorHover> <!-- Navigation Buttons Icon Color Hover (css, color hex code). Default value: 000000. Set the color for the navigation buttons icon when hover. -->
    <NavigationAlpha>30</NavigationAlpha> <!-- Navigation Buttons Alpha (value from 0 to 100). Default value: 50. Set the alpha for the navigation buttons. -->
    <NavigationAlphaHover>30</NavigationAlphaHover> <!-- Navigation Buttons Alpha Hover (value from 0 to 100). Default value: 100. Set the alpha for the navigation buttons when hover. -->

    <CaptionWidth></CaptionWidth> <!-- Caption Width (auto, value in pixels). Default value: auto. Set caption width. The value auto make the width 100%. -->
    <CaptionHeight></CaptionHeight> <!-- Caption Height (value in pixels). Default value: 70. Set caption height. The value auto make the height 100%. -->
    <CaptionTitleColor>bbbbbb</CaptionTitleColor> <!-- aption Title Color (css, color hex code). Default value: css. Set caption title color. -->
    <CaptionTextColor>888888</CaptionTextColor> <!-- Caption Text Color (css, color hex code). Default value: css. Set caption text color. -->
    <CaptionBgColor></CaptionBgColor> <!-- Caption Background Color (css, color hex code). Default value: css. Set caption background color. -->
    <CaptionBgAlpha>70</CaptionBgAlpha> <!-- Caption Background Alpha (value from 0 to 100). Default value: 50. Set caption alpha color. -->
    <CaptionPosition></CaptionPosition> <!-- Caption Position (top, right, bottom, left). Default value: bottom. Set caption position. -->
    <CaptionScrollScrubColor>888888</CaptionScrollScrubColor> <!-- Caption Scroll Scrub Color (css, color hex code). Default value: css. Set scroll scrub color. -->
    <CaptionScrollBgColor>bbbbbb</CaptionScrollBgColor> <!-- Caption Scroll Background Color (css, color hex code). Default value: css. Set scroll background color. -->
    <CaptionMarginTop></CaptionMarginTop> <!-- Caption Margin Top (value in pixels). Default value: 0. Set caption top margin. -->
    <CaptionMarginRight></CaptionMarginRight> <!-- Caption Margin Right (value in pixels). Default value: 0. Set caption right margin. -->
    <CaptionMarginBottom></CaptionMarginBottom> <!-- Caption Margin Bottom (value in pixels). Default value: 0. Set caption bottom margin. -->
    <CaptionMarginLeft></CaptionMarginLeft> <!-- Caption Margin Left (value in pixels). Default value: 0. Set caption left margin. -->
    <CaptionPaddingTop></CaptionPaddingTop> <!-- Caption Padding Top (value in pixels). Default value: 10. Set caption top padding. -->
    <CaptionPaddingRight></CaptionPaddingRight> <!-- Caption Padding Right (value in pixels). Default value: 10. Set caption right padding. -->
    <CaptionPaddingBottom></CaptionPaddingBottom> <!-- Caption Padding Bottom (value in pixels). Default value: 10. Set caption bottom padding. -->
    <CaptionPaddingLeft></CaptionPaddingLeft> <!-- Caption Padding Left (value in pixels). Default value: 10. Set caption left padding. -->

    <TooltipEnabled>true</TooltipEnabled> <!-- Tooltip Enabled (true, false). Default value: false. Enable the tooltip. -->
    <TooltipBgColor></TooltipBgColor> <!-- Tooltip Background Color (css, color hex code). Default value: css. Set tooltip background color. -->
    <TooltipStrokeColor></TooltipStrokeColor> <!-- Tooltip Stroke Color (css, color hex code). Default value: css. Set tooltip stroke clor. -->
    <TooltipTextColor></TooltipTextColor> <!-- Tooltip Text Color (css, color hex code). Default value: css. Set tooltip text color. -->

    <Slideshow></Slideshow> <!-- Slideshow (true, false). Default value: false. Enable or disable the slideshow. -->
    <SlideshowTime></SlideshowTime> <!-- Slideshow Time (time in miliseconds). Default: 5000. How much time an image stays until it passes to the next one. -->
    <SlideshowLoop></SlideshowLoop> <!-- Slideshow Loop (true, false). Default: true. Set it to false if you want the slideshow to stop when it reaches the last image. -->

    <AutoHide>true</AutoHide> <!-- Auto Hide Thumbnails and Buttons (true, false). Default: false. Hide the thumbnails and buttons and display them when you hover the gallery. -->
    <AutoHideTime>100</AutoHideTime> <!-- Auto Hide Time (time in miliseconds). Default: 2000. Set the time after which the thumbnails and buttons hide. -->
</Settings>
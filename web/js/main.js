/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
    $('[data-toggle="popover"]').popover({html:true})
});

jQuery(document).ready(function($) {
    $('.popup-content').magnificPopup({
        type: 'inline'
    });
    // Type Image - картинка без анимации
    $('.image-popup').magnificPopup({
        type: 'image'
    });

// Type Image Zoom - картинка с анимацией
    $('.image-popup-zoom').magnificPopup({
        type: 'image',
        zoom: {
            enabled: true,
            duration: 300 // продолжительность анимации. Не меняйте данный параметр также и в CSS
        }
    });
    /*
     <div class="popup-gallery">
     <a href="images/images-magnific-popup/gallery/img_1_b.jpg" rel="alternate"><img src="images/images-magnific-popup/gallery/img_1_s.jpg" alt="" /></a>
     <a href="images/images-magnific-popup/gallery/img_2_b.jpg" rel="alternate"><img src="images/images-magnific-popup/gallery/img_2_s.jpg" alt="" /></a>
     <a href="images/images-magnific-popup/gallery/img_3_b.jpg" rel="alternate"><img src="images/images-magnific-popup/gallery/img_3_s.jpg" alt="" /></a>
     <a href="images/images-magnific-popup/gallery/img_4_b.jpg" rel="alternate"><img src="images/images-magnific-popup/gallery/img_4_s.jpg" alt="" /></a>
     </div>
    * */
    // Тип Image - галерея картинок
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Загрузка изображения #%curr%...',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        }
    });
    /*
    *
    * */
});

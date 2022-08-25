$(document).ready(function (){
   console.log(jQuery.fn.jquery);

   //change bg header for scrolling
   var scrolled;
   let patchToMainLogo = $('.header-container__logo').attr('wl');
   let patchToSecondLogo = $('.header-container__logo').attr('bl');
   window.onscroll = function() {
      scrolled = window.pageYOffset || document.documentElement.scrollTop;
      if(scrolled > 100){
         $("header.main").css({"background-color": "white"});
         $('header.main .site-size__header-container a').css({'color': '#232323'});
         $('header.main .site-size__header-container .link-tel__text').css({'color': '#232323'});
         $('header .site-size__header-container .link-tel__text').css({'color': '#232323'});
         $('header.main .contact-box__text-desc').css({'color': '#E50746'});
         $('header .contact-box__text-desc').css({'color': '#E50746'});
         $('.contact-box__text-desc').css({'text-decoration': 'none'});
         $('header.main .header-container__logo').attr('src', patchToSecondLogo);
      }
      if(scrolled < 100){
         $("header.main").css({"background-color": "transparent"});
         $('header.main .site-size__header-container a').css({'color': 'white'});
         $('header.main .site-size__header-container .link-tel__text').css({'color': 'white'});
         // $('header .site-size__header-container .link-tel__text').css({'color': 'white'});
         $('header.main .contact-box__text-desc').css({'text-decoration': 'underline'});
         $('header.main .header-container__logo').attr('src', patchToMainLogo);
      }
   }
   //slider on home
   $('.slider-container__slider').slick(
       {
          infinite: true,
          responsive: [
             {
                breakpoint: 1024,
                settings: {
                   slidesToShow: 3,
                   slidesToScroll: 3,
                   infinite: true,
                   dots: true
                }
             },
             {
                breakpoint: 600,
                settings: {
                   slidesToShow: 2,
                   slidesToScroll: 2
                }
             },
             {
                breakpoint: 480,
                settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1
                }
             }
             // You can unslick at a given breakpoint now by adding:
             // settings: "unslick"
             // instead of a settings object
          ]
       }
   );

   const path = $('path');
   path.click(function (e){
      // console.log(e.target);
      path.removeClass('active');
      $(this).addClass('active');
   })

   $('.filter__text-row').click(function (){
      if(($(this).siblings('.filters__filter-form')).is(':visible')){
         $(this).siblings('.filters__filter-form').removeClass('open');
      }else{
         $('.filters__filter-form').removeClass('open');
         $(this).siblings('.filters__filter-form').addClass('open');
      }
   });

   $('.tabs-row__tab.f').click(function (){
      $('.tabs-row__tab').removeClass('this-tab');
      $(this).addClass('this-tab');
      $.ajax({
         url: rajax.url,
         method: 'post',
         data: {
            action: 'get-data-posts',
            tax: {'p-cats':$(this).attr('data-cat-id')},
            ptype: $(this).attr('data-post-type'),
         },
         success: function(data){
            $('.targeted-product').html(data);
            //alert(JSON.parse(data));
            // alert(data);
         }
      });
      //get-terms
      $.ajax({
         url: rajax.url,
         method: 'post',
         data: {
            action: 'get-terms',
            ptype: $(this).attr('data-post-type'),
            cpc: $(this).attr('data-cat-id'),
         },
         success: function(data){
            // $('.targeted-product').html(data);
            let currentTab = $('.subtabs__subtab.current').attr('data-tag-id');
            $('.subterms-target').children().slice(1).remove();
            $.each(data, function (index, value){
               let currentClass = "";
               if(currentTab === value['id']){
                  currentClass = "current";
               }
                  let item = '<div class="subtabs__subtab '+currentClass+'" data-tag-id="'+value['id']+'" data-tag-s="'+value['slug']+'">\n' +
                      '   <span class="subtab__text">'+value['name']+'</span>\n' +
                      '  </div>'
                  $('.subterms-target').append(item);
            });
         }
      });
   });
   $('.content__subtabs').on('click', '.subtabs__subtab', function (){
      $('.subtabs__subtab').removeClass('current');
      let thisTab = $(this);
      thisTab.addClass('current');
      $.ajax({
         url: rajax.url,
         method: 'post',
         data: {
            action: 'get-data-posts',
            tax: {'p-cats':$(this).attr('data-tag-id')},
            ptype: $('.f.this-tab').attr('data-post-type'),
         },
         success: function(data){
            $('.targeted-product').html(data);
            //alert(JSON.parse(data));
            // alert(data);
         }
      });
   });
   // $('.subtabs__subtab').click(function (){
   //    $('.subtabs__subtab').removeClass('current');
   //    $(this).addClass('current');
   // });


   $('.default-grid-container__filters-row').submit(function (e){
      e.preventDefault();
      var dataForm = $(this).serializeArray();

      console.log(dataForm);

   });
   // $('.filters-row__filters').on('submit', '.filters__filter-form', function (e){
   //    e.preventDefault();
   //    var dataForm = $(this).serializeArray();
   //    console.log(dataForm[0].name);
   //    if((dataForm[0].name !== "status") && (dataForm[0].name !== "order")){
   //       $.ajax({
   //          url: rajax.url,
   //          method: 'post',
   //          data: {
   //             action: 'get-products',
   //             tax: dataForm[0].value,
   //          },
   //          success: function(data){
   //             $('.targeted').html(data);
   //             //alert(JSON.parse(data));
   //          }
   //       });
   //    }else{
   //       if(dataForm[0].name === "status"){
   //          $.ajax({
   //             url: rajax.url,
   //             method: 'post',
   //             data: {
   //                action: 'get-products-prop',
   //                prop: dataForm[0].name,
   //                val: dataForm[0].value,
   //             },
   //             success: function(data){
   //                $('.targeted').html(data);
   //                //alert(JSON.parse(data));
   //             }
   //          });
   //       }
   //       // ==desc==
   //       if(dataForm[0].name === "order"){
   //          $.ajax({
   //             url: rajax.url,
   //             method: 'post',
   //             data: {
   //                action: 'get-products-prop',
   //                val: dataForm[0].name,
   //                prop: dataForm[0].value,
   //             },
   //             success: function(data){
   //                $('.targeted').html(data);
   //                //alert(JSON.parse(data));
   //             }
   //          });
   //       }
   //    }
   //
   // });
   //
   // $('.filters__filter-form.order').click(function (e){
   //    e.preventDefault();
   //    let catId = $('input[name=filter]:checked').val();
   //    let statusId = $('input[name=status]:checked').val();
   // });
   $('.contact-box__text-desc').click(function (){
      $('.popups').css({'display': 'flex'});
      $('.popups__callback-form').css({'display': 'block'});
   });
   $('.callback-form__close').click(function (){
      $('.popups').css({'display': 'none'});
      $('.popups__callback-form').css({'display': 'none'});
   });
});
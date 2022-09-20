$(document).ready(function (){   console.log(jQuery.fn.jquery);   //change bg header for scrolling   var scrolled;   let patchToMainLogo = $('.header-container__logo').attr('wl');   let patchToSecondLogo = $('.header-container__logo').attr('bl');   window.onscroll = function() {      scrolled = window.pageYOffset || document.documentElement.scrollTop;      if(scrolled > 100){         $("header.main").css({"background-color": "white"});         $('header.main .site-size__header-container a').css({'color': '#232323'});         $('header.main .site-size__header-container .link-tel__text').css({'color': '#232323'});         $('header .site-size__header-container .link-tel__text').css({'color': '#232323'});         $('header.main .contact-box__text-desc').css({'color': '#E50746'});         $('header.second .contact-box__text-desc').css({'color': '#2157ab'});         $('header.main .header-container__burger span').css({'background': '#E50746'});         $('header .header-container__lang-switcher').addClass('header-container__lang-switcher-active');         $('header .header-container__search-box-icon').addClass('active');         $('header.main .header-container__logo').attr('src', patchToSecondLogo);      }      if(scrolled < 100){         $("header.main").css({"background-color": "transparent"});         $('header.main .site-size__header-container a').css({'color': 'white'});         $('header .header-container__lang-switcher').removeClass('header-container__lang-switcher-active');         $('header.main .site-size__header-container .link-tel__text').css({'color': 'white'});         $('header.main .contact-box__text-desc').css({'color': 'white'});         $('header.second .contact-box__text-desc').css({'color': '#E50746'});         $('header.main .header-container__burger span').css({'background': '#FFFFFF'});         $('header .header-container__search-box-icon').removeClass('active');         $('header.main .header-container__logo').attr('src', patchToMainLogo);      }   }   //slider on home   $('.slider-container__slider').slick(       {          infinite: true,          prevArrow: $('.slider-container__slider-prev'),          nextArrow: $('.slider-container__slider-next'),          dots: true,          slidesToShow: 1,          slidesToScroll: 1,          responsive: [             {                breakpoint: 1024,                settings: {                   slidesToShow: 1,                   slidesToScroll: 1                }             },             {                breakpoint: 600,                settings: {                   slidesToShow: 1,                   slidesToScroll: 1                }             },             {                breakpoint: 480,                settings: {                   slidesToShow: 1,                   slidesToScroll: 1                }             }             // You can unslick at a given breakpoint now by adding:             // settings: "unslick"             // instead of a settings object          ]       }   );   $('.show-collapse-btn').click(function (){      if($(this).prev().children('.seo-text__content').hasClass('uncollapsed')){         $(this).prev().children('.seo-text__content').removeClass('uncollapsed');         $(this).text($(this).prev().attr('data-s-text'));      }else{         $(this).prev().children('.seo-text__content').addClass('uncollapsed');         $(this).text($(this).prev().attr('data-h-text'));      }   });   const path = $('path');   path.click(function (e){      // console.log(e.target);      path.removeClass('active');      $(this).addClass('active');   });   function search_popup()   {      var search = $('#search-input').val();      var html = '';      var count = 0;      if(search)      {         $.ajax({            url: rajax.url,            method: 'post',            data: {               action: 'c-search',               as: search            },            async: true,            success: function(data){               for(var i in data)               {                  var name_result_data = data[i]['title'];                  var name_result = name_result_data.replace(new RegExp(search, 'gi'), '<span class="red">'+search+'</span>');                  html += '<div class="search__container-popup-item">';                  html += '<a class="search__container-popup-item-flex" href="'+data[i]['link']+'">';                  html += '<div class="search__container-popup-item-name">'+name_result+'</div>';                  html += '<div class="search__container-popup-item-icon"></div>';                  html += '</a>';                  html += '<div class="search__container-popup-item-desc">'+data[i]['breadcrumbs']+'</div>';                  html += '</div>';                  count = count+1;               }               $('#search-result').html(html);               if(count>5)               {                  $('#search-result').addClass('search__container-popup-height');                  $('#search-result-show').show();               }               else               {                  $('#search-result').removeClass('search__container-popup-height');                  $('#search-result-show').hide();               }            }         });      }      else      {         $('#search-result').html('');      }   }   $('.header-container__search-box-icon').click(function(){      $('.popups').css({'display' : 'flex'});      $('.popups__search').css({'display' : 'block'});      $('#search-input').val('');   });   $('#search-input').keypress(function(){      search_popup();   });   $('#search-input').keyup(function(){      search_popup();   });   $('#search-input').change(function(){      search_popup();   });   $('.search__container-popup-input-icon').click(function(){      var search = $('#search-input').val();      if(search)      {         top.location = '/?s='+encodeURI(search);      }   });   $('#search-result-show').click(function(){      $('#search-result').removeClass('search__container-popup-height');      $('#search-result-show').hide();   });   $('.form-search-input-icon').click(function(){      $('#form-search').submit();   });   $('.filter__text-row').click(function (){      if(($(this).siblings('.filters__filter-form')).is(':visible')){         $(this).siblings('.filters__filter-form').removeClass('open');      }else{         $('.filters__filter-form').removeClass('open');         $(this).siblings('.filters__filter-form').addClass('open');      }   });   $('.filter__text-row-select-name').click(function (){      if(($(this).parent().siblings('.filters__filter-form')).is(':visible')){         $(this).parent().siblings('.filters__filter-form').removeClass('open');      }else{         $('.filters__filter-form').removeClass('open');         $(this).parent().siblings('.filters__filter-form').addClass('open');      }   });   $('.filters-row__filters-clear').click(function (){      $('.filter__text-row-select-counter').html('');      $('.filter__text-row-select').hide();      $('.filters-row__filters-clear').hide();      $('.filter__text-row').show();      $('.default-grid-container__filters-row').trigger("reset");      var dataForm = $('.default-grid-container__filters-row').serializeArray();      $.ajax({         url: rajax.url,         method: 'post',         data: {            action: 'get-filtered-data',            datafilter: dataForm,            ptype: $('.tabs-row__tab.this-tab').attr('data-post-type'),         },         success: function(data){            console.log('fillter-all-clear');            console.log(data);            $('.targeted').html(data);            $('.filters__filter-form.open').removeClass('open');            //alert(JSON.parse(data));            // alert(data);         }      });      $.ajax({         url: rajax.url,         method: 'post',         data: {            action: 'get-pagination',            datafilter: dataForm,            ptype: $('.tabs-row__tab.this-tab').attr('data-post-type'),         },         success: function(data){            console.log(data);            $('.site-size__paginations').html('');            console.log(data.length);            if(data.length > 1){               $('.site-size__paginations').append('<span class="pg-item-btn prev"><</span>');               $.each(data, function (index, value){                  if(index == 1){                     var currentClass = 'cp';                  }else {                     var currentClass = '';                  }                  $('.site-size__paginations').append('<span data-page="'+value+'" class="pg-item '+currentClass+'">'+value+'</span>');               });               $('.site-size__paginations').append('<span class="pg-item-btn next">></span>');            }            // $('.site-size__paginations').html(data);            //alert(JSON.parse(data));            // alert(data);         }      });   });   $('.filter__text-row-select-clear').click(function (){      $(this).parent().parent().find('.filter__text-row-select-counter').html('');      $(this).parent().parent().find('.filter__text-row-select').hide();      $(this).parent().parent().find('.filter__text-row').show();      if(!$('.filter__text-row-select').is(':visible'))      {         $('.filters-row__filters-clear').hide();      }      $(this).parent().parent().find('.filters__filter-form input:checked').prop('checked', false)      var dataForm = $('.default-grid-container__filters-row').serializeArray();      $.ajax({         url: rajax.url,         method: 'post',         data: {            action: 'get-filtered-data',            datafilter: dataForm,            ptype: $('.tabs-row__tab.this-tab').attr('data-post-type'),         },         success: function(data){            // console.log(data);            $('.targeted').html(data);            $('.filters__filter-form.open').removeClass('open');            //alert(JSON.parse(data));            // alert(data);         }      });      $.ajax({         url: rajax.url,         method: 'post',         data: {            action: 'get-pagination',            datafilter: dataForm,            ptype: $('.tabs-row__tab.this-tab').attr('data-post-type'),         },         success: function(data){            console.log('fillter-once-clear');            console.log(data);            $('.site-size__paginations').html('');            console.log(data.length);            if(data.length > 1){               $('.site-size__paginations').append('<span class="pg-item-btn prev"><</span>');               $.each(data, function (index, value){                  if(index == 1){                     var currentClass = 'cp';                  }else {                     var currentClass = '';                  }                  $('.site-size__paginations').append('<span data-page="'+value+'" class="pg-item '+currentClass+'">'+value+'</span>');               });               $('.site-size__paginations').append('<span class="pg-item-btn next">></span>');            }            // $('.site-size__paginations').html(data);            //alert(JSON.parse(data));            // alert(data);         }      });   });   $('.tabs__nap-tab').click(function (){      var dataForm = $('.filters__filter-form').serializeArray();      $('.tabs__nap-tab').removeClass('current');      $(this).addClass('current');      $.ajax({         url: rajax.url,         method: 'post',         data: {            action: 'get-nap-posts',            tax: {'nap-tags':$(this).attr('data-cat-id')},            ptype: $(this).attr('data-post-type'),            datafilter: dataForm         },         success: function(data){            $('.targeted-nap').html(data);            //alert(JSON.parse(data));            // alert(data);         }      });   });   $('.tabs__nap-tab').click(function (){   });   // $('.subtabs__subtab').click(function (){   //    $('.subtabs__subtab').removeClass('current');   //    $(this).addClass('current');   // });   function renderPagination(){      $.ajax({         url: rajax.url,         method: 'post',         data: {            action: 'get-pagination',            datafilter: dataForm,            ptype: $('.tabs-row__tab.this-tab').attr('data-post-type'),         },         success: function(data){            console.log(data);            $('.site-size__paginations').html('');            console.log(data.length);            if(data.length > 1){               $('.site-size__paginations').append('<span class="pg-item prev"><</span>');               $.each(data, function (index, value){                  $('.site-size__paginations').append('<span data-page="'+value+'" class="pg-item">'+value+'</span>');               });               $('.site-size__paginations').append('<span class="pg-item next">></span>');            }            // $('.site-size__paginations').html(data);            //alert(JSON.parse(data));            // alert(data);         }      });   }   $('.default-grid-container__filters-row').submit(function (e){      e.preventDefault();      var dataForm = $(this).serializeArray();      if($('.filters__filter-form.open').parent().attr('id')=='filter-type')      {         var term_count = 0;         for (var term_id in dataForm) {            if (dataForm[term_id].name == 'term')               term_count++;         }         if (term_count > 0) {            $('.filters__filter-form.open').parent().find('.filter__text-row').hide();            $('.filters__filter-form.open').parent().find('.filter__text-row-select-counter').html(term_count);            $('.filters__filter-form.open').parent().find('.filter__text-row-select').show();            $('.filters-row__filters-clear').show();         }      }      if($('.filters__filter-form.open').parent().attr('id')=='filter-state')      {         for (var term_id in dataForm) {            if (dataForm[term_id].name == 'meta')            {               $('.filters__filter-form.open').parent().find('.filter__text-row').hide();               $('.filters__filter-form.open').parent().find('.filter__text-row-select-counter').html($('input[value="'+dataForm[term_id].value+'"]').parent().find('span').text());               $('.filters__filter-form.open').parent().find('.filter__text-row-select').show();               $('.filters-row__filters-clear').show();            }         }      }      $.ajax({         url: rajax.url,         method: 'post',         data: {            action: 'get-filtered-data',            datafilter: dataForm,            ptype: $('.tabs-row__tab.this-tab').attr('data-post-type'),         },         success: function(data){            console.log('fillter-submit');            $('.targeted').html(data);            //alert(JSON.parse(data));            // alert(data);         }      });      // $.ajax({      //    url: rajax.url,      //    method: 'post',      //    data: {      //       action: 'get-pagination',      //       datafilter: dataForm,      //       ptype: $('.tabs-row__tab.this-tab').attr('data-post-type'),      //    },      //    success: function(data){      //       console.log(data);      //       $('.site-size__paginations').html('');      //       console.log(data.length);      //       if(data.length > 1){      //          $('.site-size__paginations').append('<span class="pg-item-btn prev"><</span>');      //          $.each(data, function (index, value){      //             if(index == 1){      //                var currentClass = 'cp';      //             }else {      //                var currentClass = '';      //             }      //             $('.site-size__paginations').append('<span data-page="'+value+'" class="pg-item '+currentClass+'">'+value+'</span>');      //          });      //          $('.site-size__paginations').append('<span class="pg-item-btn next">></span>');      //       }      //       // $('.site-size__paginations').html(data);      //       //alert(JSON.parse(data));      //       // alert(data);      //    }      // });      $('.filters__filter-form.open').removeClass('open');   });   $('.site-size__paginations').on('click', '.pg-item', '', function (){      let ptype = $('.tabs-row__tab.this-tab').attr('data-post-type');      let parentCat = $('.tabs-row__tab.this-tab').attr('data-cat-id');      $('.pg-item').removeClass('cp');      $(this).addClass('cp');      // $('.default-grid-container__filters-row input:checkbox:checked').each(function (){      //    alert("dfsd");      //    let named = $(this).attr('name');      //    let val = $(this).val();      //    console.log(named);      //    console.log(val);      // });      let dataForm = $('.default-grid-container__filters-row').serializeArray();      npage = $(this).text();      console.log(dataForm);      $.ajax({         url: rajax.url,         method: 'post',         data: {            action: 'paginated',            filters: dataForm,            pCat: parentCat,            ptype: ptype,            npage: npage,         },         success: function(data){            // $('.targeted-product').html(data);            $('.targeted').html(data);            //alert(JSON.parse(data));            // alert(data);         }      });   });   $('.tab-contents__card').on('click', '.card__more', '', function (e){      e.preventDefault();      let thisProductId = $(this).parent('.tab-contents__card').attr('data-card-id');      $.ajax({         url: rajax.url,         method: 'post',         data: {            action: 'get-product-by-id',            pid: thisProductId,         },         dataType: 'html',         success: function(data){            $('.product__container-popup').html(data);            $('.popups').css({'display' : 'flex'});            $('.popups__product').css({'display' : 'block'});            $('.popups__product .site-size-nap__topped-row').detach();            //alert(JSON.parse(data));         }      });   });   $('.btn-close').click(function (){      $('.popups').css({'display': 'none'});      $('.popups__product').css({'display': 'none'});      $('.popups__search').css({'display': 'none'});   });   // $('.filters-row__filters').on('submit', '.filters__filter-form', function (e){   //    e.preventDefault();   //    var dataForm = $(this).serializeArray();   //    console.log(dataForm[0].name);   //    if((dataForm[0].name !== "status") && (dataForm[0].name !== "order")){   //       $.ajax({   //          url: rajax.url,   //          method: 'post',   //          data: {   //             action: 'get-products',   //             tax: dataForm[0].value,   //          },   //          success: function(data){   //             $('.targeted').html(data);   //             //alert(JSON.parse(data));   //          }   //       });   //    }else{   //       if(dataForm[0].name === "status"){   //          $.ajax({   //             url: rajax.url,   //             method: 'post',   //             data: {   //                action: 'get-products-prop',   //                prop: dataForm[0].name,   //                val: dataForm[0].value,   //             },   //             success: function(data){   //                $('.targeted').html(data);   //                //alert(JSON.parse(data));   //             }   //          });   //       }   //       // ==desc==   //       if(dataForm[0].name === "order"){   //          $.ajax({   //             url: rajax.url,   //             method: 'post',   //             data: {   //                action: 'get-products-prop',   //                val: dataForm[0].name,   //                prop: dataForm[0].value,   //             },   //             success: function(data){   //                $('.targeted').html(data);   //                //alert(JSON.parse(data));   //             }   //          });   //       }   //    }   //   // });   //   // $('.filters__filter-form.order').click(function (e){   //    e.preventDefault();   //    let catId = $('input[name=filter]:checked').val();   //    let statusId = $('input[name=status]:checked').val();   // });   $('.row-tabs__tab').click(function (){      let number = $(this).index();      $('.row-tabs__tab').removeClass('current');      $(this).addClass('current');      $('.tab-targeted').children().hide();      $('.tab-targeted').children().eq(number).show();   });   $('.contact-box__text-desc').click(function (){      $('.popups').css({'display': 'flex'});      $('.popups__callback-form').css({'display': 'block'});   });   $('.callback-form__close').click(function (){      $('.popups').css({'display': 'none'});      $('.popups__callback-form').css({'display': 'none'});   });   $('input[name="phone"]').mask('(099) 999-9999');   var btn = $('#btntotop');   $(window).scroll(function() {      if ($(window).scrollTop() > 300) {         btn.addClass('showed');      } else {         btn.removeClass('showed');      }   });   btn.on('click', function(e) {      e.preventDefault();      $('html, body').animate({scrollTop:0}, '300');   });   $('.p-item .state-row').click(function (e){      e.preventDefault();      $(this).parent('.marks__mark-row.p-item').children('.state-row').removeClass('active-state');      $(this).addClass('active-state');      $(this).prependTo($(this).parent('.marks__mark-row.p-item'));   });   // собираем все якоря; устанавливаем время анимации и количество кадров   const anchors = [].slice.call(document.querySelectorAll('a[href*="#"]')),       animationTime = 300,       framesCount = 60;   anchors.forEach(function(item) {      // каждому якорю присваиваем обработчик события      item.addEventListener('click', function(e) {         // убираем стандартное поведение         e.preventDefault();         // для каждого якоря берем соответствующий ему элемент и определяем его координату Y         let coordY = document.querySelector(item.getAttribute('href')).getBoundingClientRect().top + window.pageYOffset;         // запускаем интервал, в котором         let scroller = setInterval(function() {            // считаем на сколько скроллить за 1 такт            let scrollBy = coordY / framesCount;            // если к-во пикселей для скролла за 1 такт больше расстояния до элемента            // и дно страницы не достигнуто            if(scrollBy > window.pageYOffset - coordY && window.innerHeight + window.pageYOffset < document.body.offsetHeight) {               // то скроллим на к-во пикселей, которое соответствует одному такту               window.scrollBy(0, scrollBy);            } else {               // иначе добираемся до элемента и выходим из интервала               window.scrollTo(0, coordY);               clearInterval(scroller);            }            // время интервала равняется частному от времени анимации и к-ва кадров         }, animationTime / framesCount);      });   });   $('.one-circle').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_one');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_one');       }   );   $('.circle-section__circle-icon-one-red').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_one');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_one');       }   );   $('.circle-section__circle-icon-one-white').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_one');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_one');       }   );   $('.two-circle').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_two');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_two');       }   );   $('.circle-section__circle-icon-two-red').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_two');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_two');       }   );   $('.circle-section__circle-icon-two-white').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_two');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_two');       }   );   $('.three-circle').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_three');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_three');       }   );   $('.circle-section__circle-icon-three-red').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_three');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_three');       }   );   $('.circle-section__circle-icon-three-white').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_three');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_three');       }   );   $('.four-circle').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_four');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_four');       }   );   $('.circle-section__circle-icon-four-red').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_four');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_four');       }   );   $('.circle-section__circle-icon-four-white').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_four');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_four');       }   );   $('.five-circle').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_five');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_five');       }   );   $('.circle-section__circle-icon-five-red').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_five');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_five');       }   );   $('.circle-section__circle-icon-five-white').hover(       function() {          $('.circle-section__circle').addClass('circle-section__circle_five');       }, function() {          $('.circle-section__circle').removeClass('circle-section__circle_five');       }   );   $('.header-container__burger').click(function(){      $('.header-mobile__menu').slideToggle(300);      setTimeout(function(){         if($('.header-mobile__menu').is(':visible'))            $('body').css({'overflow-y': 'hidden'});         else            $('body').css({'overflow-y': 'auto'});      }, 301);   });});function circle_select(id){   $('.circle-section__circle').removeClass('circle-section__circle_ones');   $('.circle-section__circle').removeClass('circle-section__circle_twos');   $('.circle-section__circle').removeClass('circle-section__circle_threes');   $('.circle-section__circle').removeClass('circle-section__circle_fours');   $('.circle-section__circle').removeClass('circle-section__circle_fives');   $('.circle-section__content_tab').removeClass('active');   $('.circle-section__content_text').hide();   if(id==5)   {      $('.circle-section__circle').addClass('circle-section__circle_fives');      $('.circle-section__content_tab:nth-child(5)').addClass('active');      $('#circle-text-five').fadeIn(500);   }   else if(id==4)   {      $('.circle-section__circle').addClass('circle-section__circle_fours');      $('.circle-section__content_tab:nth-child(4)').addClass('active');      $('#circle-text-four').fadeIn(500);   }   else if(id==3)   {      $('.circle-section__circle').addClass('circle-section__circle_threes');      $('.circle-section__content_tab:nth-child(3)').addClass('active');      $('#circle-text-three').fadeIn(500);   }   else if(id==2)   {      $('.circle-section__circle').addClass('circle-section__circle_twos');      $('.circle-section__content_tab:nth-child(2)').addClass('active');      $('#circle-text-two').fadeIn(500);   }   else   {      $('.circle-section__circle').addClass('circle-section__circle_ones');      $('.circle-section__content_tab:nth-child(1)').addClass('active');      $('#circle-text-one').fadeIn(500);   }}// ===filters===$('.tabs-row__tab.f').click(function (){   alert("1");   $('.tabs-row__tab').removeClass('this-tab');   $(this).addClass('this-tab');   $.ajax({      url: rajax.url,      method: 'post',      data: {         action: 'get-data',         paginate: false,         tax: {'p-cats':$(this).attr('data-cat-id')},         ptype: $(this).attr('data-post-type'),         count: $(this).attr('data-count'),      },      success: function(data){         // console.log(JSON.parse(data));         $('.targeted-product').html(data);         // alert(JSON.parse(data));         // alert(data);      }   });   $.ajax({      url: rajax.url,      method: 'post',      data: {         action: 'get-data',         spaginate: true,         apaged: 1,         tax: {'p-cats':$(this).attr('data-cat-id')},         ptype: $(this).attr('data-post-type'),         count: $(this).attr('data-count'),      },      success: function(pagination){         console.log(pagination);         // console.log(JSON.parse(data));         // $('.targeted-product').html(data);         // alert(JSON.parse(data));         // alert(data);      }   });   //get-terms   $.ajax({      url: rajax.url,      method: 'post',      data: {         action: 'get-terms',         tax: 'p-cats',         ptype: $(this).attr('data-post-type'),         cpc: $(this).attr('data-cat-id'),      },      success: function(data){         // $('.targeted-product').html(data);         let currentTab = $('.subtabs__subtab.current').attr('data-tag-id');         $('.subterms-target').children().slice(1).remove();         $.each(data, function (index, value){            let currentClass = "";            if(currentTab === value['id']){               currentClass = "current";            }            let item = '<div class="subtabs__subtab '+currentClass+'" data-tag-id="'+value['id']+'" data-tag-s="'+value['slug']+'">\n' +                '   <span class="subtab__text">'+value['name']+'</span>\n' +                '  </div>'            $('.subterms-target').append(item);         });      }   });});$('.content__subtabs').on('click', '.subtabs__subtab', function (){   $('.subtabs__subtab').removeClass('current');   let thisTab = $(this);   thisTab.addClass('current');   if(typeof($(this).attr('data-tag-id')) === "undefined"){      var thisId = $('.f.this-tab').attr('data-cat-id');   }else{      var thisId = $(this).attr('data-tag-id');   }   $.ajax({      url: rajax.url,      method: 'post',      data: {         action: 'get-data',         spaginate: $(this).attr('data-p'),         ptype: $(this).attr('data-post-type'),         count: $(this).attr('data-count'),         tax: {'p-cats': thisId},         //ptype: $('.f.this-tab').attr('data-post-type'),      },      success: function(data){         $('.targeted-product').html(data);         //alert(JSON.parse(data));         // alert(data);      }   });   $.ajax({      url: rajax.url,      method: 'post',      data: {         action: 'get-data',         spaginate: $(this).attr('data-p'),         apaged: 1,         tax: {'p-cats':$(this).attr('data-tag-id')},         ptype: $(this).attr('data-post-type'),         count: $(this).attr('data-count'),      },      success: function(pagination){         console.log(pagination);         // console.log(JSON.parse(data));         // $('.targeted-product').html(data);         // alert(JSON.parse(data));         // alert(data);      }   });});//catalog products filters$('.tabs-row__tab').click(function (){   $('.tabs-row__tab').removeClass('this-tab');   $(this).addClass('this-tab');   $.ajax({      url: rajax.url,      method: 'post',      data: {         action: 'get-data',         paginate: false,         tax: {'p-cats':$(this).attr('data-cat-id')},         ptype: $(this).attr('data-post-type'),         count: $(this).attr('data-count'),      },      success: function(data){         $('.tabs__tab-contents.targeted').html(data);         // console.log(JSON.parse(data));         // $('.targeted-product').html(data);         // alert(JSON.parse(data));         // alert(data);      }   });   $.ajax({      url: rajax.url,      method: 'post',      data: {         action: 'get-data',         spaginate: true,         apaged: 1,         tax: {'p-cats':$(this).attr('data-cat-id')},         ptype: $(this).attr('data-post-type'),         count: $(this).attr('data-count'),      },      success: function(pagination){         // console.log(JSON.parse(data));         $('.site-size__paginations').html(pagination);         // alert(JSON.parse(data));         // alert(data);      }   });});function product_popup(index){   let thisProductId = $(index).parent('.tab-contents__card').attr('data-card-id');   $.ajax({      url: rajax.url,      method: 'post',      data: {         action: 'get-product-by-id',         pid: thisProductId,      },      dataType: 'html',      success: function(data){         $('.product__container-popup').html(data);         $('.popups').css({'display' : 'flex'});         $('.popups__product').css({'display' : 'block'});         $('.popups__product .site-size-nap__topped-row').detach();         //alert(JSON.parse(data));      }   });}
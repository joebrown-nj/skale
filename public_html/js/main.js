const bsOffcanvas = new bootstrap.Offcanvas('#oCNav')

$(document).on('click', '.lbc', function(){
    logButtonClick(this);
});

function logButtonClick(t) {
    var d = { 
        'target': $(t).attr('href'), 
        'url': window.location.pathname,
        'detail': $(t).attr('aria-describedby')
    };

    $.ajax({
        type: 'POST',
        url:    '/log-button-click',
        data: d,
    });
    return false;
}

$(document).on('click', '.mbtn', function(t){
    const url = !t.target.href ? '' : new URL(t.target.href);
    const slug = !t.target.pathname ? '/' : t.target.pathname;
    const queryString = url.search.replace('?','');

    ajaxGetPageContent(slug, queryString, t);

    bsOffcanvas.hide();

    return false;
});

function setActiveNavItem(url) {
    $('#oCNav .active').removeClass('active');

    var adjustedUrl = url == '/' || url == '' ? url : url.replace('/','').replaceAll('/','-');
    adjustedUrl = adjustedUrl.trim();

    if(url != '/')
        $('.navbar-nav li.' + adjustedUrl).addClass('active');
    else
        $('.navbar-nav li').first().addClass('active');
}

/*********************************************************************************** */
// back button support for ajax loaded pages
function handlePopState(event) {
    if (event.state.page) {
        ajaxGetPageContent(event.state.page, '', event, false);
    }
};

window.onpopstate = handlePopState;
/*********************************************************************************** */

function ajaxGetPageContent(slug, queryString, event, addToHistory=true) {
    removeAllAlerts();
// console.log('ajaxGetPageContent called: ', slug, url);
    // handles back button support - do not add to history if triggered by back button
    var url = slug  + (queryString && queryString.length > 0 ? '?' + queryString : '');

    if(addToHistory){
        var page = event.state ? event.state.page : slug;
        var title = event.state ? event.state.title : document.title;
        history.pushState({page:page, title: title}, title, url);
    }
// console.log('setActiveNavItem called: ', slug, url, queryString);
    setActiveNavItem(slug);

    // get page html content
    $.ajax({
        type: 'GET',
        url: slug + '?header=false&footer=false' + (queryString && queryString.length > 0 ? '&' + queryString : ''),
        success: function(data){
            // console.log('ajaxGetPageContent success:', data);
            $('.page-content').html(data);
            $(window).scrollTop(0);
        }
    }).done(function() {
        if(!slug || slug.length == 0 || slug == '/'){
            $('header.menu-bar').removeClass('menu-bar-bg');
        } else {
            $('header.menu-bar').addClass('menu-bar-bg');
        }

        $.ajax({
            type:'GET',
            url:'/meta-data/'+encodeURIComponent(slug),
            success:function(data){
                if(data){
                    // console.log(data);
                    var json=$.parseJSON(data);$('meta[name=description]').attr('content',json.description);
                    $('meta[name=keywords]').attr('content',json.keywords);
                    $('head title').text(json.title);
                    $('link[rel="canonical"]').attr('href',window.location.href);
                    $('meta[property="og:description"]').attr('content',json.description);
                    $('meta[property="og:type"]').attr('content',window.location.href.includes('/blog/')?'article':'website');
                    $('meta[property="og:title"]').attr('content',json.title);
                    $('meta[property="og:URL"]').attr('content',window.location.href)
                }
            }
        });
        // hideOverlay();
    });

    return false;
}

//page loading spinner
$(document).ajaxSend(function() {
    showOverlay();
});

// $(document).ajaxComplete(function() {
$(document).ajaxStop(function() {
    hideOverlay();
});

function showOverlay() {
    $('#overlay').fadeIn(300);
    $('body').css({'overflow':'hidden', 'padding-right': '17px'});
    // $('body').attr('data-bs-scroll', 'false');
}

function hideOverlay() {
    setTimeout(function(){
        $('#overlay').fadeOut(300);
        $('body').css({'overflow':'auto', 'padding-right': ''});
        // $('body').attr('data-bs-scroll', 'true');
    },250);
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1)
}

function removeAllAlerts() {
    $('.alert').remove();
}

// email-list-signup form validation
$(document).on('click', '#newsletterForm button', function(){
    let errors = [];
    showOverlay();
    $('#newsletterForm .required').each(function(t){
        if(!$(this).val()){
            errors.push(capitalizeFirstLetter(this.name) + ' is required');
        }
    });

    $('#newsletterForm .alert-danger').remove();
    $('#newsletterForm .alert-success').remove();

    if(errors.length > 0){
        $('#newsletterForm').prepend('<div class="alert alert-danger" role="alert">' + errors.join('. ') + '.</div>');
        hideOverlay();
    } else {
        $.ajax({
            type: 'POST',
            url:    '/email-list-signup?header=false&footer=false',
            data: $('#newsletterForm').serializeArray(),
            dataType: "json",
            success: function(data){
                document.getElementById("newsletterForm").reset();
                if(data.error && data.error.length > 0){
                    $('#newsletterForm').prepend('<div class="alert alert-success" role="alert">' + data.error + '</div>');
                }

                if(data.success && data.success.length > 0) {
                    $('#newsletterForm').prepend('<div class="alert alert-success" role="alert">' + data.success + '</div>');
                }
            }
        }).done(function() {
            hideOverlay();
        });
    }
    return false;
});

// contact form validation
$(document).on('click', '#contactForm button', function(){
    let errors = [];
    showOverlay();
    $('#contactForm .required').each(function(t){
        if(!$(this).val()){
            errors.push(capitalizeFirstLetter(this.name) + ' is required');
        }
    });

    $('#contactForm .alert-danger').remove();
    $('#contactForm .alert-success').remove();

    if(errors.length > 0){
        $('#contactForm').prepend('<div class="alert alert-danger" role="alert">' + errors.join('<br/>') + '.</div>');
        hideOverlay();
    } else {
        $.ajax({
            type: 'POST',
            url:    '/contact-form?header=false&footer=false',
            data: $('#contactForm').serializeArray(),
            dataType: "json",
            success: function(data){
                if(data.error && data.error.length > 0){
                    $('#contactForm').prepend('<div class="alert alert-danger" role="alert">' + data.error + '</div>');
                }

                if(data.success && data.success.length > 0) {
                    document.getElementById("contactForm").reset();
                    $('#contactForm').prepend('<div class="alert alert-success" role="alert">' + data.success + '</div>');
                }
            }
        }).done(function() {
            hideOverlay();
        });
    }

    return false;
});


// $(window).scroll(function() {
// adds background to menu bar on scroll
$(document).on('scroll', function(){
    if($(".home-callout").length){
        var header = $('header.menu-bar');
        var hieghtThreshold = $(".home-callout").offset().top - 150;
        var scroll = $(window).scrollTop();

        if (scroll >= hieghtThreshold) {
            header.addClass('menu-bar-bg');
        } else {
            header.removeClass('menu-bar-bg');
        }
    }
});

// $(document).on('scroll', function(){
//     if($(".service-cards-container").length){
//         // var cardContainerHeight = $(".service-cards-container").outerHeight();
//         var cards = $('.service-card');
//         var hieghtThresholdTop = $(".service-cards-container").offset().top - 150;
//         var hieghtThresholdBottom = hieghtThresholdTop + $(".service-cards-container").outerHeight();
//         var scroll = $(window).scrollTop();

//         if(scroll < hieghtThresholdTop || scroll >= hieghtThresholdBottom) {
//             $('.service-card').removeClass('service-card-in');
//             $(".service-cards-container").css('padding-top');
//         } else {
//             cards.each(function(){
//                 var cardTop = $(this).offset().top - 150;
//                 var cardHeight = $(this).outerHeight();

//                 if (scroll >= cardTop) {
//                     $(this).addClass('service-card-in');
//                     $(this).addClass('sticky-top');
//                 }
//             });
//         }
//     }
// });

// Initialize AOS (Animate On Scroll) library
// AOS.init();
AOS.init({
    // once: true,
    duration: 900,
    easing: 'ease-out-cubic'
});

window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-5HMT5HBM1Y');

// const myOffcanvas = document.getElementById('oCNav')

// myOffcanvas.addEventListener('hidden.bs.offcanvas', event => {
//     console.log(event);
// });

// myOffcanvas.addEventListener('hide.bs.offcanvas', event => {
//     console.log(event);
// });

// myOffcanvas.addEventListener('show.bs.offcanvas', event => {
//     console.log(event);
// });

// myOffcanvas.addEventListener('shown.bs.offcanvas', event => {
//     console.log(event);
// });
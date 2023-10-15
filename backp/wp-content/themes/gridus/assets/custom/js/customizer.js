(function ($) {
    // Gridus Layout
    wp.customize('color_scheme', function (value) {
        value.bind(function (to) {
            var linkHref = 'wp-content/themes/gridus/assets/custom/css/colors/' + to + '.css';
            var cssId = 'gridus-color-scheme-css';

            if (!document.getElementById(cssId)) {
                var head  = document.getElementsByTagName('head')[0];
                if (head == undefined) return;
                var link  = document.createElement('link');
                link.id   = cssId;
                link.rel  = 'stylesheet';
                link.type = 'text/css';
                link.href = linkHref;
                link.media = 'screen';
                head.appendChild(link);
            } else {
                document.getElementById(cssId).parentNode.insertBefore(document.getElementById(cssId), null);
                document.getElementById(cssId).href = linkHref;
            }

        });
    });
    // Layout width
    wp.customize('layout_width', function (value) {
        value.bind(function (to) {
            if (to == 'wide') {
                $('body').removeClass('boxed');
            } else if (to == 'boxed') {
                $('body').addClass('boxed');
            }
        });
    });
    // Gridus Header
    wp.customize('name', function (value) {
        value.bind(function (to) {
            $('.name-title h2').html(to);
        });
    });
    wp.customize('intro_fixed_part', function (value) {
        value.bind(function (to) {
            $('.cd-headline span:eq(0)').html(to);
        });
    });
    wp.customize('intro_dynamic_parts', function (value) {
        value.bind(function (to) {
            $('.cd-headline span:eq(1)').first().html(to);
            window.animateHeadline($('.cd-headline'));
        });
    });
    wp.customize('cv_file', function (value) {
        value.bind(function (to) {
            $('.name-title').removeClass('col-md-12').addClass('col-md-10');
            $('#cv_file').removeClass('hidden');
            $('#cv_file a').attr('href', to);
        });
    });
    wp.customize('social_logo', function (value) {
        value.bind(function (to) {
            $('.position-title').removeClass('col-md-12').addClass('col-md-10');
            $('#behance_link').removeClass('hidden');
            $('#behance_link i').attr('class', 'flaticon-' + to);
        });
    });
    wp.customize('social_link', function (value) {
        value.bind(function (to) {
            $('.position-title').removeClass('col-md-12').addClass('col-md-10');
            $('#behance_link').removeClass('hidden');
            $('#behance_link a').attr('href', to);
        });
    });
    // Gridus Footer
    wp.customize('copyright', function (value) {
        value.bind(function (to) {
            $('.copyrights p').html(to);
        });
    });

})(jQuery);
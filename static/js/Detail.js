$(function() {
    function DY_scroll(wraper, prev, next, img, speed, or) {
        var wraper = $(wraper);
        var prev = $(prev);
        var next = $(next);
        var img = $(img).find('ul');
        var w = img.find('li').outerWidth(true);
        var s = speed;
        next.click(function() {
            img.animate({
                'margin-left': -w
            },
            function() {
                img.find('li').eq(0).appendTo(img);
                img.css({
                    'margin-left': 0
                });
            });
        });
        prev.click(function() {
            img.find('li:last').prependTo(img);
            img.css({
                'margin-left': -w
            });
            img.animate({
                'margin-left': 0
            });
        });
        if (or == true) {
            ad = setInterval(function() {
                next.click();
            },
            s * 1000);
            wraper.hover(function() {
                clearInterval(ad);
            },
            function() {
                ad = setInterval(function() {
                    next.click();
                },
                s * 1000);
            });

        }
    }
    DY_scroll('.img_scroll', '.img_list', 1, false);
    $(function() {
        $('.img_list img').bind('mouseover',
        function() {
            var src = $(this).attr('rel');
			var maximg = $(this).attr('maximg');
            $('.jqzoom_pm img').attr('src', src);
            $('.jqzoom_pm img').attr('alt', maximg);
            $('#jqzoom_a').attr('href', maximg);
        });
        $(".jqzoom_pm").jqueryzoom({
            xzoom: 400,
            yzoom: 390,
            offset: 18,
            position: 'right'
        });
    });
    $('.img_list ul li').hover(function() {
        $('.img_list ul li').removeClass('on');
        $(this).addClass('on');
    });
});
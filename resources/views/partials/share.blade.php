<div class="section">
    <div class="container">
        <div class="text-lg-center">
            <h3 class="display-3 font-weight-light mb-2">Share this article on</h3>
        </div>
        <div class="text-lg-center btn-wrapper">
            @if(config('blogged.social.twitter'))
                <a target="_blank" href="https://twitter.com/intent/tweet/?text={{ $description }}&amp;url={{ $url }}" class="btn btn-neutral  btn-twitter btn-round btn-lg">
                    <i class="fa fa-twitter"></i> Twitter
                </a>
            @endif

            @if(config('blogged.social.facebook'))
                <a target="_blank" href="https://facebook.com/sharer/sharer.php?u={{ $url }}" class="btn btn-neutral btn-facebook btn-round btn-lg">
                    <i class="fa fa-facebook-square"></i> Facebook
                </a>
            @endif

            @if(config('blogged.social.linkedin'))
                <a target="_blank" href="https://facebook.com/sharer/sharer.php?u={{ $url }}" class="btn btn-neutral btn-linkedin btn-round btn-lg">
                    <i class="fa fa-linkedin-square"></i> LinkedIn
                </a>
            @endif

            @if(config('blogged.social.google'))
                <a target="_blank" href="https://plus.google.com/share?url=http%3A%2F%2Fsharingbuttons.io" class="btn btn-neutral btn-google-plus btn-round btn-lg">
                    <i class="fa fa-google-plus-square"></i> Google+
                </a>
            @endif

            @if(config('blogged.social.tumblr'))
                <a target="_blank" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;caption=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;content=http%3A%2F%2Fsharingbuttons.io&amp;canonicalUrl=http%3A%2F%2Fsharingbuttons.io&amp;shareSource=tumblr_share_button" class="btn btn-neutral btn-linkedin btn-round btn-lg">
                    <i class="fa fa-tumblr-square"></i> tumblr
                </a>
            @endif

            @if(config('blogged.social.email'))
                <a target="_blank" href="mailto:?subject=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;body=http%3A%2F%2Fsharingbuttons.io" class="btn btn-neutral btn-linkedin btn-round btn-lg">
                    <i class="fa fa-email-square"></i> Email
                </a>
            @endif

            @if(config('blogged.social.pinterest'))
                <a target="_blank" href="https://pinterest.com/pin/create/button/?url=http%3A%2F%2Fsharingbuttons.io&amp;media=http%3A%2F%2Fsharingbuttons.io&amp;description=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking." class="btn btn-neutral btn-pinterest btn-round btn-lg">
                    <i class="fa fa-pinterest-square"></i> Pinterest
                </a>
            @endif

            @if(config('blogged.social.reddit'))
                <a target="_blank" href="https://reddit.com/submit/?url=http%3A%2F%2Fsharingbuttons.io" class="btn btn-neutral btn-linkedin btn-round btn-lg">
                    <i class="fa fa-google-square"></i> Reddit
                </a>
            @endif

            @if(config('blogged.social.whatsApp'))
                <a target="_blank" href="whatsapp://send?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.%20http%3A%2F%2Fsharingbuttons.io" class="btn btn-neutral btn-linkedin btn-round btn-lg">
                    <i class="fa fa-google-square"></i> WhatsApp
                </a>
            @endif

            @if(config('blogged.social.telegram'))
                <a target="_blank" href="https://telegram.me/share/url?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;url=http%3A%2F%2Fsharingbuttons.io" class="btn btn-neutral btn-linkedin btn-round btn-lg">
                    <i class="fa fa-google-square"></i> Telegram
                </a>
            @endif
        </div>
        <hr>
    </div>
</div>
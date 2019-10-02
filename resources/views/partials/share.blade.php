<div class="section">
    <div class="container">
        <div class="text-center">
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
                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ $url }}&amp;title={{ $title }}&amp;summary={{ $description }}&amp;source={{ $url }}" class="btn btn-neutral btn-linkedin btn-round btn-lg">
                    <i class="fa fa-linkedin-square"></i> LinkedIn
                </a>
            @endif

            @if(config('blogged.social.tumblr'))
                <a target="_blank" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title={{ $title }}&amp;caption={{ $description }}&amp;content={{ $url }}&amp;canonicalUrl={{ $url }}&amp;shareSource=tumblr_share_button" class="btn btn-neutral btn-linkedin btn-round btn-lg">
                    <i class="fa fa-tumblr-square"></i> tumblr
                </a>
            @endif
  
            @if(config('blogged.social.email'))
                <a target="_blank" href="mailto:?subject={{ $title }}&amp;body={{ $url }}" class="btn btn-neutral btn-linkedin btn-round btn-lg">
                    <i class="fa fa-email-square"></i> Email
                </a>
            @endif

            @if(config('blogged.social.pinterest'))
                <a target="_blank" href="https://pinterest.com/pin/create/button/?url={{ $url }}&amp;media={{ $url }}&amp;description={{ $description }}" class="btn btn-neutral btn-pinterest btn-round btn-lg">
                    <i class="fa fa-pinterest-square"></i> Pinterest
                </a>
            @endif
  
            @if(config('blogged.social.telegram'))
                <a target="_blank" href="https://telegram.me/share/url?text={{ $title }}&amp;url={{ $url }}" class="btn btn-neutral btn-linkedin btn-round btn-lg">
                    <i class="fa fa-telegram"></i> Telegram
                </a>
            @endif

            @if(config('blogged.social.whatsapp'))
                <a target="_blank" href="whatsapp://send?text={{ $url }}=" class="btn btn-neutral btn-slack btn-round btn-lg">
                    <i class="fa fa-whatsapp"></i> Whatsapp
                </a>
            @endif
        </div>
        <hr>
    </div>
</div>
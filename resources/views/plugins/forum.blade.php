@if(config('blogged.forum.enabled'))
    @if(config('blogged.forum.default') == 'disqus' && config('blogged.forum.services.disqus.site_name'))
        <div class="section">
            <div class="container">
                <div id="disqus_thread"></div>
                <script async>
                    var disqus_config = function () {
                        this.page.url = '{{ $url }}';
                        this.page.identifier = '{{ $slug }}';
                    };
                    (function() {
                    var d = document, s = d.createElement('script');
                    s.src = "https://{{ config('blogged.forum.services.disqus.site_name') }}.disqus.com/embed.js";
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </div>
        </div>
    @endif
@endif
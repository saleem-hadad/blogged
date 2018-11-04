<footer class="footer mt-5">
    <div class="container">
        <div class="row align-items-center justify-content-md-between">
            <div class="col-md-6">
                <div class="copyright">
                    © 2018
                    <a href="/">{{ config('app.name') }}</a>
                </div>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-footer justify-content-end">
                    @if(config('blogged.footer_links') !== null)
                        @foreach(config('blogged.footer_links') as $link)
                            @if($link['url'] !== '')
                                <li class="nav-item">
                                    <a href="{{ $link['url'] }}" class="nav-link">{{ $link['name'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</footer>

<p style="font-size: 0.8rem; text-align: center; background: #f4f5f7;" class="mb-0 py-1"><a href="https://blogged.binarytorch.com.my" target="__blank">Blogged</a> · Made with love by Binary Torch Sdn. Bhd. · {{ blogged_version() }}</p>
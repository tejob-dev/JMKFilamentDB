@php

$lienfooters = App\Models\Lienfooter::get();

@endphp

<!-- main-footer -->
<section class="main-footer">
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="bottom-inner">
                <ul class="footer-nav">
                    @foreach($lienfooters as $lienfooter)
                    <li><a href="{{ $lienfooter?->lien_page }}">{{ $lienfooter?->titre }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- main-footer end -->
@props([
    'title',
    'image',
    'url' => '#',
    'delay' => '0s',
])<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
    <div
        class="card-style-2 hover-up hover-neon wow animate__animated animate__fadeIn"
        data-wow-delay="{{ $delay }}"
    >
        <div class="card-image">
            <a href="{{ $url }}">
                <img src="{{ asset($image) }}" alt="{{ $title }}">
            </a>
        </div>

        <div class="card-info">
            <a class="color-gray-500" href="{{ $url }}">
                {{ $title }}
            </a>
        </div>
    </div>
</div>
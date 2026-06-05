@props([
    'title',
    'description',
    'image',
    'date',
    'url' => '#',
])

<div class="col-lg-6">
    <div class="card-list-posts card-list-posts-small wow animate__animated animate__fadeIn">

        <div class="card-image hover-up">
            <a href="{{ $url }}">
                <img
                    src="{{ asset($image) }}"
                    alt="{{ $title }}"
                >
            </a>
        </div>

        <div class="card-info">

            <a href="{{ $url }}">
                <h5 class="mb-15 color-white">
                    {{ $title }}
                </h5>
            </a>

            <p class="color-gray-500">
                {{ $description }}
            </p>

            <div class="row mt-20">
                <div class="col-12">

                    <span class="calendar-icon color-gray-700 text-sm mr-25">
                        {{ $date }}
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
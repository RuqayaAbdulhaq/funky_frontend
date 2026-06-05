@props([
    'title',
    'image',
    'author',
    'authorImage',
    'date',
    'url' => '#',
    'categoryUrl' => '#',
    'postType' => '',
    'delay' => '0s',
])

<div class="col-lg-4">
    <div
        class="card-style-1 hover-up mb-30 wow animate__animated animate__fadeIn"
        data-wow-delay="{{ $delay }}"
    >
        <div class="card-image">

            <a
                class="post-type {{ $postType }}"
                href="{{ $categoryUrl }}"
            ></a>

            <a class="link-post" href="{{ $url }}">
                <img
                    src="{{ asset($image) }}"
                    alt="{{ $title }}"
                >

                <div class="card-info card-bg-2">
                    <div class="info-bottom mb-15">

                        <h4 class="color-white mb-15">
                            {{ $title }}
                        </h4>

                        <div class="box-author">
                            <img
                                src="{{ asset($authorImage) }}"
                                alt="{{ $author }}"
                            >

                            <div class="author-info">
                                <h6 class="mr-15 color-gray-700">
                                    {{ $author }}
                                </h6>

                                <span class="color-gray-700 text-sm">
                                    {{ $date }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
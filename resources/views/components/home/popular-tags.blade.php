@php
    $tags = [
        [
            'title' => 'Travel',
            'image' => 'imgs/page/homepage1/tag1.png',
            'delay' => '0s',
        ],
        [
            'title' => 'Culture',
            'image' => 'imgs/page/homepage1/tag2.png',
            'delay' => '0.1s',
        ],
        [
            'title' => 'Lifestyle',
            'image' => 'imgs/page/homepage1/tag3.png',
            'delay' => '0.2s',
        ],
        [
            'title' => 'Fashion',
            'image' => 'imgs/page/homepage1/tag4.png',
            'delay' => '0.3s',
        ],
        [
            'title' => 'Food',
            'image' => 'imgs/page/homepage1/tag5.png',
            'delay' => '0.4s',
        ],
        [
            'title' => 'Space',
            'image' => 'imgs/page/homepage1/tag6.png',
            'delay' => '0.5s',
        ],
        [
            'title' => 'Travel',
            'image' => 'imgs/page/homepage1/tag1.png',
            'delay' => '0s',
        ],
        [
            'title' => 'Culture',
            'image' => 'imgs/page/homepage1/tag2.png',
            'delay' => '0.1s',
        ],
        [
            'title' => 'Lifestyle',
            'image' => 'imgs/page/homepage1/tag3.png',
            'delay' => '0.2s',
        ],
        [
            'title' => 'Fashion',
            'image' => 'imgs/page/homepage1/tag4.png',
            'delay' => '0.3s',
        ],
        [
            'title' => 'Food',
            'image' => 'imgs/page/homepage1/tag5.png',
            'delay' => '0.4s',
        ],
        [
            'title' => 'Space',
            'image' => 'imgs/page/homepage1/tag6.png',
            'delay' => '0.5s',
        ],
    ];
@endphp
<div class="mt-70 mb-50">
    <h2 class="color-linear d-inline-block mb-10 wow animate__animated animate__fadeInUp">
        Popular Tags
    </h2>

    <p class="text-lg color-gray-500 wow animate__animated animate__fadeInUp">
        Most searched keywords
    </p>

    <div class="row mt-70 mb-50">
        @foreach ($tags as $tag)
            <x-home.tag :title="$tag['title']" :image="$tag['image']" :delay="$tag['delay']" url="blog-archive.html" />
        @endforeach
    </div>
</div>
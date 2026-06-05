@php
    $articles = [
        [
            'title' => 'Aenean Auctor Wisi Et Urna Aliquam Erat',
            'image' => 'imgs/page/homepage3/news1.png',
            'author' => 'Thomson',
            'authorImage' => 'imgs/page/homepage3/author.jpg',
            'date' => '25 April 2022',
            'postType' => '',
            'delay' => '.0s',
        ],
        [
            'title' => 'The Best Cities to Travel Alone in the USA',
            'image' => 'imgs/page/homepage3/news2.png',
            'author' => 'Thomson',
            'authorImage' => 'imgs/page/homepage3/author.jpg',
            'date' => '25 April 2022',
            'postType' => 'post-image',
            'delay' => '.1s',
        ],
        [
            'title' => 'Rodrigues Island: When I Found a Paradise',
            'image' => 'imgs/page/homepage3/news3.png',
            'author' => 'Thomson',
            'authorImage' => 'imgs/page/homepage3/author.jpg',
            'date' => '25 April 2022',
            'postType' => 'post-audio',
            'delay' => '.2s',
        ],
    ];
@endphp

<div class="mt-70 mb-50">

    <h2 class="color-linear mb-10 wow animate__animated animate__fadeInUp">
        Featured Articles
    </h2>

    <p class="text-lg color-gray-500 wow animate__animated animate__fadeInUp">
        Keep up with our latest frontend adventures
    </p>

    <div class="row mt-70">

        @foreach ($articles as $article)
            <x-home.article-card :title="$article['title']" :image="$article['image']" :author="$article['author']"
                :author-image="$article['authorImage']" :date="$article['date']" :post-type="$article['postType']"
                :delay="$article['delay']" url="single-sidebar.html" category-url="blog-archive.html" />
        @endforeach

    </div>
</div>
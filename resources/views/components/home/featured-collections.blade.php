@php
    $posts = [
        [
            'title' => 'How to Grow Your Business on Instagram in 2022',
            'description' => 'Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far',
            'image' => 'imgs/page/homepage3/img7.jpg',
            'date' => '29 May 2022',
        ],
        [
            'title' => 'Helpful Tips for Working from Home as a Freelancer',
            'description' => 'Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far',
            'image' => 'imgs/page/homepage3/img8.jpg',
            'date' => '29 May 2022',
        ],
        [
            'title' => 'The 6 Best Celebration Ideas for Virtual Teams',
            'description' => 'Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard roadrunner flapped lynx far that and jeepers giggled far and far',
            'image' => 'imgs/page/homepage3/img9.jpg',
            'date' => '29 May 2022',
        ],
    ];
@endphp

<div class="row mt-70">

    <div class="col-lg-12">

        <h2 class="color-linear d-inline-block mb-10 wow animate__animated animate__fadeInUp">
            Recent Collections
        </h2>

        <p class="text-lg color-gray-500 wow animate__animated animate__fadeInUp">
            Don't miss our latest design systems
        </p>

        <div class="box-list-posts mt-70">
            <div class="row">

                @foreach ($posts as $post)
                    <x-home.collection :title="$post['title']" :description="$post['description']" :image="$post['image']"
                        :date="$post['date']" url="single-sidebar.html" />
                @endforeach

            </div>
        </div>

        <div class="text-start mb-80">
            <a class="btn btn-linear btn-load-more wow animate__animated animate__zoomIn">
                Show All Collections
                <i class="fi-rr-arrow-small-right"></i>
            </a>
        </div>

    </div>

</div>
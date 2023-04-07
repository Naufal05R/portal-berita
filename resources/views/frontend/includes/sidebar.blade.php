<!-- ======= Sidebar ======= -->
<div class="aside-block">

    <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular"
                type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">

        <!-- Popular -->
        <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
            @foreach ($side_news as $row)
                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date">{{ $row->category->name }}</span> <span
                            class="mx-1">&bullet;</span>
                        <span>{{ $row->created_at }}</span>
                    </div>
                    <h2 class="mb-2"><a href="{{ route('detailNews', $row->slug) }}">{{ $row->title }}</a>
                    </h2>
                    <span class="author mb-3 d-block">Naufal Rabbani</span>
                </div>
            @endforeach
        </div> <!-- End Popular -->

    </div>
</div>

<div class="aside-block">
    <h3 class="aside-title">Categories</h3>
    <ul class="aside-links list-unstyled">
        @foreach ($nav_category as $row)
            <li><a href="{{ route('detailCategory', $row->slug) }}"><i
                        class="bi bi-chevron-right"></i>{{ $row->name }}</a></li>
        @endforeach
    </ul>
</div><!-- End Categories -->

<div class="aside-block">
    <h3 class="aside-title">Tags</h3>
    <ul class="aside-tags list-unstyled">
        <li><a href="category.html">Business</a></li>
        <li><a href="category.html">Culture</a></li>
        <li><a href="category.html">Sport</a></li>
        <li><a href="category.html">Food</a></li>
        <li><a href="category.html">Politics</a></li>
        <li><a href="category.html">Celebrity</a></li>
        <li><a href="category.html">Startups</a></li>
        <li><a href="category.html">Travel</a></li>
    </ul>
</div><!-- End Tags -->

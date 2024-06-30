@foreach ($category_list as $category)
    <section class="products-section">
        <div class="container">
            <h2 class="section-title">{{ $category->name }}</h2>
            <x-productcatehome :rowcategory="$category" />
        </div>
    </section>
@endforeach

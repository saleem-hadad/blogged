<div class="card shadow no-border pb-2">
    <img width="100%" class="card-img-top" src="{{ $image }}" alt="article image">

    <div class="bg-secondary px-3 py-2">
        <button type="button" class="btn btn-link btn-sm ml-1">Education</button>/ {{ $date }}
    </div>

    <div class="card-body">
        <h2>{{ $title }}</h2>
        <p>{{ $body }}</p>
        <a href="{{ $url }}" class="btn btn-outline-primary">Read More</a>
    </div>
</div>
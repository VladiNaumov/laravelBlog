@extends('layout.site')

@section('content')
    <h1>Блог о веб-разработке</h1>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium deleniti incidunt
        minima, minus molestias necessitatibus neque placeat quae quaerat repellendus
        reprehenderit voluptatem. Aperiam excepturi nesciunt officia officiis omnis provident
        quidem repellat saepe, sed soluta? Animi atque cupiditate dicta doloribus id libero
        quibusdam. Adipisci alias consequatur consequuntur delectus, eligendi et facere fugiat id
        illum minus necessitatibus nemo nihil numquam perspiciatis quae quis quisquam sapiente
        sequi vitae voluptatum. At facilis soluta unde.
    </p>

    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>

@endsection

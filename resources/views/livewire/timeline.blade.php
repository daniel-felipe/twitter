<div class="mt-10 text-lg dark:text-white">
    @foreach ($tweets as $tweet)
        <div>
            {{ $tweet->body }}
        </div>
    @endforeach
</div>

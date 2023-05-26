<p class="pb-text-green-500">Esto es una prueba</p>

<div class="pb-w-full pb-bg-orange-500 pb-h-72 pb-overflow-y-scroll">
    @foreach ($feed as $item)
        <div class="podcast-item">
            <h3>
                <a href="<?php echo $item['link']; ?>" target="_blank"><?php echo $item['title']; ?></a>
            </h3>
            <p><?php echo $item['description']; ?></p>
            <audio controls>
                <source src="<?php echo $item['enclosure']; ?>">
            </audio>
        </div>
    @endforeach
</div>

</div>

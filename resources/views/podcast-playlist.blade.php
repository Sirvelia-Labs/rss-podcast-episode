<div
    class="pb-w-full pb-max-h-[700px] pb-overflow-y-scroll pb-shadow-[0_0px_60px_-15px_rgba(0,0,0,0.3)] podcast-scrollbar">
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

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

<ul>
    <?php foreach($this->getRecentComments() as $comment):?>
        <li>
            <?php echo $comment->authorLink; ?> оставил(-а) комментарий в
            <?php echo CHtml::link($comment->post->title, $comment->getUrl()); ?>
        </li>
    <?php endforeach; ?>
</ul>
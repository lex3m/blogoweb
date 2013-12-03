<?php
/* @var $this PostController */
/* @var $data Post */
?>
<div id="posts" class="clearfix entry-wrapper">
    <!-- This message appears when there are no comments -->
    <?php if (empty($comments)): ?>
        <div id="no-posts" style="display: none;">Пока нет комментариев.</div>
    <?php endif; ?>
    <ul id="post-list" class="post-list">
<?php foreach($comments as $comment): ?>

            <li class="post" id="c<?php echo $comment->id;?>">
                <div data-role="post-content" class="post-content post-teaser">
                    <div class="avatar">
                        <div class="user">
                            <img class="user" alt="Аватар" src="//www.gravatar.com/avatar.php?default=http%3A%2F%2Fa.disquscdn.com%2F1385503134%2Fimages%2Fnoavatar92.png&amp;size=92&amp;gravatar_id=5c8f3aa61a99af63919117be1ccc19f6">
                        </div>
                    </div>
                    <div class="post-body">
                        <header>
                            <span class="post-byline">
                                    <span class="author"><?php echo $comment->authorLink; ?></span>
                            </span>
                            <div class="post-meta">
                                <span class="bullet time-ago-bullet" aria-hidden="true">•</span>
                                <?php echo CHtml::link(date('d/m/Y в H:i', $comment->create_time), $comment->getUrl($post), array(
                                    'class'=>'cid',
                                    'title'=>'Ссылка на этот комментарий',
                                )); ?>
                            </div>
                        </header>

                        <div class="post-body-inner">
                            <div class="post-message-container" data-role="message-container">
                                <div data-role="message-content">
                                    <div class="post-message publisher-anchor-color " data-role="message" dir="auto">
                                        <p><?php echo  nl2br(CHtml::encode($comment->content)); ?></p>
                                    </div>
                                    <div class="post-media"><ul data-role="post-media-list"></ul></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
<? endforeach; ?>
    </ul>
</div>
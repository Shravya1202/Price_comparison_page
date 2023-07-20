<!-- src/Template/Shoes/index.ctp -->
<div class=intro>
    <h1>Image Comparison Page</h1>
    <h4>Get Best Deals And Prices On Brand New Sports Shoes<h4>
            <p>You can also compare prices from various stores</p>
</div>
<br>
<div class="shoes-container">
    <?php foreach ($shoes as $shoe): ?>
        <div class="shoe">
            <h4>
                <?= h($shoe->title) ?>
            </h4>
            <a href="<?= $this->Url->build(['controller' => 'Shoes', 'action' => 'view', $shoe->shoes_id]) ?>">
                <?= $this->Html->image($shoe->image_url, ['alt' => $shoe->title]) ?>
            </a>
            <!-- Add any other shoe details you want to display -->
            <p>
                -----------------------------------------------------
                <?= h($shoe->description) ?><br>
                <?= h($shoe->model) ?>
            </p>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->Html->css('style.css'); ?>
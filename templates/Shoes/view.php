<div class="view_intro">
    <h2>Get price comparison from different stores here</h2>

    <h3>
        <?= h($shoe->title) ?>
    </h3>
    <center>
        <?= $this->Html->image($shoe->image_url); ?>
        <p>
            <?= h($shoe->description) ?>
            <?= h($shoe->model) ?>
        </p>
    </center>
</div>

<!-- Display associated stores -->
<?php if (!empty($shoe->prices)): ?>
    <br>
    <h2 class="store">Associated Stores with Prices:</h2>
    <table>
        <thead class="thead">
            <tr>
                <th>Store Name</th>
                <th>Price</th>
                <th>Order Now</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <?php foreach ($shoe->prices as $price): ?>
                <tr>
                    <td>
                        <center>
                            <?= $this->Html->image($price->store->image); ?>
                            <p>Size:
                                <select class="dropdown">
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                </select>
                            </p>
                        </center>
                    </td>
                    <td>
                        <p>&#8377;
                            <?= h($price->price) ?>
                        </p>
                    </td>
                    <td>
                        <center><button>Add To Cart</button></center>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?= $this->Html->css('style.css'); ?>
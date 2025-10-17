<?php foreach ($jokes as $joke): ?>
  <blockquote>
    <?php if (!empty($joke['image'])): ?>
      <img src="images/<?= htmlspecialchars($joke['image']) ?>" 
           alt="Joke image"
           style="max-width:200px; display:block; margin-bottom:10px;">
    <?php endif; ?>

    <p><?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?></p>

    <form action="deletejoke.php" method="post">
      <input type="hidden" name="Id" value="<?= $joke['Id'] ?>">
      <input type="submit" value="Delete">
    </form>
  </blockquote>
<?php endforeach; ?>

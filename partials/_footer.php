<?php
$year = date("Y");

echo'<div class="card text-center">
<div class="card-header fw-bolder">
iDiscuss - Coding Forums
</div>
<div class="card-body bg-dark">
  <h5 class="card-title text-success fw-bolder">©'. $year .' Copyright</h5>
  <p class="card-text text-info text-uppercase"><a href="/forum/contact.php">Contact Us For Any Issue Or Improvement</a></p>
  <a href="/forum/index.php" class="btn btn-primary">iDiscuss</a>
</div>
</div>';
?>
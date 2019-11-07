<?php $title = 'Inscription'; ?>
<?php ob_start(); ?>
<form class="text-center form-control" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Inscription</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
      </div>
    </div>

    <div class="control-group">
      <!-- Name -->
      <label class="control-label" for="name">nom</label>
      <div class="controls">
        <input type="text" id="user_name" name="name" placeholder="" class="input-xlarge">
      </div>
    </div>

      <div class="control-group">
          <!-- Lastname -->
          <label class="control-label" for="lastname">Prénom</label>
          <div class="controls">
              <input type="text" id="lastname" name="lastname" placeholder="" class="input-xlarge">
          </div>
      </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
      </div>
    </div>
      <div class="control-group">
          <!-- Answer -->
          <label class="control-label"  for="question">Question</label>
          <div class="controls">
              <select id="question" name="question" class="input-xlarge">
                  <option value="1">Question 1</option>
                  <option value="2">Question 2</option>
                  <option value="3">Question 3</option>
              </select>
          </div>
          <div class="control-group">
              <!-- Answer-->
              <label class="control-label" for="answer">Réponse</label>
              <div class="controls">
                  <textarea class="input-xlarge" name="answer"></textarea>
              </div>
          </div>
      </div>

    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Register</button>
      </div>
    </div>
  </fieldset>
</form>
<?php $content = ob_get_clean(); ?>
<?php  require 'template.php'; ?>

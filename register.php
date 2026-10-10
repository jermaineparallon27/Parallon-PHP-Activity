<?php
require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/validation.php';

$errors  = [];
$success = false;
$old     = ['first' => '', 'last' => '', 'email' => '', 'terms' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'first'    => trim($_POST['first'] ?? ''),
        'last'     => trim($_POST['last'] ?? ''),
        'email'    => trim($_POST['email'] ?? ''),
        'password' => $_POST['password'] ?? '',
        'confirm'  => $_POST['confirm'] ?? '',
        'terms'    => isset($_POST['terms']) ? '1' : '',
    ];

    $errors = validate_register($data);

    if (!$errors) {
        // Demo only: nothing is stored. A real app would save
        // password_hash($data['password'], PASSWORD_DEFAULT) to a database here.
        $success = true;
    } else {
        // Keep what the user typed (never send passwords back to the page).
        $old = array_intersect_key($data, $old);
    }
}

$pageTitle    = 'Sign up | Batangas';
$bodyClass    = 'auth';
$useBootstrap = false;
include __DIR__ . '/includes/head.php';
?>
  <main class="auth-wrap">
    <section class="glass auth-card" aria-labelledby="title">
      <a class="brand" href="index.php" style="text-decoration:none">Batangas</a>
      <h1 id="title">Create your account</h1>
      <p class="sub">Save trips and book in minutes.</p>

      <form action="register.php" method="post" novalidate>
        <?php if ($success): ?>
          <p class="form-message success-message" role="status" aria-live="polite">
            Your details look good. Registration is complete for this demo.
          </p>
        <?php endif; ?>

        <div class="row-2">
          <div class="field">
            <label for="first">First name</label>
            <input type="text" id="first" name="first" placeholder="Juan" autocomplete="given-name"
                   value="<?= e($old['first']) ?>" class="<?= isset($errors['first']) ? 'error' : '' ?>">
            <?php if (isset($errors['first'])): ?><p class="field-error"><?= e($errors['first']) ?></p><?php endif; ?>
          </div>
          <div class="field">
            <label for="last">Last name</label>
            <input type="text" id="last" name="last" placeholder="Dela Cruz" autocomplete="family-name"
                   value="<?= e($old['last']) ?>" class="<?= isset($errors['last']) ? 'error' : '' ?>">
            <?php if (isset($errors['last'])): ?><p class="field-error"><?= e($errors['last']) ?></p><?php endif; ?>
          </div>
        </div>
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="you@example.com" autocomplete="email"
                 value="<?= e($old['email']) ?>" class="<?= isset($errors['email']) ? 'error' : '' ?>">
          <?php if (isset($errors['email'])): ?><p class="field-error"><?= e($errors['email']) ?></p><?php endif; ?>
        </div>
        <div class="field">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="8+ chars, upper, lower &amp; number"
                 autocomplete="new-password" class="<?= isset($errors['password']) ? 'error' : '' ?>">
          <?php if (isset($errors['password'])): ?><p class="field-error"><?= e($errors['password']) ?></p><?php endif; ?>
        </div>
        <div class="field">
          <label for="confirm">Confirm password</label>
          <input type="password" id="confirm" name="confirm" placeholder="Repeat your password"
                 autocomplete="new-password" class="<?= isset($errors['confirm']) ? 'error' : '' ?>">
          <?php if (isset($errors['confirm'])): ?><p class="field-error"><?= e($errors['confirm']) ?></p><?php endif; ?>
        </div>
        <div class="check">
          <input type="checkbox" id="terms" name="terms" <?= $old['terms'] !== '' ? 'checked' : '' ?>>
          <label for="terms">I agree to the terms and privacy policy</label>
        </div>
        <?php if (isset($errors['terms'])): ?><p class="field-error" style="margin-top:-.8rem"><?= e($errors['terms']) ?></p><?php endif; ?>
        <button type="submit" class="btn-sun">Sign up</button>
      </form>

      <p class="switch">Already have an account? <a href="login.php">Log in</a></p>
    </section>
  </main>
<?php include __DIR__ . '/includes/scripts.php'; ?>

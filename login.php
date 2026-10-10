<?php
require_once __DIR__ . '/includes/init.php';
require_once __DIR__ . '/includes/validation.php';

// Already signed in? Go straight to the landing page.
if (is_logged_in()) {
    header('Location: index.php');
    exit;
}

// Demo credentials (same as the original HTML version).
const DEMO_USER = 'admin';
const DEMO_PASS = '12345';

$errors   = [];
$formError = '';
$username = '';
$remember = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    $errors = validate_login($username, $password);

    if (!$errors) {
        if (hash_equals(DEMO_USER, $username) && hash_equals(DEMO_PASS, $password)) {
            session_regenerate_id(true);
            $_SESSION['user'] = $username;
            header('Location: index.php');
            exit;
        }
        $formError = 'The username or password is incorrect. Please try again.';
    }
}

$pageTitle    = 'Log in | Batangas';
$bodyClass    = 'auth';
$useBootstrap = false;
include __DIR__ . '/includes/head.php';
?>
  <main class="auth-wrap">
    <section class="glass auth-card" aria-labelledby="title">
      <a class="brand text-decoration-none" href="index.php" style="text-decoration:none">Batangas</a>
      <h1 id="title">Welcome back</h1>
      <p class="sub">Log in to see your saved trips.</p>

      <form action="login.php" method="post" novalidate>
        <?php if ($formError !== ''): ?>
          <p class="form-message error-message" role="alert"><?= e($formError) ?></p>
        <?php endif; ?>

        <div class="field">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter your username"
                 autocomplete="username" value="<?= e($username) ?>"
                 class="<?= isset($errors['username']) ? 'error' : '' ?>">
          <?php if (isset($errors['username'])): ?>
            <p class="field-error"><?= e($errors['username']) ?></p>
          <?php endif; ?>
        </div>
        <div class="field">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password"
                 autocomplete="current-password"
                 class="<?= isset($errors['password']) ? 'error' : '' ?>">
          <?php if (isset($errors['password'])): ?>
            <p class="field-error"><?= e($errors['password']) ?></p>
          <?php endif; ?>
        </div>
        <div class="check">
          <input type="checkbox" id="remember" name="remember" <?= $remember ? 'checked' : '' ?>>
          <label for="remember">Keep me logged in</label>
        </div>
        <button type="submit" class="btn-sun">Log in</button>
      </form>

      <p class="switch">New to Batangas? <a href="register.php">Create an account</a></p>
    </section>
  </main>
<?php include __DIR__ . '/includes/scripts.php'; ?>

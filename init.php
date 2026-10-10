<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function is_logged_in(): bool
{
    return !empty($_SESSION['user']);
}

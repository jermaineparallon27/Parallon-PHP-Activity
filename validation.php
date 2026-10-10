<?php
const REGEX_NAME     = '/^\p{L}[\p{L}\' .-]{1,49}$/u';

const REGEX_USERNAME = '/^[A-Za-z0-9._-]{3,20}$/';

const REGEX_EMAIL    = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*\.[A-Za-z]{2,}$/';

const REGEX_PASSWORD = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';

/**
 * Validate the login form.
 * @return array<string,string> field => error message (empty = valid)
 */
function validate_login(string $username, string $password): array
{
    $errors = [];

    if ($username === '') {
        $errors['username'] = 'Please enter your username.';
    } elseif (!preg_match(REGEX_USERNAME, $username)) {
        $errors['username'] = 'Username must be 3-20 characters: letters, numbers, dots, underscores or hyphens.';
    }

    if ($password === '') {
        $errors['password'] = 'Please enter your password.';
    }

    return $errors;
}

/**
 * Validate the registration form.
 * @return array<string,string> field => error message (empty = valid)
 */
function validate_register(array $data): array
{
    $errors = [];

    $first    = $data['first']    ?? '';
    $last     = $data['last']     ?? '';
    $email    = $data['email']    ?? '';
    $password = $data['password'] ?? '';
    $confirm  = $data['confirm']  ?? '';
    $terms    = $data['terms']    ?? '';

    if ($first === '') {
        $errors['first'] = 'Please enter your first name.';
    } elseif (!preg_match(REGEX_NAME, $first)) {
        $errors['first'] = 'First name may only contain letters, spaces, apostrophes, dots and hyphens (2-50 characters).';
    }

    if ($last === '') {
        $errors['last'] = 'Please enter your last name.';
    } elseif (!preg_match(REGEX_NAME, $last)) {
        $errors['last'] = 'Last name may only contain letters, spaces, apostrophes, dots and hyphens (2-50 characters).';
    }

    if ($email === '') {
        $errors['email'] = 'Please enter your email address.';
    } elseif (!preg_match(REGEX_EMAIL, $email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    if ($password === '') {
        $errors['password'] = 'Please enter a password.';
    } elseif (!preg_match(REGEX_PASSWORD, $password)) {
        $errors['password'] = 'Password must be at least 8 characters and include an uppercase letter, a lowercase letter and a number.';
    }

    if ($confirm === '') {
        $errors['confirm'] = 'Please confirm your password.';
    } elseif ($confirm !== $password) {
        $errors['confirm'] = 'Please enter the same password again.';
    }

    if ($terms === '') {
        $errors['terms'] = 'Please accept the terms and privacy policy.';
    }

    return $errors;
}

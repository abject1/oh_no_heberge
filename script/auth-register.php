<?php

require __DIR__ . './../database/models/UserDB.php';
$UserDB = new UserDB($pdo);


const ERROR_REQUIRED = 'Veuillez renseigner ce champ';
const ERROR_PASSWORD = 'Votre mot de passe n\'est pas valide il doit contenire au minimum 12 caractère';
const ERROR_PASSWORD_CONFRIM = 'Le mot de passe et le mot de passe de confirmation son différent';

$errors = [
    'name' => '',
    'lastname' => '',
    'email' => '',
    'pasword' => '',
    'paswordConfirm' => ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_POST = filter_input_array(INPUT_POST, [
        'name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'lastname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_VALIDATE_EMAIL,
        'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'passwordConfirm' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);
    $name = $_POST['name'] ?? '';
    $lastName = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $passwordConfirm = $_POST['passwordConfirm'] ?? '';

    if (!$name) {
        $errors['name'] = ERROR_REQUIRED;
    }

    if (!$lastName) {
        $errors['lastName'] = ERROR_REQUIRED;
    }

    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    }

    if (!$password) {
        $errors['password'] = ERROR_REQUIRED;
    } elseif (mb_strlen($password) < 12) {
        $errors['password'] = ERROR_PASSWORD;
    }

    if (!$passwordConfirm) {
        $errors['passwordConfirm'] = ERROR_REQUIRED;
    } elseif ($password != $passwordConfirm) {
        $errors['passwordConfirm'] = ERROR_PASSWORD_CONFRIM;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $userDB->createOne([
            'name' => $name,
            'lastname' => $lastName,
            'email' => $email,
            'password' => $password,
        ]);
    }
}

header('Location: http://localhost/oh_no_heberge');

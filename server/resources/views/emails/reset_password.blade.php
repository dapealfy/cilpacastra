<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Atur Ulang Kata Sandi</h2>
        <p>Hallo {{ $user->name }}!</p>
        <p>Untuk mengatur ulang kata sandi Anda silahkan klik link berikut : </p>
        <a href="{{ route('reset-password.redirect') }}?token={{ $token }}&id={{ $user->id }}">{{ route('reset-password.redirect') }}?token={{ $token }}&id={{ $user->id }}</a>
    </body>
</html>

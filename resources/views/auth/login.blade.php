<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Login</title>
</head>

<body>
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    <form action="{{ route('validasi') }}" method="POST">
        @csrf
        <label for="">Email</label>
        <input type="email" name="email" id="email">
        @error('email')
            {{ $message }}
        @enderror
        <br>
        <label for="">Password</label>
        <input type="password" name="password" id="password">
        @error('password')
            {{ $message }}
        @enderror
        <button type="submit">Login</button>
    </form>
</body>

</html>

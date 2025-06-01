<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Membership</title>
</head>
<body>
    <h1>Halo, {{ $membership->name }}</h1>
    <p>Selamat! Anda telah berhasil bergabung menjadi member di GYM <strong>{{ $gym->gym_name }}</strong>.</p>
    <p>Berikut detail membership Anda:</p>
    <table>
        <tr>
            <td><strong>Nama</strong></td>
            <td>{{ $membership->name }}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{{ $membership->email }}</td>
        </tr>
        <tr>
            <td><strong>No HP</strong></td>
            <td>{{ $membership->no_hp }}</td>
        </tr>
        <tr>
            <td><strong>Harga Membership</strong></td>
            <td>Rp {{ number_format($gym->price_member, 0, ',', '.') }}</td>
        </tr>
        
    </table>
    <tr>
        <td><strong>GYM Spot</strong></td>
        <td>{{ $gym->name }}</td>
    </tr>
    <p>Terima kasih telah bergabung bersama kami!</p>
    <p>Salam,</p>
    <p><strong>{{ $gym->name }}</strong></p>
</body>
</html>

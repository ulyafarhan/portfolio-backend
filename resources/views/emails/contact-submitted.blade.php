<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .header { font-size: 24px; font-weight: bold; margin-bottom: 20px; }
        .field { margin-bottom: 15px; }
        .field strong { display: block; color: #555; }
        .message { white-space: pre-wrap; background-color: #f9f9f9; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Pesan Baru dari Portofolio</div>
        <p>Anda telah menerima pesan baru melalui formulir kontak di website portofolio Anda.</p>
        <hr>
        <div class="field">
            <strong>Nama Pengirim:</strong>
            <span>{{ $submission->name }}</span>
        </div>
        <div class="field">
            <strong>Email Pengirim:</strong>
            <span>{{ $submission->email }}</span>
        </div>
        <div class="field">
            <strong>Isi Pesan:</strong>
            <div class="message">{{ $submission->message }}</div>
        </div>
    </div>
</body>
</html>
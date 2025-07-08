<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 40px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #333; margin-bottom: 30px;">Contact Message Details</h2>

        <p style="margin-bottom: 15px;">
            <strong style="color: #555;">Name:</strong>
            <span style="color: #000;">{{ $contact->name }}</span>
        </p>

        <p style="margin-bottom: 15px;">
            <strong style="color: #555;">Email:</strong>
            <span style="color: #000;">{{ $contact->email }}</span>
        </p>

        <p style="margin-bottom: 15px;">
            <strong style="color: #555;">Subject:</strong>
            <span style="color: #000;">{{ $contact->subject }}</span>
        </p>

        <p style="margin-bottom: 0;">
            <strong style="color: #555;">Message:</strong><br>
            <span style="color: #000;">{{ $contact->message }}</span>
        </p>
    </div>

</body>
</html>
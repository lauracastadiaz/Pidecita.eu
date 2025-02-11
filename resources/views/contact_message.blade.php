<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje De Contacto</title>
</head>
<body>
    <p><strong>Nombre:</strong>{{ $contactData['contactName'] }}</p>
    <p><strong>Email:</strong>{{ $contactData['contactEmail'] }}</p>
    <p><strong>Teléfono:</strong>{{ $contactData['contactPhone'] }}</p>
    <p><strong>Mensaje:</strong>{{ $contactData['contactMessage'] }}</p>
    
</body>
</html>
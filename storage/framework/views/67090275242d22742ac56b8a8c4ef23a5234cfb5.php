<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje De Contacto</title>
</head>
<body>
    <p><strong>Nombre:</strong><?php echo e($contactData['contactName']); ?></p>
    <p><strong>Email:</strong><?php echo e($contactData['contactEmail']); ?></p>
    <p><strong>Teléfono:</strong><?php echo e($contactData['contactPhone']); ?></p>
    <p><strong>Mensaje:</strong><?php echo e($contactData['contactMessage']); ?></p>
    
</body>
</html><?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/contact_message.blade.php ENDPATH**/ ?>
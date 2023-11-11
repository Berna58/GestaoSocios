<!DOCTYPE html>
<html>
<head>
    <title>Visualizar PDF</title>
</head>
<body>
<embed src="data:application/pdf;base64,{{ base64_encode($pdfData) }}" type="application/pdf" width="100%" height="600px" />
</body>
</html>

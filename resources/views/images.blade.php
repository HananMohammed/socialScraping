<!DOCTYPE html>
<html>
<head>
    <title>Display Image</title>
</head>
<body>
<img style='display:block; width:100px;height:100px;' id='base64image'
     src='data:image/jpeg;base64, LzlqLzRBQ...<!-- base64 data -->' />

<img src="data:image/png;base64, {{$response}}" alt="Red dot" />
</body>
</html>

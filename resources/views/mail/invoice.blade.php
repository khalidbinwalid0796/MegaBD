<html>
<head>
  <title>Invoice</title>

  <link rel="stylesheet" href="{{asset('css/admin_style.css')}}">
</head>
<body>
  <ul>
    <li>Payment Id = {{ $data['payment_id'] }}</li>
    <li>Total {{ $data['total'] }}</li>
    <li>Status Code {{ $data['status_code'] }}</li>
  </ul>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>ksrprojecthub.com</title>
</head>
<body>
    <h2>{{ $mailD['title'] }}</h2>
    <h3>Project from <strong>{{ $mailD['name'] }} ({{ $mailD['customer_id']}})</strong></h3>

    <h2>Details</h2>
    <ul>
        <li>Customer ID - {{ $mailD['customer_id']}}</li>
        <li>Email - {{ $mailD['email']}}</li>
        <li>Project Request For - {{ $mailD['request_for']}}</li>
        <li>Institute - {{ $mailD['institute']}}</li>
        <li>Project Module - {{ $mailD['module']}}</li>
        <li>No. of Members in the group - {{ $mailD['noofmembers']}}</li>
        <li>Contact No - {{ $mailD['contact_no']}}</li>
        <li><p>{{ $mailD['description'] }}</p></li>
    </ul>
    
    <p>Thank you</p>
</body>
</html>
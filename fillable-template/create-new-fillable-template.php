<?php

// Get cURL resource
$ch = curl_init();

// Set url
curl_setopt($ch, CURLOPT_URL, 'https://api.pdffiller.com/v1/fillable_template');

// Set method
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

// Set options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Set headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer {YOUR_ACCESS_TOKEN}", // ex: 10Tigk7OPkNDBxZDfUs92n1lRvBfL9SwlxX8W98k
        "Content-Type: application/json",
    ]
);
// Create body
$json_array = [
    "document_id" => "{YOUR_DOCUMENT_ID}", // ex: 20123456
    "fillable_fields" => [ // some array of fields
        "Text_1" => "Iusto accusamus qui rerum aut molestias non.",
        "Date_1" => "04/17/2016",
        "Checkbox_1" => "0",
        "Number_1" => 74640
    ]
];
$body = json_encode($json_array);

// Set body
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

// Send the request & save response to $resp
$resp = curl_exec($ch);

if(!$resp) {
    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
} else {
    echo "Response HTTP Status Code : " . curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "\nResponse HTTP Body : " . $resp;
}

// Close request to clear up some resources
curl_close($ch);

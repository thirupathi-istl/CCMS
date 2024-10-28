<?php
// MinIO Configuration
$minioEndpoint = "https://minios3.toshalinfotech.com";
$minioAccessKey = "UFrqBEKPvWeA2gWIRLy1";
$minioSecretKey = "PxuHrwGRtDh2OyOpcWjdogQCVboVkqo9BGCXbCKa";
$bucketName = "itmsstage";

// Function to generate the AWS Signature V4
function sign_request_v4($method, $bucketName, $minioEndpoint, $minioAccessKey, $minioSecretKey, $canonicalUri = '', $queryString = '') {
    $region = 'us-east-1';  // Region is not crucial for MinIO but required for AWS Signature V4
    $service = 's3';
    $host = parse_url($minioEndpoint, PHP_URL_HOST);
    
    $t = time();
    $amzDate = gmdate('Ymd\THis\Z', $t); // ISO 8601 format date
    $dateStamp = gmdate('Ymd', $t); // Date format for credential scope
    
    // Canonical request elements
    $canonicalUri = $canonicalUri ? $canonicalUri : "/$bucketName";
    $canonicalQueryString = $queryString ? $queryString : "";
    $canonicalHeaders = "host:$host\nx-amz-date:$amzDate\n";
    $signedHeaders = "host;x-amz-date";
    
    $payloadHash = hash('sha256', '');
    $canonicalRequest = "$method\n$canonicalUri\n$canonicalQueryString\n$canonicalHeaders\n$signedHeaders\n$payloadHash";
    
    // Create the string to sign
    $algorithm = 'AWS4-HMAC-SHA256';
    $credentialScope = "$dateStamp/$region/$service/aws4_request";
    $stringToSign = "$algorithm\n$amzDate\n$credentialScope\n" . hash('sha256', $canonicalRequest);
    
    // Derive signing key
    $kSecret = 'AWS4' . $minioSecretKey;
    $kDate = hash_hmac('sha256', $dateStamp, $kSecret, true);
    $kRegion = hash_hmac('sha256', $region, $kDate, true);
    $kService = hash_hmac('sha256', $service, $kRegion, true);
    $kSigning = hash_hmac('sha256', 'aws4_request', $kService, true);
    
    $signature = hash_hmac('sha256', $stringToSign, $kSigning);
    
    // Build authorization header
    $authorizationHeader = "$algorithm Credential=$minioAccessKey/$credentialScope, SignedHeaders=$signedHeaders, Signature=$signature";
    
    return [$authorizationHeader, $amzDate];
}

// Step 1: List objects from the bucket
function list_objects_in_bucket($minioEndpoint, $minioAccessKey, $minioSecretKey, $bucketName) {
    list($authorizationHeader, $amzDate) = sign_request_v4('GET', $bucketName, $minioEndpoint, $minioAccessKey, $minioSecretKey);
    
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "$minioEndpoint/$bucketName",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: ' . $authorizationHeader,
            'x-amz-date: ' . $amzDate,
            'Host: ' . parse_url($minioEndpoint, PHP_URL_HOST),
        ],
        CURLOPT_SSL_VERIFYPEER => true, // Enable SSL certificate verification
        CURLOPT_SSL_VERIFYHOST => 2, // Verify the host name
    ]);

    $response = curl_exec($curl);
    $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if (curl_errno($curl)) {
        echo 'Curl error: ' . curl_error($curl);
    } elseif ($httpStatus === 200) {
        echo "Objects in Bucket:\n$response";
    } else {
        echo "Error: HTTP Status $httpStatus\n$response";
    }

    curl_close($curl);
}
list_objects_in_bucket($minioEndpoint, $minioAccessKey, $minioSecretKey, $bucketName);

// Function to download a specific object from the bucket
function download_object_from_bucket($minioEndpoint, $minioAccessKey, $minioSecretKey, $bucketName, $objectKey) {
    list($authorizationHeader, $amzDate) = sign_request_v4('GET', $bucketName, $minioEndpoint, $minioAccessKey, $minioSecretKey, "/$bucketName/$objectKey");
    
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "$minioEndpoint/$bucketName/$objectKey",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: ' . $authorizationHeader,
            'x-amz-date: ' . $amzDate,
            'Host: ' . parse_url($minioEndpoint, PHP_URL_HOST),
        ],
        CURLOPT_SSL_VERIFYPEER => true, // Enable SSL certificate verification
        CURLOPT_SSL_VERIFYHOST => 2, // Verify the host name
    ]);

    $response = curl_exec($curl);
    $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if (curl_errno($curl)) {
        echo 'Curl error: ' . curl_error($curl);
    } elseif ($httpStatus === 200) {
        // Save the downloaded file
        file_put_contents($objectKey, $response);
        echo "Object '$objectKey' downloaded successfully.\n";
    } else {
        echo "Error: HTTP Status $httpStatus\n$response";
    }

    curl_close($curl);
}

// Usage example
$objectKey = "CCMS_MKM_V0.0.srec"; // Specify the object key (file name) you want to download
//download_object_from_bucket($minioEndpoint, $minioAccessKey, $minioSecretKey, $bucketName, $objectKey);

?>



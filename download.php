<?php if ($_SERVER["REQUEST_METHOD"] === "GET") { $videoUrl = $_GET["url"]; if (!empty($videoUrl)) { $apiUrl = "https://taptik.app/francycisco"; $ch = curl_init($apiUrl); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_POST, true); curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query(["url" => $videoUrl]) ); curl_setopt($ch, CURLOPT_HTTPHEADER, [ "Content-Type: application/x-www-form-urlencoded", ]); $response = curl_exec($ch); if (curl_errno($ch)) { http_response_code(500); die("Error downloading TikTok video: " . curl_error($ch)); } curl_close($ch); $responseData = json_decode($response, true); if ( isset($responseData["code"]) && $responseData["code"] === 0 && isset($responseData["data"]["play"]) ) { $videoUrl = $responseData["data"]["play"]; $title = $responseData["data"]["title"]; $tags = $responseData["data"]["tags"]; $nickname = $responseData["data"]["nickname"]; header( "Location: download-preview.php?videoUrl=" . urlencode($videoUrl) . "&title=" . urlencode($title) . "&tags=" . urlencode($tags) . "&nickname=" . urlencode($nickname) ); exit(); } else { header("Location: 404"); exit(); } } else { echo "Please provide a TikTok video URL."; } } ?>
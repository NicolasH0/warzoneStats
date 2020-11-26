<?php
require "../config/config.php";

$file = 'ICH.csv';

foreach ($players as $player => $platform) {
    $res  = getData($player, $platform, $apiUrl);
    sleep(2);
    if ($res) {
        $results = json_decode($res, true)['br'];
        $tabResult[] = [
            "Player" => str_replace('%23', '#', $player), $results['gamesPlayed'], $results['wins'], round(($results['wins'] * 100) / $results['gamesPlayed'],2), $results['topTen'], round(($results['topTen'] * 100) / $results['gamesPlayed'], 2), round($results['kdRatio'], 2)
        ];
    }
}

$fp = fopen('ICH.csv', 'w');
foreach ($tabResult as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);

if (isset($_POST['download'])) {
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
}

/**
 * @param string $player
 * @param string $platform
 * @param string $url
 * @return bool|string
 */
function getData(string $player, string $platform, string $url) {
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => sprintf($url, $player, $platform),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: call-of-duty-modern-warfare.p.rapidapi.com",
            "x-rapidapi-key: 590801770emsh825f409f77551e6p1b6034jsndee9e32fdbfe"
        ],
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);

    if ($err)
        echo "cURL Error #:" . $err;

    curl_close($curl);
    return $response;
}

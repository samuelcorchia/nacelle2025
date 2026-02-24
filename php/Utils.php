<?php
class Utils {
    private static function getAPIResultsFromURL(string $sUrl): array {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $sUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        return json_decode($response, true);
    }

    public static function getCitationOfTheDay(): string {
        $aResult = self::getAPIResultsFromURL('https://citation.lecog.fr/public/api/random-quote.php');
        return $aResult['data']['text'] . ' - ' . $aResult['data']['author']['forename'] . ' ' . $aResult['data']['author']['name'];
    }
}



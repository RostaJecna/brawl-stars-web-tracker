<?php

class ApiRequest
{
    private static $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImYzMzRhNjA3LWE3MDQtNDk2My1hN2FjLWRmMGQwMTgwYmUwMSIsImlhdCI6MTY4NjIwMzM4Niwic3ViIjoiZGV2ZWxvcGVyL2ZiZDNkYjM1LTgzMDctMjk1MS1iNDg4LTU2NWZiOTljNDFhYiIsInNjb3BlcyI6WyJicmF3bHN0YXJzIl0sImxpbWl0cyI6W3sidGllciI6ImRldmVsb3Blci9zaWx2ZXIiLCJ0eXBlIjoidGhyb3R0bGluZyJ9LHsiY2lkcnMiOlsiODUuMTYwLjM3LjcxIl0sInR5cGUiOiJjbGllbnQifV19.S4k2XJo-z4QHKDLSuZ8YxTXU3I8gwxbYdOFfT3TZHOkCmyOYwYG_mbdlDaTWEThk6IcftV1gsNCRHq54KiHj8g';
    private static $apiUrl = 'https://api.brawlstars.com/v1/players/%23';

    public static function getPlayerData($playerTag)
    {
        $requestUrl = self::$apiUrl . $playerTag;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $requestUrl);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . self::$token,
            'Content-Type: application/json'
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($response, true);

        if (!empty($data["reason"])) {
            return $data;
        }

        $player = [
            "tag" => $data["tag"],
            "name" => $data["name"],
            "nameColor" => substr($data["nameColor"], 4),
            "iconId" => $data["icon"]["id"],
            "trophies" => $data["trophies"],
            "highestTrophies" => $data["highestTrophies"],
            "expLevel" => $data["expLevel"],
            "club" => !empty($data['club']) ? $data['club']['name'] : 'None',
            "3vs3Victories" => $data["3vs3Victories"],
            "soloVictories" => $data["soloVictories"],
            "duoVictories" => $data["duoVictories"],
            "expPoints" => $data["expPoints"]
        ];

        return $player;
    }

    public static function isPlayerExisting($playerTag)
    {
        $requestUrl = self::$apiUrl . $playerTag;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $requestUrl);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . self::$token,
            'Content-Type: application/json'
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($response, true);

        return empty($data['reason']);
    }
}

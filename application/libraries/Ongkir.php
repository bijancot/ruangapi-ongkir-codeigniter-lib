<?php
class Ongkir
{

    public $endpoint, $apiKey;

    public function __construct()
    {
        $this->endpoint = "https://ruangapi.com/api/v1/";
        $this->apikey = "tgdE2vHA696lTUUSyA3OA90HYNuVpuoRTerQkOoR";
    }

    private function getEndpoint($param)
    {
        $end = $this->endpoint;
        return $end . $param;
    }

    private function mainQuery($param, $extraParam = null)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$param",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: $this->apikey",
                "content-type: application/json"
            ) ,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        return $data['data']['results'];
    }


    public function postQuery()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://ruangapi.com/api/v1/shipping",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=22&destination=14&weight=800&courier=sicepat",
        CURLOPT_HTTPHEADER => "authorization: $this->apikey",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        return $data['data']['query'];
    }

    public function getAllProvinces()
    {
        $param = $this->getEndpoint("provinces");
        $result = $this->mainQuery($param);

        return $result;
    }

    public function getAllCities()
    {
        $param = $this->getEndpoint("cities");
        $result = $this->mainQuery($param);

        return $result;
    }

    public function getAllDistricts()
    {
        $param = $this->getEndpoint("districts");
        $result = $this->mainQuery($param);

        return $result;
    }

    public function getProvinceById($provinceId)
    {
        $param = $this->getEndpoint("provinces");
        $param = $param."?id=".$provinceId;
        $result = $this->mainQuery($param);

        return $result;
    }

    public function getCityById($citiesId)
    {
        $param = $this->getEndpoint("cities");
        $param = $param."?id=".$provinceId;
        $result = $this->mainQuery($param);

        return $result;
    }

    public function getDistricsById($districsId)
    {
        $param = $this->getEndpoint("provinces");
        $param = $param."?id=".$provinceId;
        $result = $this->mainQuery($param);

        return $result;
    }
}
?>

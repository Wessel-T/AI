<?php
class AIWrapper {
    private $ingredients = [];
    private $response = '';

     
        private $apiKey;
        private $model;
        private $apiUrl = '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';



        public function __construct($apiKey, $model = 'gpt-3.5-turbo') {
            $this->apiKey = $apiKey;
            $this->model = $model;
            }
            
        public function makeApiRequest($prompt) {
                $data = [
                'model' => $this->model,
                'messages' => [
                ['role' => 'system', 'content' => 'Je bent een expert chef.'],
                ['role' => 'user', 'content' => $prompt]
                ],
                'temperature' => 0.7
                ];

                $ch = curl_init($this->apiUrl);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $this->apiKey
                ]);

                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if (curl_errno($ch)) {
                    throw new Exception('cURL error: ' . curl_error($ch));
                }
                curl_close($ch);
                return $this->handleResponse($response, $httpCode);
            }
                
            
public function processInput($ingredients) {
    if (empty($ingredients)) {
        throw new Exception("Geen ingrediënten opgegeven");
}

    $this->ingredients = $ingredients;
    // Later hier API aanroepen
    return true;
}
public function getResponse() {
        // Voorlopig een standaard bericht teruggeven
        $ingredientsList = implode(', ', $this->ingredients);
        $this->response = "Recept met $ingredientsList wordt verwerkt";
        return $this->response;
    }
}

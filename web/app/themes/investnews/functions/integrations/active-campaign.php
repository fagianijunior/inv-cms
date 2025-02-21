<?php
/**
 * Send e-mails to Active Campaign API
 */
function sendToActiveCampaign()
{
    $email = $_POST['email'];
    $id = $_POST['id'];

    $fields = '';
    $url = '';

    if (isset($email)) {
        $url = 'https://investnews.api-us1.com/api/3/contacts';
        $fields = "{\"contact\":{\"email\":\"$email\"}}";
    } else if (isset($id)) {
        $url = "https://investnews.api-us1.com/api/3/contactLists";
        $fields = "{\"contactList\":{\"list\":\"2\", \"contact\":\"$id\",\"status\":\"1\"}}";
    }

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $fields,
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Content-Type: application/json",
            "api-token: 550ee0f5ed553ff1e95ed7bd97787c77768fb05f963913ede65370b8b25fa6613529fad5"
        ],
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        wp_send_json_error(["error" => $err]);
    } else {
        wp_send_json_success(["data" => $response]);
    }
}
add_action('wp_ajax_sendToActiveCampaign', 'sendToActiveCampaign');
add_action('wp_ajax_nopriv_sendToActiveCampaign', 'sendToActiveCampaign');

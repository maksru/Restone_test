<?php

namespace aplication\Controller;
use aplication\Models\Url;
use core\Router;
use core\View;

class UrlController {
    /**
     * Вывод главной страницы, с выводом всех элементов из базы данных.
     */
    public function indexAction() {
        $url = Url::allFind();
        return View::view('index', $url);
    }

    /**
     * Добавление нового URl.
     */
    public function addAction() {
        include 'api_key.php';
        if(empty($apikey)) {
            View::error('Получите свой персональный ключь API на сайте - https://hunter.io.
            Скопируйте его в файл "api_key.php" (aplication/Controllers/api_key.php)');
            die();
        }
        $_SESSION["create"] = "true";
        $service_url = 'https://api.hunter.io/v2/domain-search?domain='.$_POST['url'].'&api_key='.$apikey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_URL, $service_url);
        $result = curl_exec($ch);
        $url_value = json_decode($result, true);

        if(!empty($url_value['data']['emails'][0]['first_name'])) {
            $first_name = $url_value['data']['emails'][0]['first_name'];
        } else {
            $first_name = $url_value['data']['domain'];
        }

        if(!empty($url_value['data']['emails'][0]['last_name'])) {
            $first_name = $url_value['data']['emails'][0]['last_name'];
        } else {
            $last_name = '';
        }

        if(!empty($url_value['data']['emails'][0]['value'])) {
            $email_value = $url_value['data']['emails'][0]['value'];
        } else {
            $email_value = '';
        }

        if(!empty($url_value['data']['emails'][0]['type'])) {
            $type = $url_value['data']['emails'][0]['type'];
        } else {
            $type = '';
        }

        Url::insert($first_name, $last_name,$email_value, $type);
        header("Location: /");
    }

    /**
     * Функция удаления ресторана.
     */
    public function deleteAction($id)  {
        Url::delete($id);
        header("Location: /");
    }

}
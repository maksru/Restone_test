<?php

namespace core;

class View {
    public static function view(string $path, $url = null) {
        $view = ROOT . '/aplication/Views/' . $path . '.php';
        if (file_exists($view)) {
            include_once $view;
        }
    }

    public static function error(string $error) {
        $view = ROOT . '/aplication/Views/error/error.php';
        if (file_exists($view)) {
            include_once $view;
        }
    }
}
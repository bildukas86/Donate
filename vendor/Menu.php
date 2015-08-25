<?php

class Menu {
    public static function render() {
        $items = [
            0 => [
                'title' => 'Prisijungimas',
                'id' => 'login',
                'icon' => 'fa-sign-in',
                'position' => 1
            ]
        ];

        $menu = View::make('menu_line', ['items' => $items]);

        return $menu;
    }
}

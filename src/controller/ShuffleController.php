<?php

class ShuffleController

{
    // Run the action
    public function run($action) {
        $this->$action();
    }

    // Index action
    private function index()
    {
        echo 'ShuffleController index action';
    }
}


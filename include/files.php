<?php
/**
 * Created by PhpStorm.
 * User: Наталья
 * Date: 10.02.2018
 * Time: 22:21
 */

function createAndOpen($fileName, $param) {
    if (touch($fileName)) {
        return fopen($fileName, $param);
    } else {
        return "(Warning!)File is not created";
    }
}

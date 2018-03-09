<?php
function classAutoLoader($className) {
    include "./classes/" . $className . ".php";
}
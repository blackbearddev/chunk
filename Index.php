<?php
    require_once("Chunk.php");

    $e = new Chunk("select id, razao from empresa");

    $e->byChunk(100, function($result){
        var_dump($result);
    });
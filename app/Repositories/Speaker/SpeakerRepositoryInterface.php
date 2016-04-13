<?php
namespace App\Repositories\Speaker;

interface SpeakerRepositoryInterface
{
    public function getAll();

    public function find($id);

    public function updateFile($speaker);

    public function getFile($speaker);

    public function inputFile($folder);

    public function createFolder();
}
<?php
/**
 * Created by PhpStorm.
 * User: Tiaan-Pc
 * Date: 3/11/2016
 * Time: 12:54 PM
 */
namespace App\Repositories\Partner;

interface PartnerRepositoryInterface
{
    public function getAll();

    public function find($slug);

    public function createFolder();

    public function getFile($sponsor);

    public function updateFile($sponsor);

    public function inputFile($folder);
}
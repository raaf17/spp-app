<?php 

function userLogin()
{
  $db = \Config\Database::connect();
  return $db->table('petugas')->where('id_petugas', session('id_petugas'))->get()->getRow();
}

function countData($table)
{
  $db = \Config\Database::connect();
  return $db->table($table)->countAllResults();
}

?>
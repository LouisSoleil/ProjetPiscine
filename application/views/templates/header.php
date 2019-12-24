<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>BetDrink</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url('application/assets/General.css');?>">

  <?php $CI =& get_instance();
  $this->load->model('My_Cookie');
  if(!($this->My_Cookie->isLoggedIn())){ ?>
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <img  src="<?php echo base_url('application/JPEG/logo.gif');?>" class="navbar-brand"></img>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url('Welcome');?>">Acceuil</a></li>
          <li><a href="<?php echo base_url('Rankings');?>">Classement</a></li>
          <li><a href="#">A propos</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url('Connexions');?>"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <?php }
  else {?>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <img  src="<?php echo base_url('application/JPEG/logo.gif');?>" class="navbar-brand"></img>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url('Welcome');?>">Acceuil</a></li>
          <li><a href="<?php echo base_url('Rankings');?>">Classement</a></li>
          <li><a href="<?php echo base_url('Edits');?>">Modifier mon compte</a></li>
          <li><a href="<?php echo base_url('Historics');?>">Mes Paris</a></li>
          <li><a href="#">A propos</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url('Users/logout');?>" ><span class="glyphicon glyphicon-log-in"></span> Deconnexion</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <?php }?>
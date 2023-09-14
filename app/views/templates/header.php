<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta name="author" content="qrozyer">
    <title><?= WEB_TITTLE ; ?></title>
    <link href="<?= BASEURL ; ?>/css/bootstrap.css" rel="stylesheet">    
    <link rel="shortcut icon" href="<?= BASEURL ; ?>/img/R.png">    
    <style>
        a{
            text-decoration: none;
            color: dodgerblue;
        }                
        .event-list {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .event {
            border: 1px solid #d1d1d1;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .event-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .event-date {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .event-description {
            font-size: 16px;
            line-height: 1.4;
        }
    </style>    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASEURL ; ?>/home"><?= WEB_TITTLE ; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= BASEURL ; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL ; ?>/todo">Todo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL ; ?>/profile">Profile</a>
            </li>        
            </ul>
        </div>
    </div>
</nav>
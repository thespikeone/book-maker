<?php
session_start();
if($_SESSION["autoriser"]!='oui'){
    header("location:login.php");
    exit();
   }   
   
include_once('../public/php/data.php');
$sel=$pdo->prepare("select * from commande ORDER BY date DESC");
$sel->execute();
$table=$sel->fetchAll();

$sel=$pdo->prepare("select * from money ORDER BY date DESC");
$sel->execute();
$money=$sel->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            background-color: #131313;
        }

        .demo {
            font-family: 'Noto Sans', sans-serif;
        }

        .panel {
            background: linear-gradient(to right, #2980b9, #2c3e50);
            padding: 0;
            border-radius: 10px;
            border: none;
            box-shadow: 0 0 0 5px rgba(0, 0, 0, 0.05), 0 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .panel .app{
            background: linear-gradient(to right, #00000, #2c3e50)!important;
        }
        .panel .panel-heading {
           
            border-radius: 10px 10px 0 0;
            margin: 0;
        }

        .panel .panel-heading .title {
            color: #fff;
            font-size: 28px;
            font-weight: 500;
            text-transform: capitalize;
            line-height: 40px;
            margin: 0;
        }

        .panel .panel-heading .btn {
            color: rgba(255, 255, 255, 0.5);
            background: transparent;
            font-size: 16px;
            text-transform: capitalize;
            border: 2px solid #fff;
            border-radius: 50px;
            transition: all 0.3s ease 0s;
        }

        .panel .panel-heading .btn:hover {
            color: #fff;
            text-shadow: 3px 3px rgba(255, 255, 255, 0.2);
        }

        .panel .panel-heading .form-control {
            color: #fff;
            background-color: transparent;
            width: 35%;
            height: 40px;
            border: 2px solid #fff;
            border-radius: 20px;
            display: inline-block;
            transition: all 0.3s ease 0s;
        }

        .panel .panel-heading .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: none;
            outline: none;
        }

        .panel .panel-heading .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
            font-size: 15px;
            font-weight: 500;
        }

        .panel .panel-body {
            padding: 0;
        }

        .panel .panel-body .table thead tr th {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.2);
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
            padding: 12px;
            border: none;
        }

        .panel .panel-body .table tbody tr td {
            color: #fff;
            font-size: 15px;
            padding: 10px 12px;
            vertical-align: middle;
            border: none;
        }

        .panel .panel-body .table tbody tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .panel .panel-body .table tbody .action-list {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .panel .panel-body .table tbody .action-list li {
            display: inline-block;
            margin: 0 5px;
        }

        .panel .panel-body .table tbody .action-list li a {
            color: #fff;
            font-size: 15px;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease 0s;
        }

        .panel .panel-body .table tbody .action-list li a:hover {
            text-shadow: 3px 3px 0 rgba(255, 255, 255, 0.3);
        }

        .panel .panel-body .table tbody .action-list li a:before,
        .panel .panel-body .table tbody .action-list li a:after {
            content: attr(data-tip);
            color: #fff;
            background-color: #111;
            font-size: 12px;
            padding: 5px 7px;
            border-radius: 4px;
            text-transform: capitalize;
            display: none;
            transform: translateX(-50%);
            position: absolute;
            left: 50%;
            top: -32px;
            transition: all 0.3s ease 0s;
        }

        .panel .panel-body .table tbody .action-list li a:after {
            content: '';
            height: 15px;
            width: 15px;
            padding: 0;
            border-radius: 0;
            transform: translateX(-50%) rotate(45deg);
            top: -18px;
            z-index: -1;
        }

        .panel .panel-body .table tbody .action-list li a:hover:before,
        .panel .panel-body .table tbody .action-list li a:hover:after {
            display: block;
        }

        .panel .panel-footer {
            color: #fff;
            background-color: transparent;
            padding: 15px;
            border: none;
        }

        .panel .panel-footer .col {
            line-height: 35px;
        }

        .pagination {
            margin: 0;
        }

        .pagination li a {
            color: #fff;
            background-color: transparent;
            border: 2px solid transparent;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            line-height: 31px;
            width: 35px;
            height: 35px;
            padding: 0;
            margin: 0 3px;
            border-radius: 50px;
            transition: all 0.3s ease 0s;
        }

        .pagination li a:hover {
            color: #fff;
            background-color: transparent;
            border-color: rgba(255, 255, 255, 0.2);
        }

        .pagination li a:focus,
        .pagination li.active a,
        .pagination li.active a:hover {
            color: #fff;
            background-color: transparent;
            border-color: #fff;
        }

        .pagination li:first-child a,
        .pagination li:last-child a {
            border-radius: 50%;
        }

        @media only screen and (max-width:767px) {
            .panel .panel-heading .title {
                text-align: center;
                margin: 0 0 10px;
            }

            .panel .panel-heading .btn_group {
                text-align: center;
            }
        }
    </style>
<center>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title">Order <span>List</span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>first name</th>
                                    <th>last name</th>
                                    <th>adress</th>
                                    <th>phone</th>
                                    <th>book</th>
                                    <th>lang</th>
                                    <th>insta</th>
                                    <th>date order</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                        foreach($table as $tb){
                                    ?>
                                <tr>
                                    
                                    <td><?= $tb['id'] ?></td>
                                    <td><?= $tb['email'] ?></td>
                                    <td><?= $tb['first_name'] ?></td>
                                    <td><?= $tb['last_name'] ?></td>
                                    <td><?= $tb['adress'] ?></td>
                                    <td><?= $tb['phone_num'] ?></td>
                                    <td><?= $tb['book_name'] ?></td>
                                    <td><?= $tb['lang'] ?></td>
                                    <td><?= $tb['id_insta'] ?></td>
                                    <td><?= $tb['date'] ?></td>
                                    
                                    <td>
                                        <ul class="action-list">
                                        <li><a href="approuved.php?id=<?= $tb['id'] ?>" data-tip="delete"><i class="fa fa-check"></i></a></li>
                                        </ul>
                                    </td>
                                   
                                    
                                </tr>
                                <?php

}
?>
                            </tbody>
                        </table>
                    </div>
                </div>
    <br>
                <div class="panel app" id="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-sm-3 col-xs-12">
                                <h4 class="title">Order <span>in progress</span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>first name</th>
                                    <th>last name</th>
                                    <th>adress</th>
                                    <th>phone</th>
                                    <th>book</th>
                                    <th>lang</th>
                                    <th>insta</th>
                                    <th>date order</th>
                               
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                        foreach($money as $mn){
                                    ?>
                                <tr>
                                    
                                    <td><?= $mn['id'] ?></td>
                                    <td><?= $mn['email'] ?></td>
                                    <td><?= $mn['first_name'] ?></td>
                                    <td><?= $mn['last_name'] ?></td>
                                    <td><?= $mn['adress'] ?></td>
                                    <td><?= $mn['phone_num'] ?></td>
                                    <td><?= $mn['book_name'] ?></td>
                                    <td><?= $mn['lang'] ?></td>
                                    <td><?= $mn['id_insta'] ?></td>
                                    <td><?= $mn['date'] ?></td>
                              
                                   
                                    
                                </tr>
                                <?php

}
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </center>
</body>

</html>
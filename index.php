<?php 
    session_start();
    include('getdata.php');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled">Disabled</a>
                </li>
              </ul>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
        <h1>Hello, world!</h1>
        <div class='cotainer'>
            <div class='row'>
                <div class='col-12'>
                    <?php
                        if(isset($_SESSION['status'])){
                            echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                            unset($_SESSION['status']);
                        }
                    ?>
                    <div class='card'>
                        <div class='card-header'>
                            <h4>PHP Firebase</h4>
                            <a href='addContact.php' class='btn btn-primary float-end'>Add Contact</a>
                        </div>
                        <div class='card-body'>
                            <table class='table table-bordered table-striped'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>Reserved</th>
                                        <th>Confirmed</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include('dbconf.php');
                                        $table = 'party1';
                                        $fetchdata = $database->getReference($table)->getValue();
                                        
                                        if($fetchdata > 0){
                                            $i=1;
                                            foreach($fetchdata as $dkey => $drow){
                                                ?>
                                                    <tr>
                                                        <td><?=$dkey;?></td>
                                                        <td><?=$drow['user_id'];?></td>
                                                        <td><?=$drow['reserved'];?></td>
                                                        <td><?=$drow['confirmed'];?></td>
                                                        <td><a href='edit-contact.php?id=<?=$drow['user_id'];?>&party=<?=$table;?>' class='btn btn-primary btn-sm'>Edit</a></td>
                                                        <td><a href='delete-contact.php?id=<?=$dkey;?>' class='btn btn-danger btn-sm'>Delete</a></td>
                                                    </tr>
                                                <?php
                                            }
                                        }else{      
                                            ?>
                                                <tr>
                                                    <td colspan="6">NO Records</td>
                                                </tr>
                                            <?php
                                        }

                                    ?>
                                    <tr>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script>
            <?php $party_id = 'party1'; ?>
            var res = <?=get_reserved($party_id);?>; 
            console.log(res);
        </script>
    </body>
</html>
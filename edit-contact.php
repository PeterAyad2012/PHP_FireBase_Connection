<?php session_start()?>
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
            <div class='row justify-content-center'>
                <div class='col-6'>
                    <div class='card'>
                        <div class='card-header'>
                            <h4>Edit Contact</h4>
                            <a href='index.php' class='btn btn-danger float-end'>Back</a>
                        </div>
                        <div class='card-body'>
                             <?php
                                if(isset($_GET['id'])){
                                    $target_id = $_GET['id'];
                                    include('dbconf.php');
                                    $table = 'Contacts';
                                    $fetchdata = $database->getReference($table)->getChild($target_id)->getValue();
                                    if ($fetchdata > 0){
                                        ?>
                                            <form action="code.php" method="post">
                                                <input type="hidden" name="contact_key" value="<?=$target_id;?>"/>
                                                <div class="form-group mb-3">
                                                    <label>First Name</label>
                                                    <input type="text" name='first' class="form-control" value="<?=$fetchdata['f'];?>"/>

                                                    <label>Last Name</label>
                                                    <input type="text" name='last' class="form-control" value="<?=$fetchdata['l'];?>"/>

                                                    <label>Mail</label>
                                                    <input type="email" name='email' class="form-control" value="<?=$fetchdata['m'];?>"/>

                                                    <label>phone</label>
                                                    <input type="number" name='phone' class="form-control" value="<?=$fetchdata['p'];?>"/>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <button type="submit" name="update" class='btn btn-primary'>Save</button>
                                                </div>
                                            </form>
                                        <?php
                                    }else{
                                        $_SESSION['status'] = 'Invalid ID';
                                        header('Location: index.php');
                                        exit();
                                    }
                                }else{
                                    $_SESSION['status'] = 'No ID Received';
                                    header('Location: index.php');
                                    exit();
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
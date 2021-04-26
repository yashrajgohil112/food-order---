<?php
                  if(isset($_SESSION['status']))
                  {
                      ?>
                      <div class="alert alert-success" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['status']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['status']);
                  }

                  if(isset($_SESSION['add-category-done']))
                  {
                      ?>
                      <div class="alert alert-success" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['add-category-done']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['add-category-done']);
                  }

                  if(isset($_SESSION['add-food']))
                  {
                      ?>
                      <div class="alert alert-success" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['add-food']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['add-food']);
                  }


                 
                  if(isset($_SESSION['del']))
                  {
                      ?>
                      <div class="alert alert-danger" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['del']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['del']);
                  }

                  if(isset($_SESSION['del-cat']))
                  {
                      ?>
                      <div class="alert alert-danger" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['del-cat']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['del-cat']);
                  }

                  if(isset($_SESSION['del-food']))
                  {
                      ?>
                      <div class="alert alert-danger" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['del-food']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['del-food']);
                  }


                  if(isset($_SESSION['upd']))
                  {
                      ?>
                      <div class="alert alert-success" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['upd']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['upd']);
                  }

                  if(isset($_SESSION['upd-cat']))
                  {
                      ?>
                      <div class="alert alert-success" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['upd-cat']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['upd-cat']);
                  }

                  if(isset($_SESSION['upd-food']))
                  {
                      ?>
                      <div class="alert alert-success" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['upd-food']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['upd-food']);
                  }

                  if(isset($_SESSION['user-not-found']))
                  {
                      ?>
                      <div class="alert alert-danger" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['user-not-found']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['user-not-found']);
                  }

                  if(isset($_SESSION['pass-not-match']))
                  {
                      ?>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['pass-not-match']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['pass-not-match']);
                  }

                  if(isset($_SESSION['pass-change-done']))
                  {
                      ?>
                      <div class="alert alert-success" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['pass-change-done']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['pass-change-done']);
                  }

                  if(isset($_SESSION['pass-change-notdone']))
                  {
                      ?>
                      <div class="alert alert-danger" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['pass-change-notdone']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['pass-change-notdone']);
                  }

                   ?>
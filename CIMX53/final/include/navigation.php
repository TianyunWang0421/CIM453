<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="assets/clock.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Timing
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">

    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home<span class="sr-only"></span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="news.php">News</a>
    </li>

    <?php if(isset($_SESSION['user'])): ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Tasks
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="task.php">Create a Task</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="alltasks.php">All Tasks</a>
        </div>
     </li>

     <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           My Goals
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="goal.php">Create a Goal</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="allgoals.php">All Goals</a>
         </div>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            My Records
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="record.php">Record My Completed</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="allrecords.php">All Records</a>
          </div>
       </li>

    <li class="nav-item">
      <a class="nav-link" href="profile.php">My Profile</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>

    <li class="nav-item">
      <button type="button" class="btn btn-outline-primary">
      Scheduled <span class="badge badge-light">4</span>
      </button>
    </li>

    <?php else: ?>
    <li class="nav-item">
      <a class="nav-link" href="register.php">Register</a>
    </li>
    <?php endif;?>

  </ul>

    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

</div>
</nav>

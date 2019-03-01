
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  /* font-size: 18px; */
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #3498DB;
  text-align: center;
  cursor: pointer;
  width: 100%;
  /* font-size: 18px; */
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>

<body>
<div class="card">
  <img src="https://raw.githubusercontent.com/talha08/talha08.github.io/master/images/photo.jpg" alt="John" style="width:100%">
  <br>
  <h3><b>MD. ABU TALHA</b></h3>
  <p class="title">Full Stack Web Developer</p>
  <p>InfancyIT</p>
  <div style="margin: 24px 0;">
    <a href="https://www.linkedin.com/in/md-abu-talha/" target="_blank"><i class="fa fa-linkedin"></i></a>
    <a href="https://www.facebook.com/talha.sust.cse" target="_blank"><i class="fa fa-facebook"></i></a>
    <a href="https://github.com/talha08" target="_blank"><i class="fa fa-github"></i></a>
    <a href="https://medium.com/@talhaqc" target="_blank"><i class="fa fa-medium"></i></a>
  </div>
  <!-- <p><a href="talha08.github.io" class="button">Profile</a></p> -->
  <form role="form" enctype="multipart/form-data" method="" action="<?php echo URL_ROOT; ?>user/requestFriend">
        <button name="submit" type="submit" class="button"><?php echo $friend_status; ?></button>
    </form>
</div>

</body>

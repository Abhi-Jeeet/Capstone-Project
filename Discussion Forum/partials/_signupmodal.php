<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signupmodalLabel">Create your Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <!-- FORM -->


      <form action="/Capstone Project/Home1/Home2/Forum/partials/_handlesignup.php" method="post">
  <div class="mb-3">
    <label for="exampeInputEmail" class="form-label">Username</label>
    <input type="text" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="signupPassword" name="signupPassword">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="signupcPassword"
    name="signupcPassword">
  </div>
  
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
      </div>
    </div>
  </div>
</div>
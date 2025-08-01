   <!-- Notification Container -->

   <?php if(isset($_SESSION['message'])): ?>
   <div class="notification-container <?php  echo isset($_SESSION['message']) ?  " show" : "" ?>"
       style="margin-top: 120px;">
       <div class="notification success">
           <!-- Success message will go here -->
           <?php if(isset($_SESSION['message'])): ?>
           <p><?php echo $_SESSION['message']; ?></p>
           <p><?php  unset($_SESSION['message']); ?></p>
           <?php endif; ?>
       </div>
   </div>
   <?php endif; ?>